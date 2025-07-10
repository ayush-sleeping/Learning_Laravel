<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;

// Route::get('/backend/products', function () { return view('Backend.Products.index'); });

Route::prefix('backend')->name('backend.')->group(function () {

    //Category ::
    Route::resource('categories', CategoryController::class);
    Route::get('categories/{category}/delete', [CategoryController::class, 'delete'])->name('categories.delete');

    // Products ::
    Route::resource('products', ProductController::class);
    Route::get('products/{product}/delete', [ProductController::class, 'delete'])->name('products.delete');
});
