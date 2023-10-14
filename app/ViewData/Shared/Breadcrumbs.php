<?php

declare(strict_types=1);

namespace App\ViewData\Shared;

use ArrayIterator;
use IteratorAggregate;

/**
 * @implements IteratorAggregate<Breadcrumb>
 */
final readonly class Breadcrumbs implements IteratorAggregate
{
    /**
     * @param array<Breadcrumb> $breadcrumbs
     */
    public function __construct(
        public array $breadcrumbs,
    ) {
    }

    /**
     * @return ArrayIterator<int, Breadcrumb>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->breadcrumbs);
    }

}
