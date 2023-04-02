<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCart extends Controller
{
    public function index()
    {
        return view('Shopping.Cart');
    }
}
