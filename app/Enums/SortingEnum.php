<?php

declare(strict_types=1);

namespace App\Enums;

enum SortingEnum: string
{
    case NEWEST = 'newest';
    case OLDEST = 'oldest';
    case MOST_COMMENTED = 'most_commented';
}

