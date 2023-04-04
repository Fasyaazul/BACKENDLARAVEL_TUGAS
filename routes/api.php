<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\MahasiswaController;
use App\http\Controllers\BukuController;
use App\http\Controllers\JurusanController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getmahasiswa',[MahasiswaController::class,'getmahasiswa']);
route::get('/getid/{id}',[MahasiswaController::class,'getid']);
route::post('/createmahasiswa',[MahasiswaController::class,'createmahasiswa']);
route::put('/updatemahasiswa/{id}',[MahasiswaController::class,'updatemahasiswa']);
route::delete('/deletemahasiswa/{id}',[MahasiswaController::class,'deletemahasiswa']);

Route::get('/getbuku',[BukuController::class,'getbuku']);
route::get('/getid_buku/{id}',[BukuController::class,'getid_buku']);
route::post('/createbuku',[BukuController::class,'createbuku']);
route::put('/updatebuku/{id}',[BukuController::class,'updatebuku']);
route::delete('/deletebuku/{id}',[BukuController::class,'deletebuku']);


Route::get('/getjurusan',[JurusanController::class,'getjurusan']);
route::get('/getid/{id}',[JurusanController::class,'getid']);
route::post('/createjurusan',[JurusanController::class,'createjurusan']);
route::put('/updatejurusan/{id}',[JurusanController::class,'updatejurusan']);
route::delete('/deletjurusan/{id}',[JurusanController::class,'deletejurusan']);