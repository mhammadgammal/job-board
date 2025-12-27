<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $cred = $request->only('email', 'password');
        $token = auth()->guard('api')->attempt($cred);

        if (! $token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(
            [
                'message' => 'Login successful',
                'token' => $token,
                'expires_in' => auth('api')->factory()->getTTL() * 60,
            ]
        );
    }

    public function me()
    {
        $user = auth()->guard('api')->user();

        return response()->json($user);
    }

    public function refresh() {
        $newToken = auth()->guard('api')->refresh();

        return response()->json(
            [
                'message' => 'Token refreshed successfully',
                'token' => $newToken,
                'expires_in' => auth('api')->factory()->getTTL() * 60,
            ]
        );
    }
    public function logout() {
        auth()->guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
