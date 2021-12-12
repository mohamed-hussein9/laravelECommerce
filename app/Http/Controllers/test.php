<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class test extends Controller
{
    public function index()

    {
        Cart::destroy();
        dd(Cart::content());
    }
}
