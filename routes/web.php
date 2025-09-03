<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('pages.index');
});

// Route::get('/form', function () {
//     return view('pages.form');
// });

// Route::get('/catalog', function () {
//     return view('pages.catalog');
// });

Route::post('/api/create-order', [OrderController::class, 'createOrder']);
