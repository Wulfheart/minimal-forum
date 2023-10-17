<?php

declare(strict_types=1);

namespace App\ViewData\Overview;

final class Hub
{
    public function __construct(
        public string $title,
        public ?string $description,
        /** @var array<Channel> $channels */
        public array $channels,
    ) {
    }
}
