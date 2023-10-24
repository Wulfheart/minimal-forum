<?php

declare(strict_types=1);

namespace App\ViewData\Shared;

use Livewire\Wireable;

final class Color implements Wireable
{
    private function __construct(
        private string $hex
    ) {}

    public static function fromHex(string $hex): self
    {
        $hex = ltrim($hex, '#');
        return new self('#' . $hex);
    }

    public function getContrastColor(): Color
    {
        $hex = str_replace('#', '', $this->hex);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;

        return new Color(($yiq >= 128) ? '#111827' : '#fff');
    }

    public function hexValue(): string
    {
        return $this->hex;
    }

    public function toLivewire(): string
    {
        return $this->hex;
    }

    public static function fromLivewire(mixed $value): Color
    {
        return new self($value);
    }
}
