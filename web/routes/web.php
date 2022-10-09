<?php

use App\Http\Controllers\Student\StudentController;
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
    return view('layouts/home/home-layout');
});
Route::get('/login', function () {
    return view('layouts.app');
})->name('login');
Route::get('/register', function () {
    return view('layouts/admin/admin-layout');
});
//student
Route::prefix('/student')->name('student.')->group(function(){
    Route::prefix('/auth')->name('auth.')->group(function(){
        Route::get('/login',[StudentController::class,'loginForm'])->name('login');
        Route::post('/postLogin',[StudentController::class,'postLogin'])->name('postLogin');
        Route::get('/register',[StudentController::class,'registerForm'])->name('register');
    });
    Route::get('/index',[StudentController::class,'index'])->name('index');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
