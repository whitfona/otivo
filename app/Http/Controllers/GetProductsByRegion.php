<?php

namespace App\Http\Controllers;

class GetProductsByRegion extends BaseController
{
    //Get all products within a specified region, takes in a region code as a parameter
    public function __invoke($regionCode)
    {

        return $this->getData('&servicerg=' . $regionCode . '&out=json')->products;
    }
}
