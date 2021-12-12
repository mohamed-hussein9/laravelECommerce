<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class addtocart extends Controller
{
    public function index()
    {
        Cart::add(1, 'product1', 1, 222);

        return  redirect()->route('test');
    }
}
