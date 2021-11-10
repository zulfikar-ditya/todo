<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
            $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => '',
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Email Or Password Does Not Match in Our Record'
        ]);
    }

    public function logout(Request $request)
    {
        // auth()->user()->tokens()->delete();
        Auth::logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();
        return [
            'success' => true,
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
