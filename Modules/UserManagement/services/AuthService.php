<?php

namespace Modules\UserManagement\Services;

use Illuminate\Support\Facades\Hash;
use Modules\UserManagement\Models\User;
use Modules\UserManagement\Repositories\AuthRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService implements AuthRepository
{
    public function register($name, $email, $password): \Illuminate\Http\JsonResponse
    {
        $user = User::create([
            'user_name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ])->assignRole('user');
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user', 'token'), 201);
    }

    public function login($credentials): \Illuminate\Http\JsonResponse
    {
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = auth()->user();
        if (!$user->activated_at) return response()->json(['error' => 'Your User Not Activated Yet...'], 403);
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user', 'token'), 201);
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Successfully logged out']);
    }
}
