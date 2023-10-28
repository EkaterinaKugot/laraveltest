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
Route::get('/users/{name}', [Controllers\UserController::class, 'show']);

Route::get('/form', [Controllers\FormController::class, 'index']);


Route::post('/form', [Controllers\FormController::class, 'store']);

Route::get('/admin', [Controllers\AdminController::class, 'index']);

