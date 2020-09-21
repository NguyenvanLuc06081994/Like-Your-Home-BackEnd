<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('customers', [\App\Http\Controllers\Api\CustomerController::class, 'index']);
Route::post('customers', [\App\Http\Controllers\Api\CustomerController::class, 'store']);
Route::put('customers/{customer}', [\App\Http\Controllers\Api\CustomerController::class, 'update']);
Route::get('customers/{customer}', [\App\Http\Controllers\Api\CustomerController::class, 'show']);
Route::delete('customers/{customer}', [\App\Http\Controllers\Api\CustomerController::class, 'destroy']);
Route::patch('customers/{customer}', [\App\Http\Controllers\Api\CustomerController::class, 'update']);

Route::get('houses', [\App\Http\Controllers\Api\HouseController::class, 'index']);
Route::post('houses', [\App\Http\Controllers\Api\HouseController::class, 'store']);
Route::put('houses/{house}', [\App\Http\Controllers\Api\HouseController::class, 'update']);
Route::get('houses/{house}', [\App\Http\Controllers\Api\HouseController::class, 'show']);
Route::delete('houses/{house}', [\App\Http\Controllers\Api\HouseController::class, 'destroy']);
Route::patch('houses/{house}', [\App\Http\Controllers\Api\HouseController::class, 'update']);

Route::get('bills',[\App\Http\Controllers\Api\BillController::class,'index']);
Route::post('bills',[\App\Http\Controllers\Api\BillController::class,'store']);
