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

Route::get('/products', GetProductsController::class);
Route::get('/products/state/{state}', GetProductsByLocationController::class);
Route::get('/products/region/{regionCode}', GetProductsByRegionController::class);
Route::get('/locations', GetLocationsController::class);
Route::get('/regions', GetRegionsController::class);

