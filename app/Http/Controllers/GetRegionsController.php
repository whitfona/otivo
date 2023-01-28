<?php

namespace App\Http\Controllers;

class GetRegionsController extends BaseController
{
    //Get all regions, returns the region id, and name
    public function __invoke()
    {
        $regions = $this->getData('regions', '&out=json');

        return collect($regions)->map(function($region) {
            return ['regionID' => $region->RegionId, 'name' => $region->Name];
        })->sortBy('name');
    }
}
