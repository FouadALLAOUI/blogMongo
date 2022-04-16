<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\AuthController;


Route::get('/doc', [DocumentController::class,'index']); 
Route::get('/doc/{id}', [DocumentController::class,'show']); 
Route::post('/doc/add', [DocumentController::class,'store']);
Route::put('/doc/{id}', [DocumentController::class,'update']);
Route::delete('/doc/{id}', [DocumentController::class,'destroy']);

//================================================================

Route::post('/register', [AuthController::class,'register']);  
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout']);

Route::group(['middleware' => ['auth:sanctum']], function () {

   Route::get('/file', [FileController::class,'index']);
   Route::get('/file/{id}', [FileController::class,'show']); 
   Route::post('/file/add', [FileController::class,'store']);
   Route::put('/file/{id}', [FileController::class,'update']);
   Route::delete('/file/{id}', [FileController::class,'destroy']);

});







Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
