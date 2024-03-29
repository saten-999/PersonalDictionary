<?php

use Illuminate\Support\Facades\Route;
use App\User;
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

Route::get('/ss', 'DictionaryController@test');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/dictionary', 'DictionaryController@index');
    Route::post('/dictionary', 'DictionaryController@store');
    Route::put('/dictionary/{id}', 'DictionaryController@update');
    Route::delete('/dictionary/{id}', 'DictionaryController@destroy');
});
