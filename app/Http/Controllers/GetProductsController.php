<?php

namespace App\Http\Controllers;

class GetProductsController extends BaseController
{
    /**
     * @return array all products
     */
    public function __invoke(): array
    {
        return $this->getData('products', '&out=json')->products;
    }
}
