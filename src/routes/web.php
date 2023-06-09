<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilitiesController;

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

Route::group(['prefix' => '/'], function () {

});
Route::group(['prefix' => '/admin'], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/home', [AdminManagementController::class, 'index'])->name('home');

        Route::group(['prefix' => '/facility'], function () {
            Route::get('/top', [FacilitiesController::class, 'getRecords'])->name('facility.top');
            Route::get('/delete/{id}', [FacilitiesController::class, 'deleteRecord'])->name('facility.delete');
        });
    });
});
Route::get('/', [UsersController::class, 'getName']);

// 公開側
Route::get('/search', [\App\Http\Controllers\FacilitySearchController::class, 'getSearch']);
