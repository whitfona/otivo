<?php

use App\Http\Controllers\GetProductsByLocation;
use App\Http\Controllers\GetProductsController;
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
Route::get('/products/state/{state}', GetProductsByLocation::class);

//Get all products within a specified region, takes in a region code as a parameter
Route::get('/products/region/{regionCode}', function($regionCode) {
    // Takes in a region code
    $API_KEY = env('ATDW_API_KEY');

    $client = new GuzzleHttp\Client();

    $response = $client->request(
        'GET',
        'https://atlas.atdw-online.com.au/api/atlas/products?key=' . $API_KEY . '&servicerg=' . $regionCode . '&out=json'
    );

    if (!$response->getBody()) {
        return response('Error getting products', 500);
    }

    $content = $response->getBody()->getContents();
    $data = json_decode(
        mb_convert_encoding($content, 'UTF-8', 'UTF-16LE')
    );

    return $data->products;
});

//Get all locations (states), returns the state id, name and state code
Route::get('/locations', function() {
    $API_KEY = env('ATDW_API_KEY');

    $client = new GuzzleHttp\Client();

    $response = $client->request(
        'GET',
        'https://atlas.atdw-online.com.au/api/atlas/states?key=' . $API_KEY . '&out=json'
    );

    if (!$response->getBody()) {
        return response('Error getting products', 500);
    }

    $content = $response->getBody()->getContents();
    $data = json_decode(
        mb_convert_encoding($content, 'UTF-8', 'UTF-16LE')
    );

    return collect($data)->sortBy('Name');
});

//Get all regions, returns the region id, and name
Route::get('/regions', function() {
    $API_KEY = env('ATDW_API_KEY');

    $client = new GuzzleHttp\Client();

    $response = $client->request(
        'GET',
        'https://atlas.atdw-online.com.au/api/atlas/regions?key=' . $API_KEY . '&out=json'
    );

    if (!$response->getBody()) {
        return response('Error getting products', 500);
    }

    $content = $response->getBody()->getContents();
    $data = json_decode(
        mb_convert_encoding($content, 'UTF-8', 'UTF-16LE')
    );

    return collect($data)->map(function($region) {
        return ['regionID' => $region->RegionId, 'name' => $region->Name];
    })->sortBy('name');
});
