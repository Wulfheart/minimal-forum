<?php

declare(strict_types=1);

namespace App\ViewData\Shared;

final readonly class Breadcrumb
{
    public function __construct(
        public string $name,
        public ?string $url = null,
    )
    {
    }

    public function hasUrl(): bool
    {
        return $this->url !== null;
    }
}
