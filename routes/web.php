<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\PageController::class, 'index']);
Route::get('/select/{id}', [App\Http\Controllers\PageController::class, 'pageSelect']);

Auth::routes();

Route::get('/painel', [App\Http\Controllers\HomeController::class, 'index'])->name('painel');

//rota para listar, atualizar, criar e deletar os produtos na area administrativa
Route::get('/products_insert', [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth');
Route::post('/products_insert', [App\Http\Controllers\ProductController::class, 'store'])->middleware('auth');
Route::post('/products_update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->middleware('auth');
Route::delete('/products_delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->middleware('auth');

//rotas para trabalhar com as imagens
Route::get('/products_image', [\App\Http\Controllers\ImageController::class, 'index'])->middleware('auth');
Route::post('/products_image', [\App\Http\Controllers\ImageController::class, 'store'])->middleware('auth');

//rotas para trabalhar com as cores
Route::get('/products_color', [\App\Http\Controllers\ColorController::class, 'index'])->middleware('auth');
Route::post('/products_color', [\App\Http\Controllers\ColorController::class, 'store'])->middleware('auth');

//rotas para trabalhar com as cores
Route::get('/products_complements', [\App\Http\Controllers\ComplementController::class, 'index'])->middleware('auth');
Route::post('/products_complements', [\App\Http\Controllers\ComplementController::class, 'store'])->middleware('auth');