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

Route::get('/rol-pago',[RolPagoController::class, 'create'])->name('rol-pago');

Route::post('/rol-pago/generar',[RolPagoController::class, 'GenerarRolPago'])->name('rol-pago-generar');

Route::get('/rol-pago/generar/{rolpago_id?}',[BalanceController::class, 'create']);
Route::post('/rol-pago/generar/{rolpago_id}',[BalanceController::class, 'store']);
