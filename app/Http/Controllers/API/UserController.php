<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah pengguna sudah ada
        $user = User::where('email', $request->email)->firstOrFail();

        // Validasi kredensial
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Cek apakah pengguna sudah memiliki token aktif
        if ($user->tokens()->where('tokenable_id', $user->id)->exists()) {
            return response()->json([
                'code' => 400,
                'message' => 'User is already logged in.',
            ], 400);
        }

        // Membuat token baru
        $tokenResult = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'code' => 200,
            'message' => 'Login successfully',
            'data' => [
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ],
        ], 200);
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'string', new Password],
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'User created successfully',
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]
        ]);

    }
    public function logout(request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Logout successfully'
        ],200);
    }

    public function fetch(Request $request){
        $user = $request->user();
        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'User Found',
            'data' => [
                'user' => auth()->user(),
            ],
        ],200);
    }
}
