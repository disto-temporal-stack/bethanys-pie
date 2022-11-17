<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\DeliveryMansController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Models\Category;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\OrderDetail;
use App\Models\PermissionRole;
use App\Models\PieIngredient;

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

Route::controller(DeliveryMansController::class)->group(function () {
    Route::get('delivery_mans','index'); 
    Route::get('delivery_mans/{id}', 'show'); 
    Route::post('delivery_mans', 'store'); 
    Route::put('delivery_mans/{id}', 'update'); 
    Route::delete('delivery_mans/{id}', 'destroy'); 
});

Route::controller(OrdersController::class)->group(function () {
    Route::get('orders','index'); 
    Route::get('orders/{id}', 'show'); 
    Route::post('orders', 'store'); 
    Route::put('orders/{id}', 'update'); 
    Route::delete('orders/{id}', 'destroy'); 
});

Route::controller(RolesController::class)->group(function () {
    Route::get('roles','index'); 
    Route::get('roles/{id}', 'show'); 
    Route::post('roles', 'store'); 
    Route::put('roles/{id}', 'update'); 
    Route::delete('roles/{id}', 'destroy'); 
});

Route::controller(UsersController::class)->group(function () {
    Route::get('users','index'); 
    Route::get('users/{id}', 'show'); 
    Route::post('users', 'store'); 
    Route::put('users/{id}', 'update'); 
    Route::delete('users/{id}', 'destroy'); 
});

Route::controller(PermissionRole::class)->group(function () {
    Route::get('permission_roles','index'); 
    Route::get('permission_roles/{id}', 'show'); 
    Route::post('permission_roles', 'store'); 
    Route::put('permission_roles/{id}', 'update'); 
    Route::delete('permission_roles/{id}', 'destroy'); 
});

Route::controller(Category::class)->group(function () {
    Route::get('categories','index'); 
    Route::get('categories/{id}', 'show'); 
    Route::post('categories', 'store'); 
    Route::put('categories/{id}', 'update'); 
    Route::delete('categories/{id}', 'destroy'); 
});

Route::controller(Image::class)->group(function () {
    Route::get('images','index'); 
    Route::get('images/{id}', 'show'); 
    Route::post('images', 'store'); 
    Route::put('images/{id}', 'update'); 
    Route::delete('images/{id}', 'destroy'); 
});

Route::controller(Provider::class)->group(function () {
    Route::get('providers','index'); 
    Route::get('providers/{id}', 'show'); 
    Route::post('providers', 'store'); 
    Route::put('providers/{id}', 'update'); 
    Route::delete('providers/{id}', 'destroy'); 
});

Route::controller(Pie::class)->group(function () {
    Route::get('pies','index'); 
    Route::get('pies/{id}', 'show'); 
    Route::post('pies', 'store'); 
    Route::put('pies/{id}', 'update'); 
    Route::delete('pies/{id}', 'destroy'); 
});

Route::controller(Ingredient::class)->group(function () {
    Route::get('ingredients','index'); 
    Route::get('ingredients/{id}', 'show'); 
    Route::post('ingredients', 'store'); 
    Route::put('ingredients/{id}', 'update'); 
    Route::delete('ingredients/{id}', 'destroy'); 
});

Route::controller(PieIngredient::class)->group(function () {
    Route::get('pie-ingredients','index'); 
    Route::get('pie-ingredients/{id}', 'show'); 
    Route::post('pie-ingredients', 'store'); 
    Route::put('pie-ingredients/{id}', 'update'); 
    Route::delete('pie-ingredients/{id}', 'destroy'); 
});

Route::controller(OrderDetail::class)->group(function () {
    Route::get('order-detail','index'); 
    Route::get('order-detail/{id}', 'show'); 
    Route::post('order-detail', 'store'); 
    Route::put('order-detail/{id}', 'update'); 
    Route::delete('order-detail/{id}', 'destroy'); 
});