<?php

namespace App\Casts;

use App\ValueObjects\NexusName;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class NexusNameCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): NexusNameCast
    {
        return new self($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): string
    {
        if(! $value instanceof NexusName){
            throw new InvalidArgumentException("The value must be an instance of " . self::class);
        }
        return (string) $value;
    }
}
