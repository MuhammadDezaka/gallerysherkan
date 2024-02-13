<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KomentarFotoController;
use App\Http\Controllers\LikeFotoController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/app', function () {
    return view('layouts.app');
});


Route::middleware('guest')->group(function(){
	Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
	Route::post('/login',[AuthController::class, 'authenticate'])->name('login.process');
	Route::get('/register',[AuthController::class, 'register_index'])->name('register');
	Route::post('/register',[AuthController::class, 'register'])->name('register.process');

});


// Route::post('/album',[AlbumController::class, 'index'])->name('album.store');
// Route::post('/album/{id}',[AlbumController::class, 'index'])->name('album.edit');
// Route::delete('/album/{id}',[AlbumController::class, 'index'])->name('album.delete');

Route::middleware('auth')->group(function(){
	Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

	Route::get('/album',[AlbumController::class, 'index'])->name('album.index');
	Route::post('/album',[AlbumController::class, 'store'])->name('album.store');
	Route::post('/album/{id}',[AlbumController::class, 'edit'])->name('album.edit');
	Route::delete('/album/{id}',[AlbumController::class, 'delete'])->name('album.delete');
	
	Route::get('/foto',[FotoController::class, 'index'])->name('foto.index');
	Route::post('/foto',[FotoController::class, 'store'])->name('foto.store');
	Route::post('/afoto/{id}',[FotoController::class, 'edit'])->name('foto.edit');
	Route::delete('/foto/{id}',[FotoController::class, 'delete'])->name('foto.delete');
	
	Route::post('/komentar',[KomentarFotoController::class, 'store'])->name('komentar.store');
	Route::post('/like-foto',[LikeFotoController::class, 'store'])->name('like.store');
	
	Route::get('/home',[DashboardController::class, 'index'])->name('home.index');
});
