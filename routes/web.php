<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\InicioController@index'); //cuando llama a la raiz del proyecto, en realidad llama al controlador inicio que creamos y el mttodo index

/*Route::get('/', function () {
    return view('vista1', ['nombre'=> 'juan']);//decia welcome pero pusimos vista1
});*/

//ESTO LO VAMOS A COMEBNTAR, PRQUE VAMOS A LLAMAR A LA VISTA POR
//EL CONTROLADOR NO FUNCIONES ANONIMAS
/*if(View::exists('vista2')){
    Route::get('/', function () {
        return view('vista2');
    });
}else{
    Route::get('/', function () {
        return 'La vista solicitada no existe!!';
    });
}*/



//ejemplo 1- regresando texto
Route::get('/texto', function(){
    return '<h1>Esto es un texto de prueba</h1>';
});
// ejemplo 2- array
Route::get('/arreglo', function(){
    $arreglo= ['Id'=> 1, 'Descripcion'=> 'Producto1'];
    return $arreglo;
});

//ejemplo 3 - pasando parámetros
Route::get('/nombre/{nombre}', function($nombre){
    return '<h1>El nombre es:' .$nombre.'</h1>';
});

//ejemplo 4 - pasando parámetros por default
Route::get('/cliente/{cliente?}', function($cliente='Cliente general'){
    return '<h1>El Cliente es:' .$cliente.'</h1>';
});

//ejemplo 5 reidirigir una ruta
Route::get('/ruta1', function(){
    return '<h1>Esta es la vista de la ruta 1</h1>';
})->name('rutaNro1'); ///definimos el nombre para ruta1

Route::get('/ruta2', function(){
    //return '<h1>Esta es la vista de la ruta 2</h1>';
    return redirect()->route('rutaNro1'); //colocamos el nombre de la ruta 1

}); 

//ejemplo 6
//que pasa si, queremos validar un usuario o un id de usuario y queremos por ejemplo
//que solo se ingresen numeros y solo se ingresen caracteres
Route::get('/usuario/{usuario}', function($usuario){
    return '<h1>El usuario es:' .$usuario.'</h1>';
})->where('usuario', '[A-Za-z]+'); //'[0-9]+' solo numericos




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
