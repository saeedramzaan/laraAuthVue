<?php

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
use App\Http\Controllers\PostController;

Auth::routes();
 
Route::get('post', [PostController::class, 'index'])->name('post');
Route::post('post', [PostController::class, 'createPost']);

Route::get('edit/{id}', [PostController::class, 'editView']);

Route::put('update/{id}', [PostController::class, 'update']);
// if put is not working, you can even use post to update dada
// patch is used to modify single field 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/all', [PostController::class, 'showall']);
Route::get('list', [PostController::class, 'list']);

Route::get('editInfo/{id}', [PostController::class, 'editInfo']);

Route::delete('delete/{id}',[PostController::class, 'destroy']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

