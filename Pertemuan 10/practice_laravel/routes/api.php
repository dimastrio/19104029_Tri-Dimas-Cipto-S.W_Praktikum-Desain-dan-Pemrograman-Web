<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/student',[StudentApiController::class,'store'])->name('student.store');
Route::get('/student',[StudentApiController::class,'index'])->name('student.index');
Route::put('/student/{id}',[StudentApiController::class,'update'])->name('student.update');
Route::delete('/student/{id}',[StudentApiController::class,'destroy'])->name('student.destroy');
