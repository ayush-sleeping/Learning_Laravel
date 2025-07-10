<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/backend.php';
require __DIR__ . '/frontend.php';

Route::get('/', function () {
    return view('Layout.layout');
});
