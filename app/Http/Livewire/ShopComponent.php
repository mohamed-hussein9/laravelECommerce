<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

use Cart;


class ShopComponent extends Component
{
    public $pages;
    public $sorting;
    public $category;
    public $category_name;
    public $active;
    public $min_price;
    public $max_price;
    public function mount()
    {
        $this->sorting = 'default';
        $this->pages = '12';
        $this->category = 'all';
        $this->category_name = 'All categories';
        $this->active = 'style="color:red;"';
        $this->min_price = 0;
        $this->max_price = 1000;
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

                $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'DESC')->Paginate($this->pages);
            } elseif ($this->sorting === 'price') {
                $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->Paginate($this->pages);
            } elseif ($this->sorting === 'price-desc') {
                $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->Paginate($this->pages);
            } else {
                $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->Paginate($this->pages);
            }
        } else {
            if ($this->sorting === 'date') {

                $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('category_id', $this->category)->orderBy('created_at', 'DESC')->Paginate($this->pages);
            } elseif ($this->sorting === 'price') {
                $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('category_id', $this->category)->orderBy('regular_price', 'ASC')->Paginate($this->pages);
            } elseif ($this->sorting === 'price-desc') {
                $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('category_id', $this->category)->orderBy('regular_price', 'DESC')->Paginate($this->pages);
            } else {
                $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->where('category_id', $this->category)->Paginate($this->pages);
            }
            $this->category_name  = Category::where('id', $this->category)->first()->name;
        }
        $categories = Category::all();


        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories, 'category_name' => $this->category_name])->layout('layouts.base');
    }
}
