<?php

namespace App\Livewire;

use App\ViewData\Discussion\ListItem;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DiscussionListItem extends Component
{
    #[Locked]
    public ListItem $item;

    public function mount(
        ListItem $item
    ): void
    {
        $this->item = $item;
    }

    public function markAsRead(): void
    {
        $this->item->isUnread = false;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.discussion-list-item');
    }
}
