<?php

declare(strict_types=1);

namespace App\ViewData\Structure;

use App\ViewData\Shared\Color;

final class Hub
{
    public function __construct(
        public string $title,
        public Color $color,
        public string $link,
        public bool $isActive,
        /** @var array<Channel> $channels */
        public array $channels
    )
    {
    }
}
