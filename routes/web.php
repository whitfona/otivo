<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Get all products with productCategoryId 'ACCOMM' or 'ATTRACTION'
Route::get('/products', function () {
    // Get all products from API - https://atlas.atdw-online.com.au/api/atlas/products?key=123456789101112&cats=ACCOMM,ATTRACTION&out=json

    // Send data to frontend

    // Handle errors
});
