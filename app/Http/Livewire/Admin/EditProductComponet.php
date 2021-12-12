<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditProductComponet extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $errors;
    public $product_id;
    public function mount($slug)
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
        $product = Product::where('slug', $slug)->first();
        $this->product_id = $product->id;

        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->sku = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->category_id = $product->category_id;
    }
    public function generateslug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    public function updateproduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'sku' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'image' => 'required'
        ]);

        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->sku = $this->sku;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $product->category_id = $this->category_id;
        if ($this->category_id == 0) {

            session()->flash('category_error', 'you cant leave category empty');
            return redirect()->route('admin.addproduct');
        }
        if ($this->image) {
            $image_name = Carbon::now()->timestamp . '.' . $this->image->extension();

            $this->image->storeAs('products', $image_name);
            $product->image = $image_name;
        }


        $product->save();
        session()->flash('success', 'product has been updated');
    }




    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.edit-product-componet', ['categories' => $categories])->layout('layouts.base');
    }
}
