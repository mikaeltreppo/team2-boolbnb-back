<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentController;

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

/*rotta avere tutti i gli appartamenti del DB */
Route::get('/apartments', [ApartmentController::class, 'index']);


/*rotta avere tutti gli appartamenti che rientrano nel radius passato a partire dalla coordinata (lat/lon) */
Route::post('/apartments/search/{latitude}/{longitude}/{radius}', [ApartmentController::class, 'search']);