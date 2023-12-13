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

/*Route::get('/contact', function () {
    return view('contact');
});*/
Route::resource('/contact','\App\Http\Controllers\ContactController')->except('show');
Route::resource('/','\App\Http\Controllers\MainController')->except('show');
Route::resource('/admin','\App\Http\Controllers\AdminController')->except('show');
Route::resource('/user','\App\Http\Controllers\UserController')->except('show');

/*Route::get('/admin',function (){
    return view('admin');
});

/*Route::get('/about',function (){
    return view('./resources/views/about');
});*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
