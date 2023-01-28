<?php

namespace App\Http\Controllers;

class GetLocationsController extends BaseController
{
    //Get all locations (states), returns the state id, name and state code
    public function __invoke()
    {

        $locations = $this->getData('states', '&out=json');

        return collect($locations)->sortBy('Name');
    }
}
