<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolPagoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//EDITAR
// Route::get('/rol-pago/{id?}',[HomeController::class, 'RolPagoShow']);

Route::resource('/rol-pago','RolPagoController');


Route::get('/rol-pago-delete/{id}',[HomeController::class, 'RolPagoDelete']);
// Route::post('/rol-pago/{id?}',[HomeController::class, 'RolPagoStore']);

Route::get('/balance/{id}',[BalanceController::class, 'show']);
Route::get('/registrar-balance',[BalanceController::class, 'store']);

Route::post('/usuario',[HomeController::class, 'UsuarioStore']);

// Route::get('/saludar/{nombre?}',[HomeController::class, 'saludar']);
Route::get('/mensaje',[HomeController::class, 'mensaje']);


Route::get('/roles', [HomeController::class, 'showRoles']);

Route::get('/rolempleado', [HomeController::class, 'rolEmpleado']);
