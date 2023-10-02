<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\UserController;

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
    return view('user.welcome');
});
Route::get('/loker', [LokerController::class, 'index']);
Route::get('/User', [UserController::class, 'index']);
Route::get('/User/create', [UserController::class, 'create']);