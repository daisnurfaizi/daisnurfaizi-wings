<?php

namespace App\Services;

use App\Builder\ProductBuilder;
use App\Http\Helper\UploadImage;
use Illuminate\Support\Facades\DB;

class createProductService
{
    protected $repository;
    public function __construct($Repository)
    {
        $this->repository = $Repository;
    }

    public function craeteProduct($request)
    {
        try {
            $product_code = $this->repository->generateProductCode();
            $product = (new ProductBuilder)
                ->setProduct_code($product_code)
                ->setProduct_name($request->product_name)
                ->setPrice($request->price)
                ->setCurrency($request->currency)
                ->setDiscount($request->discount)
                ->setDimension($request->dimension)
                ->setUnit($request->unit)
                ->setImage(!empty($request->image) ? UploadImage::uploadImage($request->image, 'images/product') : null)
                ->build();
            return DB::transaction(function () use ($product) {
                $product = $this->repository->createProduct($product);
                return $product;
            });
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function updateProduct($request)
    {
        try {
            $product = (new ProductBuilder)
                ->setProduct_code($request->product_code)
                ->setProduct_name($request->product_name)
                ->setPrice($request->price)
                ->setCurrency($request->currency)
                ->setDiscount($request->discount)
                ->setDimension($request->dimension)
                ->setUnit($request->unit)
                ->setImage(!empty($request->image) ? UploadImage::uploadImage($request->image, 'images/product') : null)
                ->build();
            return DB::transaction(function () use ($product) {
                $product = $this->repository->updateProduct($product);
                return $product;
            });
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
