<?php

declare(strict_types=1);

namespace App\ViewData\Overview;

final class OverviewViewData
{
    public function __construct(
        public string $title,
        /** @var array<Hub> $hubs */
        public array $hubs,
    ) {
    }
}
