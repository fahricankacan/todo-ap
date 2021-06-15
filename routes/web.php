<?php

use App\Http\Controllers\denemecontroller;
use App\Http\Controllers\musteri;
use App\Http\Controllers\MusteriController;
use App\Http\Controllers\ProjeControllerer;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjeGorevleriController;
use App\Models\ProjeGorevleri;

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

//*MusteriCcontroller

Route::resource('/', DashboardController::class);

/*
Route::get('/', function () {
    return view('musteri.musteri');
});*/

//Route::get('/',[MusteriController::class,'index']);

Route::resource('/musteri', MusteriController::class);


//Proje

Route::resource('/proje', ProjeControllerer::class);


//Proje Gorev

Route::resource('/projegorev', ProjeGorevleriController::class);
