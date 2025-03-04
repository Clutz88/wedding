<?php

namespace App\Livewire;

use App\Settings\Wedding;
use Illuminate\View\View;
use Livewire\Component;

class Home extends Component
{
    private Wedding $wedding;

    public function mount(Wedding $wedding): void
    {
        $this->wedding = $wedding;
    }

    public function render(): View
    {
        return view('livewire.home', [
            'wedding' => $this->wedding,
        ]);
    }
}
