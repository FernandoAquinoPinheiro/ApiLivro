<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblivrosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/livros',[TblivrosController::class,'index']);
Route::get('/Livros/{id}',[TblivrosController::class,'show']);
Route::post('/livros',[TblivrosController::class,'store']);
Route::put('/livros/{id}',[TblivrosController::class,'update']);
Route::delete('/livros/{id}',[TblivrosController::class,'destroy']);