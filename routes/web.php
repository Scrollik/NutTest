<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumcreateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('album',AlbumController::class)->only([
   'index','update','destroy','edit',
]);
Route::group(['middleware' => 'guest'],function (){
    Route::get('/register',[RegisterController::class,'create'])->name('register');
    Route::post('/register',[RegisterController::class,'store'])->name('register.post');
    Route::get('/login',[LoginController::class,'create'])->name('login');
    Route::post('/login',[LoginController::class,'store'])->name('login.post');
});
Route::group(['middleware' => 'auth'],function (){
    Route::get('/',[AlbumController::class,'index'])->name('album.index');
    Route::get('/albumcreate',[AlbumcreateController::class,'index'])->name('albumcreate.create');
    Route::get('/albumfind',[AlbumcreateController::class,'find'])->name('albumcreate.find');
    Route::post('/albumstore',[AlbumcreateController::class,'store'])->name('albumcreate.store');
    Route::get('/album/{id}',[AlbumController::class,'edit'])->name('album.edit');
    Route::put('/albumupdate',[AlbumController::class,'update'])->name('album.update');
    Route::delete('/albumdelete/{id}',[AlbumController::class,'destroy'])->name('album.destroy');
    Route::post('/logout',[LoginController::class,'destroy'])->name('logout');
});


