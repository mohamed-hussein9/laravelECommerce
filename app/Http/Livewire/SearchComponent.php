<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

use Cart;


class SearchComponent extends Component
{
    public $pages;
    public $sorting;
    public $category;
    public $category_name;

    public $search;
    public $product_cat;
    public $product_cat_id;
    public function mount()
    {
        $this->sorting = 'default';
        $this->pages = '12';
        $this->category = 'all';
        $this->category_name = 'All categories';
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }
    public function category($cat_id)
    {
        $this->category = $cat_id;
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Product added to Cart');
        return redirect()->route('products.cart');
    }
    use WithPagination;
    public function render()

    {
        if ($this->category === 'all') {
            if ($this->sorting === 'date') {

                $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('created_at', 'DESC')->Paginate($this->pages);
            } elseif ($this->sorting === 'price') {
                $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('regular_price', 'ASC')->Paginate($this->pages);
            } elseif ($this->sorting === 'price-desc') {
                $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->orderBy('regular_price', 'DESC')->Paginate($this->pages);
            } else {
                $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->Paginate($this->pages);
            }
        } else {
            if ($this->sorting === 'date') {

                $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('category_id', $this->category)->orderBy('created_at', 'DESC')->Paginate($this->pages);
            } elseif ($this->sorting === 'price') {
                $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('category_id', $this->category)->orderBy('regular_price', 'ASC')->Paginate($this->pages);
            } elseif ($this->sorting === 'price-desc') {
                $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('category_id', $this->category)->orderBy('regular_price', 'DESC')->Paginate($this->pages);
            } else {
                $products = Product::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('category_id', $this->category)->Paginate($this->pages);
            }
            $this->category_name  = Category::where('id', $this->category)->first()->name;
        }
        $categories = Category::all();


        return view('livewire.search-component', ['products' => $products, 'categories' => $categories, 'category_name' => $this->category_name])->layout('layouts.base');
    }
}
