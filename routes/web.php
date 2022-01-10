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

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('index');

Route::name('user.')->group(function(){
    Route::prefix('/user')->group(function(Illuminate\Routing\Router $router){
    Route::post('/create',[\App\Http\Controllers\UsersController::class,'create'])->name('create');
    Route::get('/create',[\App\Http\Controllers\UsersController::class,'create'])->name('add');
    Route::post('/auth',[\App\Http\Controllers\UsersController::class,'auth'])->name('auth');
    Route::get('/show/{id}',[\App\Http\Controllers\UsersController::class,'show'])->name('show');
    Route::delete('/delete/{id}',[\App\Http\Controllers\UsersController::class,'delete'])->name('delete');
    });
});


Route::resource('/tasks',\App\Http\Controllers\TaskController::class);
Route::get('/tasks/create',[\App\Http\Controllers\TaskController::class,'create']);
Route::get('/tasks/edit/{task}',[\App\Http\Controllers\TaskController::class,'edit'])->name('edit');

