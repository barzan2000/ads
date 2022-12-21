<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth.sanctum','verified'])->get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctors_view',[AdminController::class,'addview']);

Route::post('/upload_doctor',[AdminController::class,'upload']);

Route::post('/appointment',[HomeController::class,'appointment']);

Route::get('/myAppointment',[HomeController::class,'myAppointment']);
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);

Route::get('/showAppointments',[AdminController::class,'showAppointments']);

Route::get('/approved/{id}',[AdminController::class,'approved']);

Route::get('/cancelled/{id}',[AdminController::class,'cancelled']);

Route::get('/showDoctor',[AdminController::class,'showDoctor']);

Route::get('/deleteDoctor/{id}',[AdminController::class,'deleteDoctor']);

Route::get('/updateDoctor/{id}',[AdminController::class,'updateDoctor']);

Route::post('/editDoctor/{id}',[AdminController::class,'editDoctor']);

Route::get('/emailview/{id}',[AdminController::class,'emailview']);

Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);


require __DIR__.'/auth.php';
