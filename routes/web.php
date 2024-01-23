<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;

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

Route::get('/products', [PagesController::class, 'products']);
Route::get('/', [PagesController::class, 'index'])->name('indexPage');

Route::group(['middleware' => 'admin'], function () {
    // Admin-only routes go here
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/add-product' , [AdminController::class, 'addProduct'])->name('admin.addProduct');
});

//testing routes
Route::get('/test',[PagesController::class , 'test'] );

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();