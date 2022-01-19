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

Route::get('/', function () {
    return view('login');
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/tambah', 'HomeController@tambah');
Route::post('/home/store', 'HomeController@store');
Route::get('/home/edit/{id}', 'HomeController@edit');
Route::post('/home/update', 'HomeController@update');
Route::get('/home/hapus/{id}', 'HomeController@hapus');
Route::get('/home/cari', 'HomeController@cari');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');