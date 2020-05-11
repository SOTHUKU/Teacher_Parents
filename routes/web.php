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
    return view('users.login');
});



Auth::routes();

Route::get('/dashboard', 'UserController@home')->name('users.home');



Route::post('/login', 'UserController@login')->name('users.login');
Route::get('/logout', 'UserController@logout')->name('users.logout');


Route::resource('homeworks','HomeworkController');

Route::resource('users','UserController');

Route::resource('parents','ParentsController');
Route::resource('students','StudentController');