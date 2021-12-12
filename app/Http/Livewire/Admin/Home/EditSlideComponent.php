<?php

namespace App\Http\Livewire\Admin\Home;

use Livewire\Component;
use App\Models\HomeSlide;
use Carbon\Carbon;
use livewire\WithFileUploads;

class EditSlideComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $sub_title;
    public $link;
    public $price;
    public $status;
    public $old_image;
    public $image;
    public $slider_type;
    public $slide_id;
    public function mount($id)
    {
        $this->slide_id = $id;
        $slide = HomeSlide::find($id);
        $this->title = $slide->title;
        $this->sub_title = $slide->subtitle;
        $this->link = $slide->link;
        $this->price = $slide->price;
        $this->old_image = $slide->image;
        $this->status = $slide->status;
        $this->slider_type = $slide->slide_type;
    }
    public function updateslider()
    {
        $product = HomeSlide::find($this->slide_id);
        $product->title = $this->title;
        $product->subtitle = $this->sub_title;
        $product->link = $this->link;
        $product->price = $this->price;
        $product->status = $this->status;
        if ($this->image) {


            $image_name = Carbon::now()->timestamp . '.' . $this->image->extension();
            if (file_exists('assets/images/sliders/' . $this->old_image)) {
                unlink('assets/images/sliders/' . $this->old_image);
            }
            $this->image->storeAS('sliders', $image_name);
            $product->image = $image_name;
        }

        $product->slide_type = $this->slider_type;
        $product->save();
        session()->flash('message', 'slider has been added successfuly');
    }

    public function render()
    {
        return view('livewire.admin.home.edit-slide-component')->layout('layouts.base');
    }
}
