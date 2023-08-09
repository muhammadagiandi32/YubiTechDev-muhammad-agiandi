<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\KontakController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'refresh']);
});

Route::prefix('contact')->group(function () {

    Route::get('/index', [KontakController::class, 'index'])->name('user-index')->middleware('verify-jwt');
    Route::get('/get-data', [KontakController::class, 'create'])->name('get-data')->middleware('verify-jwt');
    Route::delete('/delete-data/{id}', [KontakController::class, 'destroy'])->name('delete-data')->middleware('verify-jwt');
    Route::get('/get-show/{id}/edit', [KontakController::class, 'show'])->name('get-show')->middleware('verify-jwt');

    Route::post('/contact-store', [KontakController::class, 'store'])->name('contact-store')->middleware('verify-jwt');
    Route::put('/contact-update/{id}', [KontakController::class, 'update'])->name('contact-update')->middleware('verify-jwt');
});
