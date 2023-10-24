<?php

namespace App\Livewire;

use App\ViewData\Discussion\ListItem;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DiscussionListItem extends Component
{
    #[Locked]
    public ListItem $item;

    public function mount(): void
    {

    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.discussion-list-item');
    }
}
