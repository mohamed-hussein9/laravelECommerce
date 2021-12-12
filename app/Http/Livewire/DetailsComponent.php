<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');

        session()->flash('success_message', 'Product added to Cart');
        return redirect()->route('products.cart');
    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->get()->first();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();
        $pupular_products = Product::inRandomOrder()->limit(4)->get();
        return view('livewire.details-component', [
            'product' => $product,
            'related_products' => $related_products,
            'pupular_products' => $pupular_products
        ])
            ->layout('layouts.base');
    }
}
