<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\StudentController;

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




Route::get('/',[MyController::class,'index'])->name('index');
Route::get('/tentang',[MyController::class,'about'])->name('about');
Route::get('/mahasiswa',[StudentController::class,'index'])->name('student.index');
Route::get('/mahasiswa/tambah',[StudentController::class,'create'])->name('student.create');
Route::post('/mahasiswa/tambah',[StudentController::class,'store'])->name('student.store');
Route::get('/mahasiswa/edit/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::put('/mahasiswa/edit/{id}',[StudentController::class,'update'])->name('student.update');
Route::delete('/mahasiswa/hapus/{id}',[StudentController::class,'destroy'])->name('student.destroy');