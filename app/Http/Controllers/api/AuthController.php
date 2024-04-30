<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\api\EmailVerificationMail;
use App\Mail\api\ResetPasswordMail;
use App\Models\MobileEmailVerificationCode;
use App\Models\MobileResetPasswordCode;
use App\Models\MobileUser;
use http\Env\Response;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'max:250'],
            'email' => ['required', 'email', 'max:250'],
            'password' => ['required', 'max:250'],
            'password_confirmation' => ['required', 'same:password']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is something incorrect",
                'errors' => $validator->errors()
            ], 422);
        }

        $user = MobileUser::where('email', $data['email'])->first();

        if ($user === null || !$user['verify'] || !$user['completed']) {
            if ($user !== null) {
                $emailVerificationModel = MobileUser::find($user['id'])->emailVerificationCode;
                if ($emailVerificationModel !== null) {
                    $emailVerificationModel->delete();
                }

                $user->delete();
            }

            $user = MobileUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $code = rand(100000, 999999);
            $tmp = MobileEmailVerificationCode::where('accountVerificationCode', $code)->first();
            while ($tmp !== null) {
                $code = rand(100000, 999999);
                $tmp = MobileEmailVerificationCode::where('accountVerificationCode', $code)->first();
            }

            MobileEmailVerificationCode::create([
                'accountVerificationCode' => $code,
                'user_id' => $user['id'],
            ]);

            $mailData = [
                'title' => 'Account Verification',
                'body' => 'Your code is:',
                'code' => $code
            ];

            Mail::to($user['email'])->send(new EmailVerificationMail($mailData));

            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            return response()->json([
                'message' => 'User registered successfully',
                'userWithToken' => $success
            ], 200);
        } else {
            return response()->json([
                'message' => 'You already have an account. Please login.',
            ], 409);
        }
    }

    public function checkEmailVerificationCode(Request $request)
    {
        $user = $request->user();
        $code = $request->code;

        $userCodeModel = $user->find($user['id'])->emailVerificationCode;

        if ($userCodeModel === null || $userCodeModel['accountVerificationCode'] !== $code) {
            return response()->json([
                'message' => 'Wrong Verification Code'
            ], 422);
        }

        $user->verify = true;
        $user->save();

        $userCodeModel->delete();

        return response()->json([
            'message' => 'Correct Verification Code'
        ], 200);
    }

    public function completeRegister(Request $request)
    {
        $data = $request->all();

        if (($data['it_student'][0] !== "0" && $data['it_student'][0] !== "1")) {
            return response()->json([
                'message' => 'You should input (0 or 1) value in it_student filed'
            ], 422);
        }

        $data['it_student'] = $data['it_student'][0];
        $data['it_student'] = (boolean)$data['it_student'];

        $validator = Validator::make($data, [
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,gif', 'max:10240'],
            'birth_date' => ['required', 'date', 'after:01/01/1900', 'before:today'],
            'it_student' => ['required', 'boolean'],
            'university' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'min:3', 'max: 1024'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is something incorrect",
                'errors' => $validator->errors()
            ], 422);
        }

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $image->move(public_path() . '/images/API_Images/profilePhotos/', $imageName);

        $user = $request->user();
        $user->update([
            'image' => $imageName,
            'birth_date' => $data['birth_date'],
            'it_student' => $data['it_student'],
            'university' => $data['university'],
            'bio' => $data['bio'],
            'completed' => true,
        ]);

        return response()->json([
            'message' => 'User have completed the registration successfully',
        ], 200);
    }

    public function login(Request $request)
    {
        if (Auth::guard('mobile')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('mobile')->user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            if (!$user['verify'] || !$user['completed']) {
                $emailVerificationModel = MobileUser::find($user['id'])->emailVerificationCode;
                if ($emailVerificationModel !== null) {
                    $emailVerificationModel->delete();
                }

                $code = rand(100000, 999999);
                $tmp = MobileEmailVerificationCode::where('accountVerificationCode', $code)->first();
                while ($tmp !== null) {
                    $code = rand(100000, 999999);
                    $tmp = MobileEmailVerificationCode::where('accountVerificationCode', $code)->first();
                }

                MobileEmailVerificationCode::create([
                    'accountVerificationCode' => $code,
                    'user_id' => $user['id'],
                ]);

                $mailData = [
                    'title' => 'Account Verification',
                    'body' => 'Your code is:',
                    'code' => $code
                ];

                Mail::to($user['email'])->send(new EmailVerificationMail($mailData));

                if (!$user['verify']) {
                    $success['message'] = 'Your account is not verified. Check your email for verification code.';

                    return response()->json([
                        'data' => $success
                    ], 403);
                } else {
                    $success['message'] = 'You should complete your account information';

                    return response()->json([
                        'data' => $success
                    ], 422);
                }
            } else {
                $success['message'] = 'User logged in successfully';

                return response()->json([
                    'data' => $success,
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'Your email or password is not correct'
            ], 401);
        }
    }

    public function logout()
    {
        try {
            Auth::user()->tokens()->delete();
            return response()->json([
                'message' => 'Successfully logged out',
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e
            ], 400);
        }
    }

    public function forgetPassword(Request $request)
    {
        $email = $request->email;
        $user = MobileUser::where('email', $email)->first();

        if ($user === null) {
            return response()->json([
                'message' => 'Invalid email'
            ], 422);
        }

        if (!$user['verify']) {
            return response()->json([
                'message' => 'Your account is not verified.'
            ], 403);
        }

        $resetPasswordCode = MobileUser::find($user['id'])->resetPasswordCode;
        if ($resetPasswordCode !== null) {
            $resetPasswordCode->delete();
        }

        $resetPasswordCode = rand(100000, 999999);
        $tmp = MobileResetPasswordCode::where('resetPasswordCode', $resetPasswordCode)->first();
        while ($tmp !== null) {
            $resetPasswordCode = rand(100000, 999999);
            $tmp = MobileResetPasswordCode::where('resetPasswordCode', $resetPasswordCode)->first();
        }

        MobileResetPasswordCode::create([
            'resetPasswordCode' => $resetPasswordCode,
            'user_id' => $user['id'],
        ]);

        $mailData = [
            'title' => 'Reset Password',
            'body' => 'Your code is:',
            'code' => $resetPasswordCode
        ];

        Mail::to($user['email'])->send(new ResetPasswordMail($mailData));

        return response()->json([
            'message' => 'Check your email for reset password code.'
        ], 200);
    }

    public function checkResetPasswordCode(Request $request)
    {
        $code = $request->code;
        $email = $request->email;

        $user = MobileUser::where('email', $email)->first();
        $userCodeModel = $user->find($user['id'])->resetPasswordCode;

        if ($userCodeModel === null || $userCodeModel['resetPasswordCode'] !== $code) {
            return response()->json([
                'message' => 'Wrong Reset Password Code.'
            ], 422);
        }

        $userCodeModel->delete();

        return response()->json([
            'message' => 'Correct Reset Password Code.'
        ], 200);
    }

    public function resetPassword(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'password' => ['required', 'max:250'],
            'password_confirmation' => ['required', 'same:password']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is something incorrect",
                'errors' => $validator->errors()
            ], 422);
        }

        $user = MobileUser::where('email', $data['email'])->first();

        if ($user === null) {
            return response()->json([
                'message' => 'Invalid Email.'
            ], 422);
        }

        $user->update([
            'password' => bcrypt($data['password'])
        ]);

        $token = $user->createToken('MyApp')->plainTextToken;

        if (!$user['completed']) {
            return response()->json([
                'message' => 'Password changed successfully, but You should complete your account information.',
                'token' => $token,
            ], 422);
        } else {
            return response()->json([
                'message' => 'Password changed successfully.',
                'token' => $token,
            ], 200);
        }
    }
}
