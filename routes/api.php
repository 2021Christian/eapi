<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
//modifico el auth
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/products', ProductController::class);

Route::group([ 'prefix'=>'products' ], function(){
    Route::apiResource('/{product}/reviews', ReviewController::class);
});

/*
//MANEJO EL ERROR DE RUTAS QUE NO EXISTEN
Route::fallback(function(){
    return response()->json([
        'errors' => 'Page Not Found. Bad Route'], Response::HTTP_NOT_FOUND);
});
*/