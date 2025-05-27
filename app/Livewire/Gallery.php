<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        $images = Image::all();
        $imageSplits = $images->split(4);
        return view('livewire.gallery', [
            'imageSplits' => $imageSplits,
        ]);
    }
}
