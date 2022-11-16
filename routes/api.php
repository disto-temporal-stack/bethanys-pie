<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\DomiciliariesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RolsController;
use App\Http\Controllers\UsersController;
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

Route::controller(PermissionsController::class)->group(function () {
    Route::get('permissions','index'); //Para obtener todos
    Route::get('permissions/{id}', 'show'); //Para consultar especifico
    Route::post('permissions', 'store'); //Para guardar
    Route::put('permissions/{id}', 'update'); //Para actualizar
    Route::delete('permissions/{id}', 'destroy'); //Para eliminar un registro
});
Route::controller(DomiciliariesController::class)->group(function () {
    Route::get('domiciliaries','index'); 
    Route::get('domiciliaries/{id}', 'show'); 
    Route::post('domiciliaries', 'store'); 
    Route::put('domiciliaries/{id}', 'update'); 
    Route::delete('domiciliaries/{id}', 'destroy'); 
});

Route::controller(OrdersController::class)->group(function () {
    Route::get('orders','index'); 
    Route::get('orders/{id}', 'show'); 
    Route::post('orders', 'store'); 
    Route::put('orders/{id}', 'update'); 
    Route::delete('orders/{id}', 'destroy'); 
});
Route::controller(RolsController::class)->group(function () {
    Route::get('rols','index'); 
    Route::get('rols/{id}', 'show'); 
    Route::post('rols', 'store'); 
    Route::put('rols/{id}', 'update'); 
    Route::delete('rols/{id}', 'destroy'); 
});

Route::controller(UsersController::class)->group(function () {
    Route::get('users','index'); 
    Route::get('users/{id}', 'show'); 
    Route::post('users', 'store'); 
    Route::put('users/{id}', 'update'); 
    Route::delete('users/{id}', 'destroy'); 
});


