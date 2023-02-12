<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SpecialController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
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
})->name('home');
Route::get('/index',[AuthController::class,'index'])->name('index');


//auth
Route::prefix('/auth')->name('auth.')->group(function(){
    Route::get('/login',[AuthController::class,'loginForm'])->name('login');
    Route::post('/postLogin',[AuthController::class,'postLogin'])->name('postLogin');
    Route::get('/register',[AuthController::class,'registerForm'])->name('register');
    Route::post('/postRegister',[AuthController::class,'postRegister'])->name('postRegister');
    Route::get('/logOut',[AuthController::class,'logOut'])->name('logout');
});

//admin
Route::prefix('/admin')->name('admin.')->group(function(){
    Route::get('/index',[AdminController::class,'index'])->name('index');
    Route::prefix('/specialized')->name('specialized.')->group(function(){
        Route::get('/index',[SpecialController::class,'index'])->name('index');
    });
});
//teacher
Route::prefix('/teacher')->name('teacher.')->group(function(){
    Route::get('/index',[TeacherController::class,'index'])->name('index');
});
//student
Route::prefix('/student')->name('student.')->group(function(){
    Route::get('/index',[AuthController::class,'index'])->name('index');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
