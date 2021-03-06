<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Metodos de autenticación de la api
class AuthController extends Controller
{
    // Registro de usuario
    public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'], 201);
    }

    // Login de usuario
    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'string',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'], 401);
        }
        $user = $request->user();

        // Creación del token de usuario
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(10);
        }
        $token->save();

        // Devuelve la información del token de usuario
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                ->toDateTimeString(),
        ]);
    }

    // Logout del usuario. Invalidación del token.
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' =>
            'Successfully logged out']);
    }

    // Devuelve todos los datos del usuario
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    // Actualiza los datos del usuario
    public function updateUser(Request $request)
    {
        $user = Auth::User();
        $params = $request->all();

        $user->name = $params['name'];
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);
        $user->save();

        return response()->json([$request->user(),
            'message' => 'Successfully updated user!'],200);
    }

    // Elimina el usuario
    public function deleteUser(Request $request)
    {
        $user = Auth::User();
        $user->delete();

        return response()->json([$request->user(),
            'message' => 'Successfully deleted user!'],200);
    }
}
