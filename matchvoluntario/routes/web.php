<?php

use Illuminate\Support\Facades\Route;

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

//Root
Route::get('/', function () {
    return view('site.home');
})->name('home');

//Ongs Controller
Route::get('/ongs', 'App\Http\Controllers\OngsController@index')->name('ongs');
Route::get('/ongs_details', 'App\Http\Controllers\OngsController@show')->name('ongsDetails');

//Login Controller
Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::get('/signup', 'App\Http\Controllers\LoginController@show')->name('signup');

//Contact Controller
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');