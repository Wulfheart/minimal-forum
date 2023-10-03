<?php

namespace App\Casts;

use App\ValueObjects\NexusDescription;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class NexusDescriptionCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes)
    {
        return new self($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        if(! $value instanceof NexusDescription){
            throw new InvalidArgumentException("The value must be an instance of " . self::class);
        }
        return $value->value();
    }
}
