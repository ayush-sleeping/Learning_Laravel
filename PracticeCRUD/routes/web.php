<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

require __DIR__ . '/backend.php';
require __DIR__ . '/frontend.php';

Route::get('/', function () {
    return view('Layout.layout');
});



// For Basic CRUD operations ::
Route::resource('admin/tags', TagController::class);
Route::get('admin/tags/{tag}/delete', [TagController::class, 'delete'])->name('tags.delete');
