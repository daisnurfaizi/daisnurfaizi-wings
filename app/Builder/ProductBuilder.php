<?php

namespace App\Builder;

use App\Entity\ProductEntity;

class ProductBuilder
{
    private $product_code;
    private $product_name;
    private $price;
    private $currency;
    private $discount;
    private $dimension;
    private $unit;
    private $image;

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Set the value of unit
     *
     * @return  self
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Set the value of dimension
     *
     * @return  self
     */
    public function setDimension($dimension)
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * Set the value of discount
     *
     * @return  self
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Set the value of currency
     *
     * @return  self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set the value of product_name
     *
     * @return  self
     */
    public function setProduct_name($product_name)
    {
        $this->product_name = $product_name;

        return $this;
    }

    /**
     * Set the value of product_code
     *
     * @return  self
     */
    public function setProduct_code($product_code)
    {
        $this->product_code = $product_code;

        return $this;
    }

    public function build(): ProductEntity
    {
        return new ProductEntity($this->product_code, $this->product_name, $this->price, $this->currency, $this->discount, $this->dimension, $this->unit, $this->image);
    }
}
