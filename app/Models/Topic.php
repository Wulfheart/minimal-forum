<?php

namespace App\Models;

use App\Casts\NexusNameCast;
use App\ValueObjects\PostText;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    /** @var array<string, class-string<CastsAttributes>  */
    protected $casts = [
        'title' => NexusNameCast::class,
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
