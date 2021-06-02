<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contacts','App\Http\Controllers\ContactsController@get');

Route::get('/conversation/{id}','App\Http\Controllers\ContactsController@getMessages');

Route::post('/conversation/send','App\Http\Controllers\ContactsController@send');

Route::post('/conversation/delete','App\Http\Controllers\ContactsController@deleteMessage');
