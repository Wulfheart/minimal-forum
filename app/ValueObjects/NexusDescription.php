<?php

declare(strict_types=1);

namespace App\ValueObjects;

final readonly class NexusDescription
{
    public function __construct(
        private ?string $content
    )
    {
    }

    public static function fromString(string $content): self
    {
        return new self($content);
    }

    public static function empty(): self
    {
        return new self(null);
    }

    public function value(): ?string
    {
        return $this->content;
    }


}
