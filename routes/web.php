<?php

use App\Http\Controllers\GetLocationsController;
use App\Http\Controllers\GetProductsByLocationController;
use App\Http\Controllers\GetProductsByRegionController;
use App\Http\Controllers\GetProductsController;
use App\Http\Controllers\GetRegionsController;
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
Route::get('/products', GetProductsController::class);

//Get all products within a specified state, takes a state code as a parameter
Route::get('/products/state/{state}', GetProductsByLocationController::class);

//Get all products within a specified region, takes in a region code as a parameter
Route::get('/products/region/{regionCode}', GetProductsByRegionController::class);

//Get all locations (states), returns the state id, name and state code
Route::get('/locations', GetLocationsController::class);

//Get all regions, returns the region id, and name
Route::get('/regions', GetRegionsController::class);

