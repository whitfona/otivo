<?php

namespace App\Http\Controllers;

class GetProductsByLocationController extends BaseController
{
    /**
     * @param $state string state code
     * @return array all products within a specified state
     */
    public function __invoke(string $state): array
    {

        return $this->getData('products', '&st=' . $state . '&out=json')->products;
    }
}
