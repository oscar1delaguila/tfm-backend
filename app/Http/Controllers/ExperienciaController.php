<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Experiencia;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class ExperienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        
        $limitePorPagina = 12;
        $experiencias = DB::table('experiencias')->orderBy('publicado','desc')->offset(($page -1) * $limitePorPagina)->limit($limitePorPagina)->get();
         //$experiencias = Experiencia::all();
 
 
         return $experiencias;
 
    }

    public function experienciasByUsuario($page, $idUsuario) 
    {

        $limitePorPagina = 12;
        $experiencias = DB::table('experiencias')->orderBy('publicado','desc')->where('user_id','=', $idUsuario)
                                                 ->offset(($page -1) * $limitePorPagina)->limit($limitePorPagina)
                                                 ->get();
         return $experiencias;

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
        $experiencia = new Experiencia();
        $experiencia->titulo = $request->titulo;
        $experiencia->descripcion = $request->descripcion;
        $experiencia->valoracion = $request->valoracion;        
        $experiencia->juguete_id = $request->juguete_id;
        $experiencia->user_id = $request->user_id;
        $experiencia->publicado = $request->publicado;
        $experiencia->fecha_publicacion = $request->fecha_publicacion;
        $experiencia->imagen_experiencia = $request->imagen_experiencia;

        $experiencia->save();
        
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {

            $uploaded_file = $request->file('thumbnail');
            $experiencia->imagen_experiencia = $uploaded_file->getClientOriginalName();
            //directorio 'Experiencias'
            $uploaded_file->move('Experiencias/'. $request->user_id . '/' . $experiencia->id , $experiencia->imagen_experiencia);


        }

        return [
            'id' => $experiencia->id,
            'titulo' => $experiencia->titulo,
            'descripcion' => $experiencia->descripcion,
            'imagen_experiencia' => $experiencia->imagen_experiencia,
            "publicado" => $experiencia->publicado,
            "juguete_id" => $experiencia->juguete_id,
            "user_id" => $experiencia->user_id,
            "valoracion" => $experiencia->valoracion,
            "fecha_publicacion" => $experiencia->fecha_publicacion

        ];


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
        $experiencia = Experiencia::find($id);
        return [

            'id' => $id,
            'titulo' => $experiencia->titulo,
            'fecha_publicacion' => $experiencia->fecha_publicacion,
            'descripcion' => $experiencia->descripcion,
            'imagen_experiencia' => $experiencia->imagen_experiencia,
            'juguete_id' => $experiencia->juguete_id,
            'publicado' => $experiencia->publicado,
            'valoracion' => $experiencia->valoracion,
            'user_id' => $experiencia->user_id,

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
    //public function update(Request $request, $id)
    public function update(Request $request)
    {

        $experiencia = Experiencia::findOrFail($request->id);

        $experiencia->titulo =  $request->titulo;
        $experiencia->descripcion = $request->descripcion;
        $experiencia->publicado = $request->publicado;
        $experiencia->juguete_id = $request->juguete_id;
        $experiencia->user_id = $request->user_id;
        $experiencia->valoracion = $request->valoracion;
        $experiencia->fecha_publicacion = $request->fecha_publicacion;

        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            
            $uploaded_file = $request->file('thumbnail');
            $experiencia->imagen_experiencia = $uploaded_file->getClientOriginalName();
            //directorio 'Experiencias'
            $uploaded_file->move('Experiencias/'. $request->user_id . '/' . $request->id , $experiencia->imagen_experiencia);

        }

        //Guardamos la imagen en el sistema de ficheros del sistema.
        $experiencia->save();
        return [

            'id' => $request->id,
            'titulo' => $experiencia->titulo,
            'fecha_publicacion' => $experiencia->fecha_publicacion,
            'descripcion' => $experiencia->descripcion,
            'juguete_id' => $experiencia->juguete_id,
            'publicado' => $experiencia->publicado,
            'valoracion' => $experiencia->valoracion,
            'user_id' => $experiencia->user_id,
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
        Experiencia::destroy($id);
        return $id;
    }

    public function publicar($id) {

        $experiencia = Experiencia::findOrFail($id);
        $experiencia->publicado = true;
        $experiencia->save();
        return [
            'id' => $id,
            'publicado' => true
        ];

    }

    public function noPublicar($id) {

        $experiencia = Experiencia::findOrFail($id);
        $experiencia->publicado = false;
        $experiencia->save();
        return [
            'id' => $id,
            'publicado' => false
        ];
    }

    public function juguetesTitulos() {

        $juguetes = DB::table('juguetes')->select('id','titulo')->get();


        return  $juguetes;

    }


}
