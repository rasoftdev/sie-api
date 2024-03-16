<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeResource;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterAuthRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendPasswordResetEmail;

class AuthController extends Controller
{
    public function register(RegisterAuthRequest $request)
    {

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $token = JWTAuth::fromUser($user);
            $user->roles()->attach(3);

            DB::commit();

            return response()->json([
                "status" => true,
                "data" => $user,
                "token" => $token
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "status" => false,
                "message" => "Registration failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function register2(RegisterAuthRequest $request)
    {

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $token = JWTAuth::fromUser($user);
            $user->roles()->attach(1);

            DB::commit();

            return response()->json([
                "status" => true,
                "data" => $user,
                "token" => $token
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "status" => false,
                "message" => "Registration failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                "status" => false,
                "message" => "Invalid email or password"
            ], 200);
        }
        return $this->respondWithToken($token);
    }

    public function me()
    {
        $user = new MeResource(auth()->user());
        if (!$user) {
            return response()->json([
                "status" => false,
                "message" => "User not found"
            ]);
        }
        return response()->json([
            "status" => true,
            "data" => $user
        ]);
    }

    public function logout()
    {
        try {
            auth()->logout();
            return response()->json([
                'status' => true,
                'message' => 'Successful logout'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Error logging out",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function refreshToken()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ], 200);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                "status" => false,
                "message" => "No user found with this email address"
            ], 404);
        }

        $token = Str::random(60);

        $existingToken = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if ($existingToken) {
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update(['token' => $token, 'created_at' => now()]);
        } else {
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]);
        }

        dispatch((new SendPasswordResetEmail($request->email, $token))->delay(now()->addMinute()));

        return response()->json([
            "status" => true,
            "message" => "Password reset link has been sent to your email"
        ]);
    }

    public function resetPassword(Request $request)
    {
        var_dump($request->all());
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $passwordReset = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->first();

        if (!$passwordReset) {
            return response()->json([
                "status" => false,
                "message" => "Invalid token or email"
            ], 400);
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            return response()->json([
                "status" => false,
                "message" => "No user found with this email address"
            ], 404);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_reset_tokens')->where('email', $user->email)->delete();

        return response()->json([
            "status" => true,
            "message" => "Password has been reset successfully"
        ]);
    }
}
