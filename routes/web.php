<?php

use App\Http\Controllers\BilgiBankasiController;
use App\Http\Controllers\denemecontroller;
use App\Http\Controllers\musteri;
use App\Http\Controllers\MusteriController;
use App\Http\Controllers\ProjeControllerer;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonelController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProjeGorevleriController;
use App\Http\Controllers\ProjePlanController;
use App\Http\Controllers\ProjePlanlariController;
use App\Http\Controllers\SozlesmeController;
use App\Models\BilgiBankasi;
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


/**
 * *BilgiBankasi Controller
 */


// Route::resource('/bilgibankasi', BilgiBankasiController::class);


Route::get('/bilgibankasi', [BilgiBankasiController::class,'index']);

Route::post('/bilgiadd/{id}',[BilgiBankasiController::class,'store']);
Route::get('bilgibankasi/{id}',[BilgiBankasiController::class,'show']);

Route::get('indir/{id}',[BilgiBankasiController::class,'downloadFile']);

Route::get('dosyaid/{id}',[BilgiBankasiController::class,'GetDosyaID']);

Route::patch('bilgibankasi/{id}',[BilgiBankasiController::class,'updateBilgiDurumu']);

Route::post('/bilgiupdate/{id}',[BilgiBankasiController::class,'UpdateBilgi']);

Route::post("/delete/{id}",[BilgiBankasiController::class,'Delete']);


/**
 * 
 * *PlanController
*/
Route::get('/plan/{id}',[PlanController::class,'index'])->name('plan.index');

Route::get('/projeler',[PlanController::class,'a']);

Route::post('/kartolustur/{id}',[PlanController::class,'CreateNewCard']);

Route::post('/update/{id}',[PlanController::class,'UpdateCard']);

Route::get('jsonplan/{id}', [PlanController::class,'GetPlanWithJson']);

Route::post('sil/{id}',[PlanController::class,'Delete']);

Route::post('/durumupdate',[PlanController::class,'CardDurumUpdate']);




// Route::get('/proje/{proje}/plan', function ($proje) {
//     return $proje;
// });
// Route::post('proje/plan', function () {
//     return view('proje.plan');
    
// });

//Proje Gorev

Route::resource('/personel',PersonelController::class);



/**
 * Sözleşme 
 */

 Route::resource('/sozlesme', SozlesmeController::class);



