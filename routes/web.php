<?php
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/', [FrontendController::class,'welcome']);
Route::post('/add/users', [HomeController::class,'add_users'])->name('add.users');

//Song
Route::get('/song',[SongController::class,'index']);
Route::post('add-song',[SongController::class,'store']);
Route::get('edit-song/{id}',[SongController::class,'edit']);
Route::put('update-song/{id}',[SongController::class,'update']);
Route::delete('delete-song/{id}',[SongController::class,'delete']);

//Singer
Route::get('/singer',[SingerController::class,'index']);
Route::post('add-singer',[SingerController::class,'store']);
Route::get('edit-singer/{id}',[SingerController::class,'edit']);
Route::put('update-singer/{id}',[SingerController::class,'update']);
Route::delete('delete-singer/{id}',[SingerController::class,'delete']);