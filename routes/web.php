<?php

use App\Models\Company;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\CompaniesController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\SuppliersController;
use App\Http\Controllers\Admin\CategoriesController;

Route::get('/' , [AuthController::class , 'login'])->name('login');
Route::post('/admin/auth' , [AuthController::class , 'auth'])->name('auth');
Route::get('/admin/logout' , [AuthController::class , 'logout'])->name('logout');




Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    
    Route::get('/', [AuthController::class , 'index'])->name('dashboard');
    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('companies', CompaniesController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('suppliers', SuppliersController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('sales', SaleController::class);
    


   
    
    


    


});








