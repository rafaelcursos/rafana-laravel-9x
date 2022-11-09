<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\PageController::class, 'index']);
Route::get('/select/{id}', [App\Http\Controllers\PageController::class, 'pagebases']);
Route::get('/page_tampos/{id}', [App\Http\Controllers\PageController::class, 'pagetampos']);
Route::get('/page_cadeiras', [App\Http\Controllers\PageController::class, 'pagecadeiras']);

Auth::routes();

Route::get('/painel', [App\Http\Controllers\HomeController::class, 'index'])->name('painel');

//rota para trabalhar com os produtos showcase
Route::get('/showcase_insert', [App\Http\Controllers\ShowcaseController::class, 'index'])->middleware('auth');
Route::post('/showcase_insert', [App\Http\Controllers\ShowcaseController::class, 'store'])->middleware('auth');
Route::get('/showcase_join/{id}', [App\Http\Controllers\ShowcaseController::class, 'join'])->middleware('auth');
Route::post('/showcase_join', [App\Http\Controllers\ShowcaseController::class, 'joinStore'])->middleware('auth');
Route::get('/showcase_update/{id}', [App\Http\Controllers\ShowcaseController::class, 'update'])->middleware('auth');
Route::put('/showcase_update/{id}', [App\Http\Controllers\ShowcaseController::class, 'updateAction'])->middleware('auth');
Route::delete('/showcase_delete/{id}', [App\Http\Controllers\ShowcaseController::class, 'destroy'])->middleware('auth');

//rota para listar, atualizar, criar e deletar os produtos na area administrativa
Route::get('/products_insert', [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth');
Route::post('/products_insert', [App\Http\Controllers\ProductController::class, 'store'])->middleware('auth');
Route::get('/products_all', [App\Http\Controllers\ProductController::class, 'all'])->middleware('auth');
Route::get('/products_update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->middleware('auth');
Route::put('/products_update/{id}', [App\Http\Controllers\ProductController::class, 'updateAction'])->middleware('auth');
Route::delete('/products_delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->middleware('auth');

//rotas para trabalhar com as imagens
Route::get('/products_image/{id}', [\App\Http\Controllers\ImageController::class, 'index'])->middleware('auth');
Route::post('/products_image/{id}', [\App\Http\Controllers\ImageController::class, 'store'])->middleware('auth');

//rotas para trabalhar com as cores
Route::get('/products_color', [\App\Http\Controllers\ColorController::class, 'index'])->middleware('auth');
Route::post('/products_color', [\App\Http\Controllers\ColorController::class, 'store'])->middleware('auth');

//rotas para trabalhar com os types
Route::get('/products_type', [\App\Http\Controllers\TypeController::class, 'index'])->middleware('auth');
Route::post('/products_type', [\App\Http\Controllers\TypeController::class, 'store'])->middleware('auth');

//rotas para trabalhar com os complementos
Route::get('/products_complements', [\App\Http\Controllers\ComplementController::class, 'index'])->middleware('auth');
Route::post('/products_complements', [\App\Http\Controllers\ComplementController::class, 'store'])->middleware('auth');