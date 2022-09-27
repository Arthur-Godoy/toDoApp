<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, 'index'])->name('home');
Route::post('/create', [TaskController::class, 'store'])->name('create')->middleware('auth');
Route::delete('/delete/{id}', [TaskController::class, 'destroy'])->name('delete')->middleware('auth');
Route::delete('/deleteAll', [TaskController::class, 'destroyAll'])->name('deleteAll')->middleware('auth');
Route::put('/mark/{id}', [TaskController::class, 'update'])->name('update')->middleware('auth');
Route::get('/dashboard', [TaskController::class, 'dashboard']);
