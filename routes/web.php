<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix'=>'categorias'], function(){
    Route::get('', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('create',[CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('store', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('show/{categoria}', [CategoriaController::class, 'show'])->name('categoria.show');
    Route::get('edit/{categoria}', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::put('update/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::delete('delete/{categoria}', [CategoriaController::class, 'delete'])->name('categoria.delete');
});

Route::group(['prefix'=>'posts'], function(){
   Route::resource('posts', PostController::class);
});
