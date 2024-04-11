<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MobileUser;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:mobile_users'],
                'password' => ['required'],
                'password_confirmation' => ['required', 'same:password']
            ]);

            $user = MobileUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

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
