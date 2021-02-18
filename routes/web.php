<?php

use App\Http\Controllers\Auth\ChamberOfCommerceController;
use App\Http\Controllers\Configurator\ConfiguratorController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(
    function () {
        Route::get('categories/{id}/products', [CategoryController::class, 'getProductsFromCategory']);
        Route::get('categories/{id}/categories', [CategoryController::class, 'getCategoriesFromParent']);
        Route::get('categories/tree', [CategoryController::class, 'getTree']);
        Route::resource('products', ProductController::class)->only(['index', 'show']);
        Route::resource('categories', CategoryController::class)->only(['index', 'show']);

        Route::resource('configurator', ConfiguratorController::class);

        Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('home');


    }
);

Route::get('/search-for-company/{query}', [ChamberOfCommerceController::class, 'searchCompanies']);


require __DIR__ . '/auth.php';
