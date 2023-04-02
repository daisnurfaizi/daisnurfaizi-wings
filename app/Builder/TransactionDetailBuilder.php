<?php

namespace App\Builder;

use App\Entity\TransactionDetailEntity;

class TransactionDetailBuilder
{
    private $document_code;
    private $product_code;
    private $price;
    private $discount;
    private $total_amount;
    private $quantity;

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
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function build(): TransactionDetailEntity
    {
        return new TransactionDetailEntity($this->document_code, $this->product_code, $this->price, $this->discount, $this->total_amount, $this->quantity);
    }
}
