<?php

namespace App\Http\Controllers;

class GetProductsController extends BaseController
{
    /**
     * @return array all products with productCategoryId 'ACCOMM' or 'ATTRACTION'
     */
    public function __invoke(): array
    {
        return $this->getData('products', '&cats=ACCOMM,ATTRACTION&out=json')->products;
    }
}
