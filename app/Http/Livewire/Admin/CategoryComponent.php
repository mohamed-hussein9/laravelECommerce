<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;




class CategoryComponent extends Component
{
    public function delete($category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
        session()->flash('success', 'Category Deleted');
    }

    use WithPagination;
    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.category-component', ['categories' => $categories])->layout('layouts.base');
    }
}
