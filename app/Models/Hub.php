<?php

namespace App\Models;

use App\Casts\NexusDescriptionCast;
use App\Casts\NexusNameCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hub extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => NexusNameCast::class,
        'description' => NexusDescriptionCast::class,
    ];

    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class);
    }
}
