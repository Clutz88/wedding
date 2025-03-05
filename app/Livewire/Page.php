<?php

namespace App\Livewire;

use App\Models\Page as PageModel;
use Livewire\Component;

class Page extends Component
{
    public PageModel $page;

    public function mount(PageModel $page)
    {
        $this->page = $page;
        $this->page->load('seo');
    }

    public function render()
    {
        return view('livewire.page', [
            'page' => $this->page,
        ])
            ->title($this->page->seo->title);
    }
}
