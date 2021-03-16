<?php

use App\Http\Controllers\Auth\ChamberOfCommerceController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Configurator\ConfiguratorController;
use App\Http\Controllers\Configurator\LinkController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\ProductController;
use App\Models\Configuration;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(
    function () {
        Route::get('categories/{id}/products', [CategoryController::class, 'getProductsFromCategory']);
        Route::get('categories/{id}/categories', [CategoryController::class, 'getCategoriesFromParent']);
        Route::get('categories/tree', [CategoryController::class, 'getTree']);
        Route::resource('products', ProductController::class)->only(['index', 'show']);
        Route::resource('categories', CategoryController::class)->only(['index', 'show']);
        Route::resource('links', LinkController::class);
        Route::resource('configurators', ConfiguratorController::class);
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::put('profile', [UserController::class, 'saveProfile'])->name('saveProfile');
        Route::get('products', [ProductController::class, 'index']);

        Route::get('/dashboard', function () {
                $configurators = Configuration::all()->count();
                return view('dashboard', compact('configurators'));
            })->name('home');
        Route::get('/', function () {
                $configurators = Configuration::all()->count();
                return view('dashboard', compact('configurators'));
            });


    }
);

Route::get('/search-for-company/{query}', [ChamberOfCommerceController::class, 'searchCompanies']);


require __DIR__ . '/auth.php';
