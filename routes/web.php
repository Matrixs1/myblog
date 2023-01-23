<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', [App\Http\Controllers\HomeController::class,'index']);
Auth::routes();


Route::get('/add_post', [App\Http\Controllers\PostController::class, 'add_post']);
Route::post('set_post', [App\Http\Controllers\PostController::class, 'set_post']);
Route::get('/single_post/{id}', [App\Http\Controllers\PostController::class, 'single_post']);
Route::get('delete_post/{id}', [App\Http\Controllers\PostController::class, 'delete_post']);
Route::post('create_comment/{id}', [App\Http\Controllers\PostController::class, 'create_comment']);
Route::get('update_post/{id}', [App\Http\Controllers\PostController::class, 'update_post']);
Route::post('edit_post/{id}', [App\Http\Controllers\PostController::class, 'edit_post']);
