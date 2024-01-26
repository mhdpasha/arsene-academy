<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(RegisterController::class)->group(function() {
    Route::get('/register', 'index')->name('register.index');
    Route::post('register', 'register')->name('register');
});

Route::controller(AuthController::class)->group(function() {
    Route::post('/logout', 'logout')->name('auth.logout');
});

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function() {
        Route::get('/', 'index');
        Route::get('/login', 'index')->name('login');

        Route::post('/auth', 'auth')->name('auth.login');
    });

});

Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
});

