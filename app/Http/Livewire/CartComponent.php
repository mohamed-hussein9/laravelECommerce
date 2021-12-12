<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function clearcart()
    {
        Cart::destroy();
        return redirect()->route('products.cart');
    }
    public function increaseQuantity($rowId)
    {
        $item = Cart::get($rowId);
        $qty = $item->qty + 1;

        Cart::update($rowId, $qty);
    }
    public function decreaseQuantity($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty - 1);
    }
    public function delete($rowId)
    {
        Cart::remove($rowId);
    }
    public function render()
    {

        return view('livewire.cart-component')->layout('layouts.base');
    }
}
