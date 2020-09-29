<?php

use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\HouseController;
use App\Http\Controllers\Api\ImageController;
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
//Route::get('/auth/redirect/{data}', [SocialController::class, 'redirect']);
//Route::get('/callback/google/{data}', [SocialController::class, 'callback']);

//Route::get('/login',[\App\Http\Controllers\HomeController::class,'index'])->name('login');
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::group(['middleware' => 'jwt.verify'], function () {
    Route::get('customers', [UserController::class, 'index']);
    Route::get('customers/{customer}', [UserController::class, 'show']);
    Route::put('customers/{customer}', [UserController::class, 'update']);
    Route::delete('customers/{customer}', [UserController::class, 'destroy']);
    Route::patch('customers/{customer}', [UserController::class, 'update']);
    Route::post('changePassword/{id}', [UserController::class, 'change_password']);


  Route::get('houses', [HouseController::class, 'index']);
  Route::post('houses', [HouseController::class, 'store']);
  Route::put('houses/{house}', [HouseController::class, 'update']);
  Route::get('houses/{house}',  [HouseController::class, 'show']);
  Route::delete('houses/{house}', [HouseController::class, 'destroy']);
  Route::patch('houses/{house}', [HouseController::class, 'update']);
  Route::get('houses/searchci/{id}', [HouseController::class, 'getHouseByCustomerId']);
  Route::post('houses/multiSearch', [HouseController::class, 'multiSearch']);

  Route::get('bills',[BillController::class,'index']);
  Route::post('bills',[BillController::class,'store']);
  Route::put('bills/{bill}',[BillController::class,'update']);
  Route::get('bills/searchbyci/{id}',[BillController::class,'searchByCustomerId']);
  Route::delete('bills/{bill}',[BillController::class,'destroy']);
  Route::patch('bills/{bill}',[BillController::class,'update']);
  Route::get('bills/searchbyhi/{id}',[BillController::class,'getBillByHouseId']);

  Route::post('images',[ImageController::class,'store']);
  Route::get('images',[ImageController::class,'index']);
  Route::get('images/{id}',[ImageController::class,'getImageByHouse']);

  Route::get('comments',[CommentController::class, 'index']);
  Route::post('comments',[CommentController::class, 'store']);


});




