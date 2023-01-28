<?php

namespace App\Http\Controllers;

class GetProductsByLocation extends BaseController
{
    //Get all products within a specified state, takes a state code as a parameter
    public function __invoke($state)
    {

        return $this->getData('&st=' . $state . '&out=json');
    }
}
