<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class BaseController extends Controller
{
    public function getData($type, $urlOptions)
    {
        $client = new Client();
        $API_KEY = env('ATDW_API_KEY');

        $response = $client->request(
            'GET',
            'https://atlas.atdw-online.com.au/api/atlas/' . $type . '?key=' . $API_KEY . $urlOptions
        );

        if (!$response->getBody()) {
            return response('Error getting products', 500);
        }

        $content = $response->getBody()->getContents();
        return json_decode(
            mb_convert_encoding($content, 'UTF-8', 'UTF-16LE')
        );
    }
}
