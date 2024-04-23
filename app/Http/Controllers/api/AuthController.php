<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\api\EmailVerificationMail;
use App\Models\MobileEmailVerificationCode;
use App\Models\MobileUser;
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
        $request->validate([
            'name' => ['required', 'max:250'],
            'email' => ['required', 'email', 'unique:mobile_users', 'max:250'],
            'password' => ['required', 'max:250'],
            'password_confirmation' => ['required', 'same:password']
        ]);

        $user = MobileUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

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

        return response()->json([
            'message' => 'User registered successfully',
            'userWithToken' => $success
        ], 200);
    }

    public function checkEmailVerificationCode(Request $request)
    {
        try {
            $code = $request->code;
            $email = $request->email;

            $user = MobileUser::where('email', $email)->first();
            $userCodeModel = $user->find($user['id'])->emailVerificationCode;

            if ($userCodeModel === null || $userCodeModel['accountVerificationCode'] !== $code) {
                return response()->json([
                    'message' => 'Wrong Verification Code'
                ], 200);
            }

            $user->verify = true;
            $user->save();

            $userCodeModel->delete();

            return response()->json([
                'message' => 'Correct Verification Code'
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e
            ], 400);
        }
    }

    public function completeRegister(Request $request)
    {
        $data = $request->all();
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
            ]);
        }

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $image->move(public_path() . '/images/API_Images/profilePhotos/', $imageName);

        $user = MobileUser::where('email', $data['email'])->first();
        $user->update([
            'image' => $imageName,
            'birth_date' => $data['birth_date'],
            'it_student' => $data['it_student'],
            'university' => $data['university'],
            'bio' => $data['bio']
        ]);

        return response()->json([
            'message' => "Register completed successfully",
            'User Info' => $user
        ], 200);
    }

    public function login(Request $request)
    {
        if (Auth::guard('mobile')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('mobile')->user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;
            return response()->json([
                'message' => "User logged successfully",
                'success' => $success
            ], 200);
        } else {
            return response()->json([
                'message' => 'Unauthorised'
            ], 400);
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
}
