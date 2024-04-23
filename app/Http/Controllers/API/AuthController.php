<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return response()->json($user, 201);

    }

    public function login(LoginRequest $request) {
        $user = User::where("email", $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(["message" => "Hibás e-mail cím vagy jelszó!"], 401);
        }

        $token = $user->createToken("AuthToken")->plainTextToken;
        //$admin = $user->adminE
        return response()->json(["token" => $token]); //kimarad "adminE" => $admin
    }

    public function logout(Request $request) {
        $user = auth()->user();
        /** @disregard P1013 Undefined method */
        $user->currentAccessToken()->delete();
        return response()->noContent();
    }

    public function logoutEverywhere() {
        $user = auth()->user();
        /** @disregard P1013 Undefined method */
        $user->tokens()->delete();
        return response()->noContent();
    }

    public function indexAllUser()
    {
        #$this->middleware('auth:sanctum');
        $users = User::all();
        return $users;
    }

}
