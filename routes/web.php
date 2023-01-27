<?php

use Illuminate\Support\Facades\Http;
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
    $API_KEY = env('ATDW_API_KEY');

    $client = new GuzzleHttp\Client();

    $response = $client->request(
        'GET',
        'https://atlas.atdw-online.com.au/api/atlas/products?key=' . $API_KEY . '&cats=ACCOMM,ATTRACTION&out=json'
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
