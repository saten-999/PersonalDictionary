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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dictionary', 'DictionaryController@index');
Route::post('/dictionary', 'DictionaryController@store');


Route::get('/mail', function () {

    $numbers = range(0, 15);
                    shuffle($numbers);
                   
                    $return = array_slice($numbers, 0, 5);
    // $user = User::latest()->get();

    // foreach ($user as $key => $value) {

    //     Mail::to('satabr1999@gmail.com')->send( new App\Mail\Reminder());

    // }
  
});