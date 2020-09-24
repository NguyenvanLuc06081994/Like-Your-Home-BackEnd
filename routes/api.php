<?php

use App\Http\Controllers\Api\UserController;
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
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::group(['middleware' => 'jwt.verify'], function () {
    Route::get('customers', [UserController::class, 'index']);
    Route::get('customers/{customer}', [UserController::class, 'show']);
    Route::put('customers/{customer}', [UserController::class, 'update']);
    Route::delete('customers/{customer}', [UserController::class, 'destroy']);
    Route::patch('customers/{customer}', [UserController::class, 'update']);
    Route::post('changePassword/{id}', [UserController::class, 'change_password']);

  Route::get('houses', [\App\Http\Controllers\Api\HouseController::class, 'index']);
  Route::post('houses', [\App\Http\Controllers\Api\HouseController::class, 'store']);
  Route::put('houses/{house}', [\App\Http\Controllers\Api\HouseController::class, 'update']);
  Route::get('houses/{house}', [\App\Http\Controllers\Api\HouseController::class, 'show']);
  Route::delete('houses/{house}', [\App\Http\Controllers\Api\HouseController::class, 'destroy']);
  Route::patch('houses/{house}', [\App\Http\Controllers\Api\HouseController::class, 'update']);

  Route::get('bills',[\App\Http\Controllers\Api\BillController::class,'index']);
  Route::post('bills',[\App\Http\Controllers\Api\BillController::class,'store']);
  Route::put('bills/{bill}',[\App\Http\Controllers\Api\BillController::class,'update']);
  Route::get('bills/{id}',[\App\Http\Controllers\Api\BillController::class,'searchByCustomerId']);
  Route::delete('bills/{bill}',[\App\Http\Controllers\Api\BillController::class,'destroy']);
  Route::patch('bills/{bill}',[\App\Http\Controllers\Api\BillController::class,'update']);

});




