<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseGenerator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            $response = ResponseGenerator::createApiResponse(true, 401, "Bad Credentials", null);
            return response()->json($response, 401);
        }

        $token = $user->createToken('appToken')->plainTextToken;
        $responseContent = array(
            'user_id' => $user->id,
            'token' => $token
        );

        $response = ResponseGenerator::createApiResponse(false, 200, "Logged In", $responseContent);

        return response()->json($response, 200);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        $response = ResponseGenerator::createApiResponse(false, 200, "Logged Out", null);

        return response()->json($response, 200);
    }
}
