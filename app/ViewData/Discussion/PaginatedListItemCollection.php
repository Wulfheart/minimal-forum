<?php

declare(strict_types=1);

namespace App\ViewData\Discussion;

final class PaginatedListItemCollection
{
    public function __construct(
        public int $currentPage,
        public int $lastPage,
        /**
         * @var array<ListItem>
         */
        public array $items,
    ) {

    }

    public function addListItem(ListItem $item): void
{
        $this->items[] = $item;
    }

    public function isFirstPage(): bool
    {
        return $this->currentPage === 1;
    }

    public function isLastPage(): bool
    {
        return $this->currentPage === $this->lastPage;
    }
}
