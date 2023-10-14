<?php

declare(strict_types=1);

namespace App\ViewData\Shared;

final class Author
{
    public function __construct(
        public string $name,
        public string $link,
    ) {
    }
}
