<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juguete;
use App\Http\Resources\CategoriasResource;
use Illuminate\Support\Facades\DB;

class JugueteController extends Controller
{
    
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page )
    {

        $limitePorPagina = 12; 
       //$juguetes = Juguete::all();

       $juguetes = DB::table('juguetes')->orderBy('publicado','desc')->offset(($page -1) * $limitePorPagina)->limit($limitePorPagina)->get();

       //# Offset Pagination...
       //select * from users order by id asc limit 15 offset 15;
       //$results = Juguete::where(/* constraints */)->orderBy('id')->paginate(10);

       return $juguetes;

    }

    public function busquedaPorCategoria($page, $literalABuscar)
    {


        $limitePorPagina = 12;

        $juguetes = null;

        if (!strcmp($literalABuscar  ,"Categorías")) {

                $juguetes = DB::table('juguetes')->orderBy('publicado','desc')->offset(($page -1) * $limitePorPagina)->limit($limitePorPagina)->get();


        } else {


               $categoriasAfectadas = DB::table('categorias')->select('id')
                                                  ->where('subcategoria2','=', $literalABuscar )
                                                  ->orWhere('subcategoria1','=', $literalABuscar)
                                                  ->orWhere('nombre_categoria','=', $literalABuscar);




                $juguetes = DB::table('juguetes')->whereIn('categoria_id',  $categoriasAfectadas )
                                                ->offset(($page -1) * $limitePorPagina)->limit($limitePorPagina)->get();
        }
        
        return $juguetes;

    }

    public function busquedaPorBuscador($page, $literalABuscar )
    {

      $limitePorPagina = 12;

      if (strcmp($literalABuscar,"")) {

        $juguetes = DB::table('juguetes')->orderBy('publicado','desc')->where('titulo','like', '%'.$literalABuscar.'%')
                                         //->orWhere('descripcion','like', '%'.$literalABuscar.'%')   
                                         ->offset(($page -1) * $limitePorPagina)->limit($limitePorPagina)->get();

      }
       return $juguetes;

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
        $juguete = new Juguete();
        $juguete->titulo = $request->titulo;
        $juguete->descripcion = $request->descripcion;
        $juguete->precio = $request->precio;
        $juguete->marca = $request->marca;
        $juguete->material = $request->material;

        $juguete->ancho = $request->ancho;
        $juguete->largo = $request->largo;
        $juguete->alto = $request->alto;
        $juguete->edad = $request->edad;

        $juguete->pro1 = $request->pro1;
        $juguete->pro2 = $request->pro2;
        $juguete->pro3 = $request->pro3;
        $juguete->pro4 = $request->pro4;
        $juguete->pro5 = $request->pro5;
        $juguete->pro6 = $request->pro6;


        $juguete->contra1 = $request->contra1;
        $juguete->contra2 = $request->contra2;
        $juguete->contra3 = $request->contra3;
        $juguete->contra4 = $request->contra4;
        $juguete->contra5 = $request->contra5;
        $juguete->contra6 = $request->contra6;


        $juguete->num_votaciones = $request->num_votaciones;
        $juguete->puntuacion = $request->puntuacion;
        
        $juguete->publicado = $request->publicado;

        $juguete->path_imagen = $request->path_imagen;

        if ($request->hasFile('imagen1') && $request->file('imagen1')->isValid()) {
            $uploaded_file1 = $request->file('imagen1');
            $juguete->imagen1 = $uploaded_file1->getClientOriginalName();
        }
        if ($request->hasFile('imagen2') && $request->file('imagen2')->isValid()) {
            $uploaded_file2 = $request->file('imagen2');
            $juguete->imagen2 = $uploaded_file2->getClientOriginalName();
        }
        if ($request->hasFile('imagen3') && $request->file('imagen3')->isValid()) {
            $uploaded_file3 = $request->file('imagen3');
            $juguete->imagen3 = $uploaded_file3->getClientOriginalName();
        }
        if ($request->hasFile('imagen4') && $request->file('imagen4')->isValid()) {
            $uploaded_file4 = $request->file('imagen4');
            $juguete->imagen4 = $uploaded_file4->getClientOriginalName();
        }
        if ($request->hasFile('imagen5') && $request->file('imagen5')->isValid()) {
            $uploaded_file5 = $request->file('imagen5');
            $juguete->imagen5 = $uploaded_file5->getClientOriginalName();
        }
        if ($request->hasFile('imagen6') && $request->file('imagen6')->isValid()) {
            $uploaded_file6 = $request->file('imagen6');
            $juguete->imagen6 = $uploaded_file6->getClientOriginalName();
        }
        if ($request->hasFile('imagen7') && $request->file('imagen7')->isValid()) {
            $uploaded_file7 = $request->file('imagen7');
            $juguete->imagen7 = $uploaded_file7->getClientOriginalName();
        }
        if ($request->hasFile('imagen8') && $request->file('imagen8')->isValid()) {
            $uploaded_file8 = $request->file('imagen8');
            $juguete->imagen8 = $uploaded_file8->getClientOriginalName();
        }

        $juguete->categoria_id = $request->categoria_id;

        $juguete->save();

        if ($request->hasFile('imagen1')) { $uploaded_file1->move('Juguetes/'. $request->path_imagen .'/'. $juguete->id , $juguete->imagen1); }
        if ($request->hasFile('imagen2')) { $uploaded_file2->move('Juguetes/'. $request->path_imagen .'/'. $juguete->id , $juguete->imagen2); }
        if ($request->hasFile('imagen3')) { $uploaded_file3->move('Juguetes/'. $request->path_imagen .'/'. $juguete->id , $juguete->imagen3); }
        if ($request->hasFile('imagen4')) { $uploaded_file4->move('Juguetes/'. $request->path_imagen .'/'. $juguete->id , $juguete->imagen4); }
        if ($request->hasFile('imagen5')) { $uploaded_file5->move('Juguetes/'. $request->path_imagen .'/'. $juguete->id , $juguete->imagen5); }
        if ($request->hasFile('imagen6')) { $uploaded_file6->move('Juguetes/'. $request->path_imagen .'/'. $juguete->id , $juguete->imagen6); }
        if ($request->hasFile('imagen7')) { $uploaded_file7->move('Juguetes/'. $request->path_imagen .'/'. $juguete->id , $juguete->imagen7); }
        if ($request->hasFile('imagen8')) { $uploaded_file8->move('Juguetes/'. $request->path_imagen .'/'. $juguete->id , $juguete->imagen8); }


        return [

            'id' => $juguete->id,
            'titulo' => $juguete->titulo,
            'descripcion' => $juguete->descripcion,
            'precio' => $juguete->precio,
            'pro1' => $juguete->pro1,
            'contra1' => $juguete->contra1,
            'num_votaciones' => $juguete->num_votaciones,
            'marca' => $juguete->marca,
            'edad' => $juguete->edad,
            'categorias' => CategoriasResource::collection($juguete->categorias()->get()),
            'path_video1' => $juguete->path_video1,
            'path_imagen' => $juguete->path_imagen,
            'imagen1' => $juguete->imagen1,
            'imagen2' => $juguete->imagen2,
            'imagen3' => $juguete->imagen3,
            'imagen4' => $juguete->imagen4,
            'imagen5' => $juguete->imagen5,
            'imagen6' => $juguete->imagen6,
            'imagen7' => $juguete->imagen7,
            'imagen8' => $juguete->imagen8,
            
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
        $juguete = Juguete::find($id);
        return [

            'id' => $juguete->id,
            'titulo' => $juguete->titulo,
            'fecha_publicacion' => $juguete->fecha_publicacion,
            'descripcion' => $juguete->descripcion,
            'precio' => $juguete->precio,
            'marca' => $juguete->marca,
            'material' => $juguete->material,
            'edad' => $juguete->edad,
            
            'ancho' => $juguete->ancho,
            'largo' => $juguete->largo,
            'alto' => $juguete->alto,
            
            'pro1' => $juguete->pro1,
            'pro2' => $juguete->pro2,
            'pro3' => $juguete->pro3,
            'pro4' => $juguete->pro4,
            'pro5' => $juguete->pro5,
            'pro6' => $juguete->pro6,

            'contra1' => $juguete->contra1,
            'contra2' => $juguete->contra2,
            'contra3' => $juguete->contra3,
            'contra4' => $juguete->contra4,
            'contra5' => $juguete->contra5,
            'contra6' => $juguete->contra6,

            'num_votaciones' => $juguete->num_votaciones,
            'puntuacion' => $juguete->puntuacion,

            //'categoria' => CategoriasResource::collection($juguete->categorias()->get()),

            'categoria' => $juguete->categorias()->findOrFail($juguete->categoria_id),
            
            'path_imagen' => $juguete->path_imagen,
            'imagen1' => $juguete->imagen1,
            'imagen2' => $juguete->imagen2,
            'imagen3' => $juguete->imagen3,
            'imagen4' => $juguete->imagen4,
            'imagen5' => $juguete->imagen5,
            'imagen6' => $juguete->imagen6,
            'imagen7' => $juguete->imagen7,
            'imagen8' => $juguete->imagen8,
            'publicado' => $juguete->publicado,
            
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
    public function update(Request $request)
    {

        //
        $juguete = Juguete::findOrFail($request->id);

        $juguete->descripcion = $request->descripcion;
        $juguete->titulo = $request->titulo;

        $juguete->puntuacion = $request->puntuacion;
        $juguete->num_votaciones = $request->num_votaciones;
        
        $juguete->precio = $request->precio;
        $juguete->marca = $request->marca;
        $juguete->material = $request->material;
        $juguete->edad = $request->edad;
        
        $juguete->ancho = $request->ancho;
        $juguete->largo = $request->largo;
        $juguete->alto = $request->alto;
        
        $juguete->pro1 = $request->pro1;
        $juguete->pro2 = $request->pro2;
        $juguete->pro3 = $request->pro3;
        $juguete->pro4 = $request->pro4;
        $juguete->pro5 = $request->pro5;
        $juguete->pro6 = $request->pro6;


        $juguete->contra1 = $request->contra1;
        $juguete->contra2 = $request->contra2;
        $juguete->contra3 = $request->contra3;
        $juguete->contra4 = $request->contra4;
        $juguete->contra5 = $request->contra5;
        $juguete->contra6 = $request->contra6;


        $juguete->categoria_id = $request->categoria_id;
        $juguete->path_imagen = $request->path_imagen;

        $juguete->publicado = $request->publicado;


        if ($request->hasFile('imagen1') && $request->file('imagen1')->isValid()) {
            $uploaded_file = $request->file('imagen1');
            $juguete->imagen1 = $uploaded_file->getClientOriginalName();
            $uploaded_file->move('Juguetes/'. $request->path_imagen . '/' . $request->id , $juguete->imagen1);
        }
        if ($request->hasFile('imagen2') && $request->file('imagen2')->isValid()) {
            $uploaded_file = $request->file('imagen2');
            $juguete->imagen2 = $uploaded_file->getClientOriginalName();
            $uploaded_file->move('Juguetes/'. $request->path_imagen . '/' . $request->id , $juguete->imagen2);
        }
        if ($request->hasFile('imagen3') && $request->file('imagen3')->isValid()) {
            $uploaded_file = $request->file('imagen3');
            $juguete->imagen3 = $uploaded_file->getClientOriginalName();
            $uploaded_file->move('Juguetes/'. $request->path_imagen . '/' . $request->id , $juguete->imagen3);
        }
        if ($request->hasFile('imagen4') && $request->file('imagen4')->isValid()) {
            $uploaded_file = $request->file('imagen4');
            $juguete->imagen4 = $uploaded_file->getClientOriginalName();
            $uploaded_file->move('Juguetes/'. $request->path_imagen . '/' . $request->id , $juguete->imagen4);
        }
        if ($request->hasFile('imagen5') && $request->file('imagen5')->isValid()) {
            $uploaded_file = $request->file('imagen5');
            $juguete->imagen5 = $uploaded_file->getClientOriginalName();
            $uploaded_file->move('Juguetes/'. $request->path_imagen . '/' . $request->id , $juguete->imagen5);
        }
        if ($request->hasFile('imagen6') && $request->file('imagen6')->isValid()) {
            $uploaded_file = $request->file('imagen6');
            $juguete->imagen6 = $uploaded_file->getClientOriginalName();
            $uploaded_file->move('Juguetes/'. $request->path_imagen . '/' . $request->id , $juguete->imagen6);
        }
        if ($request->hasFile('imagen7') && $request->file('imagen7')->isValid()) {
            $uploaded_file = $request->file('imagen7');
            $juguete->imagen7 = $uploaded_file->getClientOriginalName();
            $uploaded_file->move('Juguetes/'. $request->path_imagen . '/' . $request->id , $juguete->imagen7);
        }
        if ($request->hasFile('imagen8') && $request->file('imagen8')->isValid()) {
            $uploaded_file = $request->file('imagen8');
            $juguete->imagen8 = $uploaded_file->getClientOriginalName();
            $uploaded_file->move('Juguetes/'. $request->path_imagen . '/' . $request->id , $juguete->imagen8);
        }


        $juguete->save();
        return $request->id;

    }


    public function publicar($id) {

        $juguete = Juguete::findOrFail($id);
        $juguete->publicado = true;
        $juguete->save();
        return [
            'id' => $id,
            'publicado' => true
        ];


    }

    public function noPublicar($id) {

        $juguete = Juguete::findOrFail($id);
        $juguete->publicado = false;
        $juguete->save();
        return [
            'id' => $id,
            'publicado' => false
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
        Juguete::destroy($id);
        return true;
    }
}
