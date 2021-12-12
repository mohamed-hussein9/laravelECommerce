<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeSlide;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders            = HomeSlide::where('status', 1)->get();
        $latest_products    = Product::orderby('created_at', 'DESC')->get()->take(8);
        $home_categories    = Category::whereNotIn('nom_of_homeproducts', [0])->get();
        $sale_products      = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(8);
        $sale               = Sale::find(1);

        return view('livewire.home-component', [
            'sliders' => $sliders,
            'latest_products'   => $latest_products,
            'home_categories'   => $home_categories,
            'sale_products'     => $sale_products,
            'sale'              => $sale,
        ])->layout('layouts.base');
    }
}
