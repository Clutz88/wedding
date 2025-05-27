<?php

namespace App\Livewire;

use App\Models\Image;
use Illuminate\Support\Collection;
use Livewire\Component;

class Gallery extends Component
{
    public Collection $images;
    public int $page = 1;

    public function mount()
    {
        $this->images = collect();
        $this->loadMore();
    }

    public function loadMore()
    {
        $this->images->push(
            collect(Image::forPage($this->page, 12)->get())
                ->split(4)
        );
        $this->page++;
    }

    public function render()
    {
        return view('livewire.gallery', [
            'imagePages' => $this->images,
        ]);
    }
}
