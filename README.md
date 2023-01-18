Uri

A brief description of what this project does and who it's for


## Acknowledgements

 - [Awesome Readme Templates](https://awesomeopensource.com/project/elangosundar/awesome-README-templates)
 - [Awesome README](https://github.com/matiassingers/awesome-readme)
 - [How to write a Good readme](https://bulldogjob.com/news/449-how-to-write-a-good-readme-for-your-github-project)


## Badges

Add badges from somewhere like: [shields.io](https://shields.io/)

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)


## 🚀 About Me
I'm a full stack developer...


# Hi, I'm Mamun! 👋


## Installation

Install my-project with php artisan

```bash
 
Install my- project with Gitbash

//First Project Installation Command
composer create-project laravel/laravel Uri//
Composer require laravel/ui//
php artisan ui bootstrap --auth//
npm Install//
npm run dev//
php artisan migrate//
//End Installation

//Controller
php artisan make:controller SongController
php artisan make:controller SingerController

//Models
php artisan make:Model Song -m
php artisan make:Model Singer -m

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



    
