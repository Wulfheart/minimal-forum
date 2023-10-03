<?php

namespace App\Models;

use App\ValueObjects\NexusName;
use App\ValueObjects\PostText;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    protected $casts = [
        'title' => NexusName::class,
    ];

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class)->orderByDesc('created_at');
    }

    public function comment(User $user, PostText $text): Post
    {
        return $this->posts()->create([
            'user_id' => $user->id,
            'text' => $text,
        ]);
    }
}
