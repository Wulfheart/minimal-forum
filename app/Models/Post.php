<?php

namespace App\Models;

use App\Casts\PostTextCast;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
* @property-read Topic $topic
 * @property-read User $user
 */
class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'content' => PostTextCast::class,
        'posted_at' => 'datetime'
    ];

    /**
     * @return BelongsTo<User, Post>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Topic, Post>
     */
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}
