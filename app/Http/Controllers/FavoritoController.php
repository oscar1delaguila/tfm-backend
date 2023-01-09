<?php

namespace App\Http\Controllers;

use App\Http\Resources;
use App\Models\Favorito;
use App\Models\User;
use App\Models\Juguete;

use Illuminate\Http\Request;
use App\Http\Resources\JugueteIdResource;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idUser)
    {
        //Buscamos el usuario
        $user = User::find($idUser);

      
        //un usuario tiene muchos favoritos
        $favoritos = $user->favoritos()->get();


        $array_favoritos = [];

        //for($i=0;$i<count($favoritos);$i++) {
        foreach ($favoritos as $favorito) {

             
             $jugueteResource = new JugueteIdResource(\App\Models\Juguete::findOrFail($favorito->juguete_id));

             $favorito_resource = [

                'id'=> $favorito->id,
                'titulo_juguete' => $jugueteResource->titulo,
                'fecha_favorito' => $favorito->fecha_favorito,
                'precio' => $jugueteResource->precio,
                'num_votaciones' => $jugueteResource->num_votaciones,
                'marca' => $jugueteResource->marca,
                'puntuacion' => $jugueteResource->puntuacion,
                'categoria' => $jugueteResource->categorias,
                'categoria_id' => $jugueteResource->categoria_id,
                'path_imagen' => $jugueteResource->path_imagen,
                'imagen_favorito' =>$jugueteResource->imagen1,
                'juguete_id' => $favorito->juguete_id,

            ];

             array_push($array_favoritos, $favorito_resource);

        }

        return $array_favoritos;

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
        $favorito = new Favorito();
        $favorito->user_id = $request->user_id;
        $favorito->juguete_id = $request->juguete_id;
        $favorito->fecha_favorito = now();

        $favorito->save();

        return $favorito->id;

        /*
        return [
            'id' => $favorito->id,
            'juguete_id' => $favorito->juguete_id,
            'user_id' => $favorito->user_id,
            'fecha_favorito' => $favorito->fecha_favorito
        ];
        */
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
        Favorito::destroy($id);
        return $id;
 
    }

    public function obtenerIdFavorito($idJuguete, $idUser) 
    {


        $favorito = Favorito::where('user_id','=', $idUser )->where('juguete_id', '=', $idJuguete)->first();
        
        if ($favorito) {
            return $favorito->id;
        } else {
            return 0;
        }
        
    }

}
