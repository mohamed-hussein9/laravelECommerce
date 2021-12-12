<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\HomeSlide;
use Livewire\Component;

class HomeSlideComponent extends Component
{
    public function delete($id)
    {
        $slide = HomeSlide::find($id);

        unlink('assets/images/sliders/'  . $slide->image);
        $slide->delete();
    }
    public function render()
    {
        $sliders = HomeSlide::all();
        return view('livewire.admin.home.home-slide-component', ['sliders' => $sliders])->layout('layouts.base');
    }
}
