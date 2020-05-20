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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'auth@index');
Route::post('/auth', 'auth@store');

Route::patch('/user/absen/{user_absen}', 'User@update');

Route::get('/user/absen', 'User@edit');

// Route::get('/update_data', 'User@update_data');

Route::get('/user', 'user@index');

Route::get('/absens/{session}', 'Absens@index');

// Route::get('/absens/{session}')
