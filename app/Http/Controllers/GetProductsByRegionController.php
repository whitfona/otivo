<?php

namespace App\Http\Controllers;

class GetProductsByRegionController extends BaseController
{
    /**
     * @param $regionCode int region code
     * @return array all products within the specified region
     */
    public function __invoke(int $regionCode): array
    {

        return $this->getData('products', '&servicerg=' . $regionCode . '&out=json')->products;
    }
}
