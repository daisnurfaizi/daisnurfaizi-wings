<?php

namespace App\Repositories;

use App\Entity\ProductEntity;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    public function getProducts()
    {
        return $this->model->all();
    }

    public function getProduct($id)
    {
        return $this->model->find($id);
    }

    public function deleteProduct($id)
    {
        return $this->model->destroy($id);
    }

    public function createProduct(ProductEntity $product)
    {
        $data = [
            'product_code' => $product->getProduct_code(),
            'product_name' => $product->getProduct_name(),
            'price' => $product->getPrice(),
            'currency' => $product->getCurrency(),
            'discount' => $product->getDiscount(),
            'dimension' => $product->getDimension(),
            'unit' => $product->getUnit(),
            'image' => $product->getImage(),
        ];
        return $this->model->create($data);
    }

    public function updateProduct(ProductEntity $product)
    {
        // use isDirty() to check if the value has been changed

        $product = $this->model->find($product->getProduct_code());
        $product->product_code = $product->getProduct_code();
        $product->product_name = $product->getProduct_name();
        $product->price = $product->getPrice();
        $product->currency = $product->getCurrency();
        $product->discount = $product->getDiscount();
        $product->dimension = $product->getDimension();
        $product->unit = $product->getUnit();
        $product->image = $product->getImage();
        if ($product->isDirty()) {
            return $product->save();
        }
    }

    // generate product code 
    public function generateProductCode()
    {
        $product_code = $this->model->max('product_code');
        $product_code = (int) substr($product_code, 3, 4);
        $product_code++;
        $product_code = "BRG" . sprintf("%04s", $product_code);
        return $product_code;
    }

    public function getAllProducts()
    {
        // paginare model
        return $this->model->paginate(10);
    }

    public function getProductByCode($product_code)
    {
        return $this->model::where('product_code', $product_code)->first();
    }
}
