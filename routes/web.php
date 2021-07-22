<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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

/*Route::get('/', function () {
    return view('pegawai');
}); 
*/

Route::get('/',[EmployeeController::class,'index'])->name('index');
Route::get('/pegawai',[EmployeeController::class,'index'])->name('pegawai');
Route::get('/pegawaisortbynama',[EmployeeController::class,'pegawaisortbynama'])->name('pegawaisortbynama');
Route::get('/pegawaisortbyregister',[EmployeeController::class,'pegawaisortbyregister'])->name('pegawaisortbyregister');
Route::get('/tambahpegawai',[EmployeeController::class,'tambahpegawai'])->name('tambahpegawai');
Route::post('/tambahkan',[EmployeeController::class,'tambahkan'])->name('tambahkan');

Route::get('/showpegawai/{id}',[EmployeeController::class,'showpegawai'])->name('showpegawai');
Route::get('/editpegawai/{id}',[EmployeeController::class,'editpegawai'])->name('editpegawai');
Route::post('/doeditpegawai/{id}',[EmployeeController::class,'doeditpegawai'])->name('doeditpegawai');
Route::get('/deletepegawai/{id}',[EmployeeController::class,'deletepegawai'])->name('deletepegawai');

Route::get('/expdf',[EmployeeController::class,'expdf'])->name('expdf');
Route::get('/exexcel',[EmployeeController::class,'exexcel'])->name('exexcel');
Route::post('/importexcel',[EmployeeController::class,'importexcel'])->name('importexcel');