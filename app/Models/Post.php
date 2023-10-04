<?php

namespace App\Models;

use App\Casts\PostTextCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $casts = [
        'content' => PostTextCast::class,
    ];

    /**
     * @return BelongsTo<User, Post>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
