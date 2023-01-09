<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return [
            'id'=> $id,
            'nombre' => $user->name,
            'apellidos' =>$user->apellidos,
            'email' => $user->email,
            'birth_date' => $user->fecha_nacimiento,
            'newsletter' => $user->newsletter,

          ];


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($request->id);

        $user->name = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        $user->fecha_nacimiento = $request->birth_date;
        $user->newsletter = $request->newsletter;

        if ($request->newPassword) {
            $user->password = Hash::make($request->newPassword);
        }



        $user->save();

        return [
            'nombre' => $user->name,
            'apellidos' =>$user->apellidos,
            'email' => $user->email,
            'birth_date' => $user->fecha_nacimiento,
            'newsletter' => $user->newsletter,
          ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
