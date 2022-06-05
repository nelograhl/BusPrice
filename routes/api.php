<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\CoefConsumoController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\RegistropController;
use App\Http\Controllers\TipoMantenimientoController;
use App\Http\Controllers\TramoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('buses', BusController::class);
Route::resource('config', ConfigController::class);
Route::resource('registrosp', RegistropController::class);
Route::resource('tipomantenimientos', TipoMantenimientoController::class);
Route::resource('tramos', TramoController::class);
Route::resource('coeficientes', CoefConsumoController::class);
