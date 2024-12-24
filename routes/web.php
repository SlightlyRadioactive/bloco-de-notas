<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Services\DataMergerService;
use Illuminate\Support\Facades\Route;

/* Rotas da tela de login */
Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

/* Rotas das categorias */
Route::resource('categories', CategoryController::class);

/* Rotas das notas */
Route::resource('notes', NoteController::class);