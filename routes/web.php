<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DocenteSolicitudController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EstudianteSolicitudController;
use App\Http\Controllers\ItemEquipoController;
use App\Http\Controllers\ItemEquipoHistorialController;
use App\Http\Controllers\ItemMaterialController;
use App\Http\Controllers\ItemMaterialHistorialController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Categoria 
Route::get('/categoria',[CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/create',[CategoriaController::class,'create'])->name('categoria.create');
Route::get('/categoria/delete/{id}','CategoriaController@destroy');
Route::post('/categoria/update/{id}','CategoriaController@update');
Route::get('/categoria/{id?}',[CategoriaController::class,'index'])->name('categoria.index');

Route::post('/categoria/store',[CategoriaController::class,'store'])->name('categoria.store');
Route::get('/categoria/edit/{id}',[CategoriaController::class,'edit'])->name('categoria.edit');
*/

Route::resource('/categoria', CategoriaController::class);
Route::resource('/docente',DocenteController::class);
Route::resource('/docente-solicitud', DocenteSolicitudController::class);
Route::resource('/equipo', EquipoController::class);
Route::resource('/estudiante-solicitud', EstudianteSolicitudController::class);
Route::resource('/item-equipo', ItemEquipoController::class);
Route::resource('/item-equipo-historial', ItemEquipoHistorialController::class);
Route::resource('/item-material', ItemMaterialController::class);
Route::resource('/item-material-historial', ItemMaterialHistorialController::class);
Route::resource('/laboratorio', LaboratorioController::class);
Route::resource('/material', MaterialController::class);
Route::resource('/proyecto', ProyectoController::class);
Route::resource('/reporte', ReporteController::class);
Route::resource('/proyecto', ProyectoController::class);
Route::resource('/usuario', UserController::class);
