<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

class GetLocationsController extends BaseController
{
    /**
     * @return Collection all locations (states)
     */
    public function __invoke(): Collection
    {

        $locations = $this->getData('states', '&out=json');

        return collect($locations)->sortBy('Name');
    }
}
