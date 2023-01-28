<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

class GetRegionsController extends BaseController
{
    /**
     * @return Collection all regions
     */
    public function __invoke(): Collection
    {
        $regions = $this->getData('regions', '&out=json');

        return collect($regions)->map(function($region) {
            return ['regionID' => $region->RegionId, 'name' => $region->Name];
        })->sortBy('name');
    }
}
