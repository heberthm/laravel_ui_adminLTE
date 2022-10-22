<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Select2SearchController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\UserController;

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
    return view('auth.login');
});

Auth::routes();



Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');



Route::get('search', [Select2SearchController::class,'index']);
Route::get('ajax-autocomplete-search', [Select2SearchController::class, 'selectSearch']);


//Route::get('fullcalender', [CalendarController::class, 'index']);verificarcliente
//Route::post('fullcalenderAjax', [CalendarController::class, 'ajax']);

Route::post('clientes',[App\Http\Controllers\ClientesController::class, 'store'])->name('clientes');
//Route::get('/mostrar_clientes/{id_clientes}',[App\Http\Controllers\ClientesController::class, 'mostrarCliente']);
Route::post('verificar_cliente', [App\Http\Controllers\ClientesController::class,'verificarCliente'])->name('verificar_cliente');
 
Route::get('fullcalendareventmaster',[CalendarController::class,'index']);
Route::post('fullcalendareventmaster/create',[CalendarController::class,'create']);
Route::post('fullcalendareventmaster/update',[CalendarController::class,'update']);
Route::post('fullcalendareventmaster/delete',[CalendarController::class,'destroy']);
Route::get('fullcalendareventmaster/update_event',[CalendarController::class,'update_event']);

Route::get('cliente/{id}', [Select2SearchController::class,'mostrarCliente'])->name('cliente');

Route::post('buscarmascota', [MascotasController::class,'buscarMascota'])->name('buscarmascota');

Route::post('editarCliente/{id_cliente}',[App\Http\Controllers\ClientesController::class ,'update'])->name('editarCliente');

Route::get('/mascota/{id}', [App\Http\Controllers\MascotasController::class, 'mostrarMascotas']);

Route::get('/listado_mascotas/{id}',[App\Http\Controllers\MascotasController::class, 'index']);


Route::post('/mascotas',[App\Http\Controllers\MascotasController::class, 'store'])->name('mascotas');

Route::delete('/eliminar_mascota/{id}', [App\Http\Controllers\MascotasController::class, 'destroy'])->name('eliminar_mascota');

Route::post('/listado_citas',[App\Http\Controllers\ListadoCitaMedicaController::class, 'store'])->name('listado_citas');

//Route::get('/listado_mascotas/{id}',[App\Http\Controllers\MascotasController::class, 'index']);

Route::get('/listado_cliente', [App\Http\Controllers\ListadoCitaMedicaController::class, 'index']);

Route::delete('eliminar_cita/{id}', [App\Http\Controllers\ListadoCitaMedicaController::class, 'destroy'])->name('eliminar_cita');
