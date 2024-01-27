<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\productsController;
use App\Models\Product;

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

Route::get('/', [PagesController::class, 'index'])->name('indexPage');

// products related routes 
Route::get('/products', [PagesController::class, 'products']);
Route::get('/product/{slug}' , [PagesController::class, 'showProduct']);



// admine related routes
Route::group(['middleware' => 'admin'], function () {
    // Admin-only routes go here
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // manage Products Routes 
    Route::get('/admin/dashboard/manage-products' , [AdminController::class, 'manageProducts'])->name('admin.manageProduct');
    Route::post('/admin/dashboard/add-product', [productsController::class, 'addProduct'])->name('addProduct');
    // update Product
    Route::get('/product/edit/{id}', [PagesController::class, 'updateProduct']);
    Route::put('/editProduct/{id}', [productsController::class, 'updateProduct'])->name('updateProduct');
    // Delete Product
    Route::delete('/product/delete/{id}', [productsController::class, 'destroyProduct'])->name('destroyProduct');
    // manage Categories Routes
    Route::get('/admin/dashboard/manage-Categories' , [AdminController::class, 'manageCategory'])->name('admin.manageCategory');
    Route::post('/admin/dashboard/add-category', [productsController::class, 'addCategory'])->name('addCategory');

    Route::get('/category/edit/{id}', [PagesController::class, 'updateCategoryView']);
    Route::put('/category-edit/{id}', [productsController::class, 'updateCategory'])->name('updateCategory');
    Route::delete('/category/delete/{id}', [productsController::class, 'destroyCategory'])->name('destroyCategory');
    



});

//testing routes
Route::get('/test',[PagesController::class , 'test'] );

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();