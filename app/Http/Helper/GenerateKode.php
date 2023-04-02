<?php

namespace App\Http\Helper;

use App\Models\Product;
use App\Repositories\ProductRepository;

class GenerateKode
{

    public static function Product()
    {
        $productrepository = new ProductRepository(new Product());
        return $productrepository->generateProductCode();
    }
}
