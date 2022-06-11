<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Auth;




use App\Http\Controllers\Registros_contableController;
use App\Http\Controllers\Controller;



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

Route::get('/', function () {
    return view('inicio');
});

//Auth::routes();

Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

/*
 
Route::get('search', [Select2SearchController::class,'index']);
Route::get('ajax-autocomplete-search', [Select2SearchController::class, 'selectSearch']);


//Route::get('fullcalender', [CalendarController::class, 'index']);
//Route::post('fullcalenderAjax', [CalendarController::class, 'ajax']);

Route::post('clientes',[App\Http\Controllers\ClientesController::class, 'store'])->name('clientes');
Route::get('perfil_usuario',[App\Http\Controllers\UserController::class,'index'])->name('perfil_usuario');

 


Route::get('cliente/{id}', [Select2SearchController::class,'mostrarCliente'])->name('cliente');

Route::post('buscarmascota', [MascotasController::class,'buscarMascota'])->name('buscarmascota');


Route::post('editarCliente/{id_cliente}',[App\Http\Controllers\ClientesController::class ,'update'])->name('editarCliente');

Route::get('mostrarmascotas/{id_clientes}', [App\Http\Controllers\MascotasController::class, 'mostrarMascotas']);

Route::post('/mascotas',[App\Http\Controllers\MascotasController::class, 'store'])->name('mascotas');

Route::post('/eliminar_mascota/{id}', [App\Http\Controllers\MascotasController::class, 'destroy']);

Route::post('/listado_citas',[App\Http\Controllers\ListadoCitaMedicaController::class, 'store'])->name('listado_citas');

*/

Route::get('/registros_contable',[App\Http\Controllers\Registros_contableController::class,'index']);

Route::post('/guardar_saldo',[App\Http\Controllers\Registros_contableController::class,'store']);

Route::post('/agregar_ingreso',[App\Http\Controllers\Registros_contableController::class,'agregar_ingreso'])->name('agregar_ingreso');



/*

Route::get('/listado_cliente', [App\Http\Controllers\ListadoCitaMedicaController::class, 'index']);

Route::delete('eliminar_cita/{id}', [App\Http\Controllers\ListadoCitaMedicaController::class, 'destroy'])->name('eliminar_cita');
*/
