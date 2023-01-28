<?php

namespace App\Http\Controllers;

class GetProductsByLocationController extends BaseController
{
    //Get all products within a specified state, takes a state code as a parameter
    public function __invoke($state)
    {

        return $this->getData('products', '&st=' . $state . '&out=json')->products;
    }
}
