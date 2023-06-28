<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\FacilitiesController;
use App\Http\Controllers\Api\MessageController;

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
Route::get('/apartments/{id}', [ApartmentController::class, 'show']);

/*rotta avere tutti gli appartamenti che rientrano nel radius passato a partire dalla coordinata (lat/lon) */
Route::post('/apartments/search/{latitude}/{longitude}/{radius}/{price}/{beds}/{m2}/{rooms}/{bathrooms}/{wifi}/{car}/{pool}/{door}/{sauna}/{water}', [ApartmentController::class, 'search']);

/*rotta per email*/
Route::post('/apartment/{id}', [MessageController::class, 'store']);

/*rotta avere tutti i servizi del DB */
Route::get('/facilities', [FacilitiesController::class, 'index']);