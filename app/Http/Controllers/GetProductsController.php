<?php

namespace App\Http\Controllers;

class GetProductsController extends BaseController
{
    // Get all products with productCategoryId 'ACCOMM' or 'ATTRACTION'
    public function __invoke()
    {
        return $this->getData('products', '&cats=ACCOMM,ATTRACTION&out=json')->products;
    }
}
