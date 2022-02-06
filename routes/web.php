<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['prefix' => "users"], function() {
        Route::get('/', [UserController::class, 'index'])
            ->name('users.index')
            ->can('view users');
        Route::post('/store', [UserController::class, 'store'])
            ->name('users.store')
            ->can('create users');
        Route::get('/{user}', [UserController::class, 'show'])
            ->name('users.show')
            ->can('view users');
        Route::put('/{user}', [UserController::class, 'update'])
            ->name('users.update')
            ->can('edit users');
        Route::delete('/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy')
            ->can('delete users');
    });
});
