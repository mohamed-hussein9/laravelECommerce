<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\HomeSlide;
use Carbon\Carbon;
use Livewire\Component;
use livewire\WithFileUploads;

class AddSlideComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $sub_title;
    public $link;
    public $price;
    public $status;
    public $image;
    public $slider_type;
    public function mount()
    {
        $this->status = 1;
        $this->slider_type = 'center';
    }
    public function addslider()
    {
        $product = new HomeSlide();
        $product->title = $this->title;
        $product->subtitle = $this->sub_title;
        $product->link = $this->link;
        $product->price = $this->price;
        $product->status = $this->status;
        $image_name = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAS('sliders', $image_name);
        $product->image = $image_name;
        $product->slide_type = $this->slider_type;
        $product->save();
        session()->flash('message', 'slider has been added successfuly');
    }

    public function render()
    {
        return view('livewire.admin.home.add-slide-component')->layout('layouts.base');
    }
}
