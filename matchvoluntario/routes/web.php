<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

//Ongs Controller
Route::get('/ong/signup', 'App\Http\Controllers\OngsController@create')->name('createOng');
Route::post('/ong/create', 'App\Http\Controllers\OngsController@save')->name('saveOng'); 
Route::get('/ongs', 'App\Http\Controllers\OngsController@index')->name('ongs');
Route::get('/ongs_details', 'App\Http\Controllers\OngsController@show')->name('ongsDetails');
Route::post('/ong/logout', 'App\Http\Controllers\OngsController@logoutOng')->name('logoutOng');

//Login Controller
Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/auth', 'App\Http\Controllers\LoginController@auth')->name('authUsuario');
Route::get('/ong/login', 'App\Http\Controllers\LoginController@loginOng')->name('loginOng');
Route::post('/ong/auth', 'App\Http\Controllers\LoginController@authOng')->name('authOng');

//Usuarios Controller
Route::get('/usuarios/signup', 'App\Http\Controllers\UsuariosController@create')->name('signup');
Route::post('/usuarios/create', 'App\Http\Controllers\UsuariosController@save')->name('saveUsuario');
Route::get('/usuario/forget-password', 'App\Http\Controllers\UsuariosController@ForgetPassword')->name('forget-password');
Route::post('/usuario/logout', 'App\Http\Controllers\UsuariosController@logout')->name('logout');



//Contact Controller
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');