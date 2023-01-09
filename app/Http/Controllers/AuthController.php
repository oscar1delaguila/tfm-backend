<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(Request $request) 
    {


        $user = new User();
        $user->name = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->fecha_nacimiento = $request->birth_date;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->newsletter = $request->newsletter;

        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        //respuesta al registrar un usuario.
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'id' => $user->id,
            'nombre' => $user->name,
            'apellidos' =>$user->apellidos,
            'email' => $user->email,
            'birth_date' => $user->fecha_nacimiento,
            'newsletter' => $user->newsletter,

        ]); 

    }

    public function login (Request $request )
    {

        if (!Auth::attempt($request->only( keys:['email', 'password'] ))) {

             return response()->json([
                'message' => 'Invalid login details',
             ], status: 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user_id' => $user->id,
            'email' => $user->email,
        ]); 

    }

    public function infoUser (Request $request ) 
    {



    }


}
