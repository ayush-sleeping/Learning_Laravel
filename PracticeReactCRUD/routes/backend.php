<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController;

// Route::get('/backend/products', function () { return view('Backend.Products.index'); });

Route::prefix('backend')->name('backend.')->group(function () {

    // Products ::
    Route::resource('products', ProductController::class);
    Route::get('products/{product}/delete', [ProductController::class, 'delete'])->name('products.delete');
});
