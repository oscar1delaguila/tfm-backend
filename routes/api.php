<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//////////
//API JSON 
//////////


/*
//juguetes/<page>
Route::get('/juguetes/{page}', function ($page) {

    return JuguetesResource::collection(Juguete::simplePaginate($perPage = 10, $columns = ['id','nombre_juguete','descripcion','fecha_publicacion'], $pageName = '',$page));
  
});
*/


//API Juguetes
Route::get('/juguetes/page/{page}', 'App\Http\Controllers\JugueteController@index');

Route::get('/juguetes/categoria/page/{page}/{literalABuscar}', 'App\Http\Controllers\JugueteController@busquedaPorCategoria');

Route::get('/juguetes/busqueda/page/{page}/{literalABuscar}', 'App\Http\Controllers\JugueteController@busquedaPorBuscador');

Route::get('/juguete/{id}', 'App\Http\Controllers\JugueteController@show'); 

Route::get('/juguete/publicar/{id}', 'App\Http\Controllers\JugueteController@publicar'); 

Route::get('/juguete/nopublicar/{id}', 'App\Http\Controllers\JugueteController@noPublicar'); 

Route::post('/juguete','App\Http\Controllers\JugueteController@store')->middleware(middleware:'auth:sanctum') ;

Route::post('/juguete-update','App\Http\Controllers\JugueteController@update')->middleware(middleware:'auth:sanctum') ;

Route::delete('/juguete/{id}','App\Http\Controllers\JugueteController@destroy')->middleware(middleware:'auth:sanctum') ;

//Route::put('/juguete/{id}','App\Http\Controllers\JugueteController@update');



//API Categorias
Route::get('/categorias','App\Http\Controllers\CategoriaController@index');


//API Experiencias

//Route::put('/experiencia/{id}','App\Http\Controllers\ExperienciaController@update');

Route::get('/experiencia/page/{page}','App\Http\Controllers\ExperienciaController@index');

Route::get('/experiencia/usuario/page/{page}/{idUsuario}','App\Http\Controllers\ExperienciaController@experienciasByUsuario')->middleware(middleware:'auth:sanctum') ;

Route::get('/experiencia/{id}', 'App\Http\Controllers\ExperienciaController@show'); 

Route::get('/experiencia/publicar/{id}', 'App\Http\Controllers\ExperienciaController@publicar'); 

Route::get('/experiencia/nopublicar/{id}', 'App\Http\Controllers\ExperienciaController@noPublicar'); 

Route::get('/experiencias/titulos-juguetes', 'App\Http\Controllers\ExperienciaController@juguetesTitulos');

Route::post('/experiencia','App\Http\Controllers\ExperienciaController@store')->middleware(middleware:'auth:sanctum') ;

Route::post('/experiencia-update','App\Http\Controllers\ExperienciaController@update')->middleware(middleware:'auth:sanctum') ;

Route::delete('/experiencia/{id}','App\Http\Controllers\ExperienciaController@destroy')->middleware(middleware:'auth:sanctum') ;


//API Sesion
Route::post('/login','App\Http\Controllers\AuthController@login');

//Route::post('/sesion/register','App\Http\Controllers\AuthController@register')->middleware(middleware:'auth:sanctum') ;

Route::post('/register','App\Http\Controllers\AuthController@register');

Route::get('/sesion/{id}', 'App\Http\Controllers\UserController@show')->middleware(middleware:'auth:sanctum') ; 

Route::put('/sesion/{id}','App\Http\Controllers\UserController@update')->middleware(middleware:'auth:sanctum') ;

Route::delete('/sesion/{id}','App\Http\Controllers\UserController@destroy');


//API Favoritos
Route::get('/favoritos/{idUser}','App\Http\Controllers\FavoritoController@index')->middleware(middleware:'auth:sanctum') ;

Route::get('/favoritos/{idJuguete}/{idUser}','App\Http\Controllers\FavoritoController@obtenerIdFavorito')->middleware(middleware:'auth:sanctum') ;

Route::post('/favoritos','App\Http\Controllers\FavoritoController@store')->middleware(middleware:'auth:sanctum') ;

Route::delete('/favoritos/{id}','App\Http\Controllers\FavoritoController@destroy')->middleware(middleware:'auth:sanctum') ;



//mail

Route::post('/contactanos','App\Http\Controllers\sendMailController@sendMail');

/*
Route::get('/contactanos/{id}', function ($idUser) {

    $correo = new ContactanosMailable;

    //destinatario
    //Mail::to('oscar1delaguila@gmail.com')->send($correo);
    Mail::to(DB::table('users')->select('email')->where('id','=', $idUser )->get())->send($correo);

    return response()->json([
        'message' => 'Mensaje enviado',
     ], status: 200);


});
*/
