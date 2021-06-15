<?php

use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', 'login');

Auth::routes();

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/import', [App\Http\Controllers\HomeController::class, 'index']);
    Route::post('/import', [App\Http\Controllers\ImportDataController::class, 'store'])->name('importCsv');
});

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth');
