<?php

use App\Http\Controllers\AuthController;
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
use App\Http\Controllers\ProjeDurumController;
use App\Http\Controllers\ProjeGorevleriController;
use App\Http\Controllers\ProjePlanController;
use App\Http\Controllers\ProjePlanlariController;
use App\Http\Controllers\RandevuController;
use App\Http\Controllers\SozlesmeController;
use App\Models\BilgiBankasi;
use App\Models\ProjeGorevleri;
use App\Http\Controllers\CalendarController;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

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


Route::get('/email', function () {
    Mail::to('fahrican.kcn@gmail.com')->send(new Contact());
    return new Contact();
});


/**
 * Auth 
 */


Route::post('auth/save',[AuthController::class,'Save'])->name('auth.save');
Route::post('auth/check',[AuthController::class,'Check'])->name('auth.check');
Route::get('auth/logout',[AuthController::class,'Logout'])->name('auth.logout');
Route::get('auth/register',[AuthController::class,'Register'])->name('auth.register');

Route::group(['middleware'=>['AuthCheck']],function (){

    Route::get('/',[AuthController::class,'Login']);

    Route::get('auth/login',[AuthController::class,'Login'])->name('auth.login');
    
   
   
    Route::resource('/proje', ProjeControllerer::class);

    //*MusteriCcontroller



/*
Route::get('/', function () {
    return view('musteri.musteri');
});*/

//Route::get('/',[MusteriController::class,'index']);

Route::resource('/musteri', MusteriController::class);


//Proje






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

Route::get('/kartolustur/{id}',[PlanController::class,'CreateNewCard']);

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



/**
 * Proje durum controller
 */

 Route::resource('/projedurum', ProjeDurumController::class);
 


/**
 * Randevu
 * 
 */

 Route::get('/randevu', [CalendarController::class,'index'])->name('randevu.index');
 Route::get('/randevu/load',[CalendarController::class,'show'])->name('randevu.show');
 Route::post('randevu/store',[CalendarController::class,'store'])->name('randevu.store');
 Route::post('randevu/update',[CalendarController::class,'update'])->name('randevu.update');
 Route::post('randevu/destroy',[CalendarController::class,'destroy'])->name('randevu.destroy');

 //Route::get('/plan/{id}',[PlanController::class,'index'])->name('plan.index');


//Route for mailing



});

