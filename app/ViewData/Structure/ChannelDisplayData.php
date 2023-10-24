<?php

declare(strict_types=1);

namespace App\ViewData\Structure;

use App\ViewData\Shared\Color;
use Livewire\Wireable;

final class ChannelDisplayData implements Wireable
{
    public function __construct(
        public string $hubTitle,
        public Color $hubColor,
        public string $channelTitle,
        public Color $channelColor,
        public string $channelIcon = '',
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function toLivewire(): array
    {
        return [
            'hubTitle' => $this->hubTitle,
            'hubColor' => $this->hubColor->toLivewire(),
            'channelTitle' => $this->channelTitle,
            'channelColor' => $this->channelColor->toLivewire(),
        ];
    }

    public static function fromLivewire(mixed $value): ChannelDisplayData
    {
        return new self(
            $value['hubTitle'],
            Color::fromLivewire($value['hubColor']),
            $value['channelTitle'],
            Color::fromLivewire($value['channelColor']),
        );
    }
}
