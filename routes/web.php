<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/* Rotas da tela de login */
Route::get('/', function () {
    return view('home');
});

Route::post('/register', [UserController::class,'register']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);

/* Rotas da criação de categorias */
Route::resource('categories', CategoryController::class);