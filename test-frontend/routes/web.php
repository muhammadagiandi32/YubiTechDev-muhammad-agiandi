<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('auth/login');
})->name('/');

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::post('/postLogin', [AuthController::class, 'login'])->name('post-login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/postRegis', [AuthController::class, 'store'])->name('post-regis');
});
Route::prefix('user')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('user-index')->middleware('verify-jwt');
});
