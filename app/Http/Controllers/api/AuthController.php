<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\api\EmailVerificationMail;
use App\Models\MobileEmailVerificationCode;
use App\Models\MobileUser;
use http\Env\Response;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
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
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e
            ], 400);
        }
    }

    public function checkEmailVerificationCode(Request $request)
    {
        $code = $request->code;
        $userCodeModel = MobileEmailVerificationCode::where('accountVerificationCode', $code)->first();

        if ($userCodeModel === null) {
            return response()->json([
                'message' => 'Wrong Verification Code'
            ], 200);
        }

        $userModel = MobileUser::where('id', $userCodeModel['user_id'])->first();
        $userModel->verify = true;
        $userModel->save();

        $userCodeModel->delete();

        return response()->json([
            'message' => 'Correct Verification Code'
        ], 200);
    }

    public function login(Request $request)
    {
        try {
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
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e
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
