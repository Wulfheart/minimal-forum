<?php

namespace App\Casts;

use App\ValueObjects\PostText;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PostTextCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes)
    {
        return new PostText($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        if (!$value instanceof PostText) {
            throw new InvalidArgumentException("The value must be an instance of " . self::class);
        }
        return (string)$value;
    }
}