<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login_controller;


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

Route::get('/home',[login_controller::class, 'view_login_page']);

Route::post('/login',[login_controller::class, 'login']);
Route::get('/dashboard',[login_controller::class, 'view_dashboard']);
Route::get('/form',[login_controller::class, 'view_form']);
Route::post('/send-data',[login_controller::class, 'form_data']);
Route::delete('/delete/{id}',[login_controller::class, 'delete_func']);
Route::get('/edit/{id}',[login_controller::class, 'fetch_edit']);
Route::post('/save-edit',[login_controller::class, 'save_edit']);
Route::get('/logout',[login_controller::class, 'logout']);