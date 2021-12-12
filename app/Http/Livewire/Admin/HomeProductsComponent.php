<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class HomeProductsComponent extends Component
{
    public $cat_showen = [];
    public $nom_of_products;
    public function save()
    {
        $all_category = Category::all();
        foreach ($all_category as $category) {
            if (in_array($category->id, $this->cat_showen)) {
                $category->nom_of_homeproducts = $this->nom_of_products;
                $category->save();
            } else {
                $category->nom_of_homeproducts = 0;
                $category->save();
            }
        }
        session()->flash('success', 'Home Categories Saved Successfuly');
    }
    public function mount()
    {
        $cat_arr = [];
        $cat_checked = Category::whereNotIn('nom_of_homeproducts', [0])->get();
        foreach ($cat_checked as $c) {
            array_push($cat_arr, "$c->id");
        }
        $this->cat_showen = $cat_arr;
        $nom_of_products = $cat_checked->first()->nom_of_homeproducts;
        $this->nom_of_products = $nom_of_products;
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.home-products-component', ['categories' => $categories])->layout('layouts.base');
    }
}
