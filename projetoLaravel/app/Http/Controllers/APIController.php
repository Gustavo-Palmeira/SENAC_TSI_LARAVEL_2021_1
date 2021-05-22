<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTExecption;

class APIController extends Controller
{
    public $loginAfterSignUp = true;

    public function login(Request $request) {
        $token = null;
        $camposJson = json_decode($request->getContent(), JSON_OBJECT_AS_ARRAY);
        $credenciais = ['email' => $camposJson['email'],
                        'password' => $camposJson['password']];

        try {
            if(!$token = JWTAuth::attempt($credenciais)) {
                return response()->json(['success' => false,
                                         'message' => 'Credenciais inválidas'], 401);
            }
        } catch(JWTException $error) {
            return response()->json(['error' => 'Token não criado'], 500);
        }

        return response()->json(['success' => true, 'token' => $token]);
    }

    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json(['success' => true,
                                     'message' => 'Token invalidado']);
        } catch(JWTException $error) {
            return response()->json(['success' => false,
                                     'message' => 'Logout não realizado, 500']);
        }
    }
}
