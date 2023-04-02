<?php

namespace App\Http\Helper;

use App\Models\Product;

class Cart
{
    public $cartTotal;
    public function __construct()
    {
        if ($this->get() === null) {
            $this->set($this->empty());
        }
    }

    public  function get()
    {
        return session()->get('cart');
    }

    public function set($cart)
    {
        session()->put('cart', $cart);
    }

    public function empty()
    {
        return [
            'products' => [],
        ];
    }

    public function add(Product $product)
    {
        // dd($product);
        $cart = $this->get();
        // check if product already exists in cart
        $productExists = false;
        foreach ($cart['products'] as $key => $cartProduct) {
            if ($cartProduct['product_code'] === $product->product_code) {
                $productExists = true;
                // call livewire method to update qty

                return 'product exists';
                break;
            }
        }
        if (!$productExists) {
            $product['qty'] = 1;
            $product['total'] = $product['qty'] * $product['price'];
            array_push($cart['products'], $product);
            $this->set($cart);
        }
    }
}
