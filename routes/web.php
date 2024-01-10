<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\Post;
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
Route::get('/',function(){
    return view('inicio');
 })->name('inicio');

 Route::get('relacionPrueba', function() {
    $user = User::findOrFail(1);
    $post = new Post();
    $post->titulo = "Nuevo post aqui";
    $post->contenido = "elquetenga";
    $post->user()->associate($user);
    $post->save();
    return redirect()->route('posts.index');
    });

Route::get('posts.nuevoPrueba', [PostController::class, 'nuevoPrueba'])->name('nuevoPrueba');
Route::get('posts.editarPrueba/{id}', [PostController::class, 'editarPrueba'])->name('editarPrueba');

Route::resource('posts', PostController::class);

