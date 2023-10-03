<?php

declare(strict_types=1);

namespace App\ValueObjects;

use InvalidArgumentException;

final readonly class NexusName
{
    public function __construct(
        private string $content
    ) {
        if ($this->content === '') {
            throw new InvalidArgumentException("The content cannot be empty");
        }
    }

    public static function fromString(string $content): self
    {
        return new self($content);
    }

    public function __toString(): string
    {
        return $this->content;
    }


}
