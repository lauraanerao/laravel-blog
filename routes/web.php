<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPostController;
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


Route::group(['prefix'=>'admin'], function(){
   Route::resource('categorias', CategoriaController::class);
   Route::resource('posts', AdminPostController::class)->except('show');
   Route::patch('posts/deletar-imagem/{post}', [AdminPostController::class, 'removerImagemPost'])->name("admin.removerImagemPost");
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
