<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Channel extends Model
{
    public function hub(): BelongsTo
    {
        return $this->belongsTo(Hub::class);
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
}
