<?php

namespace App\Entity;

class TransactionDetailEntity
{
    private $document_code;
    private $product_code;
    private $price;
    private $discount;
    private $total_amount;
    private $quantity;

    public function __construct($document_code, $product_code, $price, $discount, $total_amount, $quantity,)
    {
        $this->document_code = $document_code;
        $this->product_code = $product_code;
        $this->price = $price;
        $this->discount = $discount;
        $this->total_amount = $total_amount;
        $this->quantity = $quantity;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of total_amount
     */
    public function getTotal_amount()
    {
        return $this->total_amount;
    }

    /**
     * Set the value of total_amount
     *
     * @return  self
     */
    public function setTotal_amount($total_amount)
    {
        $this->total_amount = $total_amount;

        return $this;
    }

    /**
     * Get the value of discount
     */
    public function getDiscount()
    {
        return $this->discount;
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
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
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
     * Get the value of product_code
     */
    public function getProduct_code()
    {
        return $this->product_code;
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

    /**
     * Get the value of document_code
     */
    public function getDocument_code()
    {
        return $this->document_code;
    }

    /**
     * Set the value of document_code
     *
     * @return  self
     */
    public function setDocument_code($document_code)
    {
        $this->document_code = $document_code;

        return $this;
    }
}
