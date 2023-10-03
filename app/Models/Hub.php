<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hub extends Model
{
    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class);
    }
}
