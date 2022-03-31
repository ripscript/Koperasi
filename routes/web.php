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
Route::middleware(['admin'])->group(function () {
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/home', 'HomeController@index')->name('home');
    
});

Route::middleware(['nonAdmin'])->group(function () {
    Route::get('/', 'LoginController@index')->name('login.index');
    Route::post('/authentication', 'LoginController@authentication')->name('login.authentication');
});