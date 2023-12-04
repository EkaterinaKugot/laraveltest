<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [Controllers\UserController::class, 'index']);
Route::get('/users/{id}', [Controllers\UserController::class, 'show']);
Route::get('/users/{id}/edit', [Controllers\UserController::class, 'edit']);
Route::post('/users/{id}', [Controllers\UserController::class, 'update_user']);

Route::get('/users/{id}/delete', [Controllers\UserController::class, 'delete']);
Route::get('/users_create', [Controllers\UserController::class, 'create']);
Route::post('/users', [Controllers\UserController::class, 'store']);

Route::get('/users/{id}/createpost', [Controllers\PostController::class, 'create']);
Route::get('/users/{id}/posts', [Controllers\PostController::class, 'show']);
Route::post('/users/{id}/posts', [Controllers\PostController::class, 'store']);
Route::get('/posts', [Controllers\PostController::class, 'index']);

Route::get('/users/{id}/posts/{idp}/edit', [Controllers\PostController::class, 'edit']);
Route::post('/users/{id}/posts/{idp}/edit', [Controllers\PostController::class, 'update_post']);
Route::get('/users/{id}/posts/{idp}/delete', [Controllers\PostController::class, 'delete']);

Route::get('/users/{id}/post/{idp}', [Controllers\CommentController::class, 'index']);
Route::get('/users/{id}/post/{idp}/create', [Controllers\CommentController::class, 'create']);
Route::post('/users/{id}/post/{idp}', [Controllers\CommentController::class, 'store']);
Route::get('/users/{id}/post/{idp}/comment/{idc}/delete', [Controllers\CommentController::class, 'delete']);


Route::get('/admin', [Controllers\AdminController::class, 'index']);

Route::get('/comments', [Controllers\CommentController::class, 'moderation']);
Route::get('/comments/moderation/{id}', [Controllers\CommentController::class, 'approve']);
