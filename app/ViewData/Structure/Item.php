<?php

declare(strict_types=1);

namespace App\ViewData\Structure;

use App\ViewData\Shared\Color;

final class Item
{
    public function __construct(
        public string $title,
        public string $link,
        public bool $isActive,
        public string $icon = '',
    ){}
}
