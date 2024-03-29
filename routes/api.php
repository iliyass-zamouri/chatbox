<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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
Auth::routes();
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register
','App\Http\Controllers\Auth\RegisterController@register');
Route::post('/login','App\Http\Controllers\Auth\LoginController@login');
Route::post('/send-message-api',[App\Http\Controllers\ContactsController::class,'send_api']);
Route::get('/contacts/{id}',[App\Http\Controllers\ContactsController::class,'get_api']);
Route::get('/conversation/{id}/{user}',[App\Http\Controllers\ContactsController::class,'getMessagesApi']);

// Route::post('login', [App\Http\Controllers\Auth\LoginController::class,'login']);
// Route::post('register', [App\Http\Controllers\Auth\RegisterController::class,'register']);
