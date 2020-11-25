<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
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
Route::get('login',[AuthController::class,'showFormLogin']);
Route::post('login',[AuthController::class,'login'])->name('login');

Route::middleware('auth')->prefix('admin')->group(function (){
    Route::get('/', [DashBoardController::class,'showDashBoard'])->name('admin.showDashBoard');

    Route::prefix('users')->group(function (){
        Route::get('/', [UserController::class,'index'])->name('users.index');
        Route::get('/create', [UserController::class,'create'])->name('users.create');
        Route::post('/create', [UserController::class,'store'])->name('users.store');
        Route::get('/{id}/delete', [UserController::class,'delete'])->name('users.delete');
    });

    Route::get('logout', [AuthController::class,'logout'])->name('logout');
});
