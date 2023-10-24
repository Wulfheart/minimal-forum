<?php

declare(strict_types=1);

namespace App\ViewData\Structure;

final class Navigation
{
    public function __construct(
        /** @var array<Item> */
        public array $items,
        /** @var array<Hub> $hubs */
        public array $hubs,
        public bool $showStartDiscussionButton,
        public bool $showFollowButton,
        public bool $isFollowed
    ) {
    }
}
