<?php

namespace App\Models;

use App\Casts\NexusNameCast;
use App\Events\PostCreatedEvent;
use App\ValueObjects\PostText;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Event;

class Topic extends Model
{
    use HasFactory;

    protected $casts = [
        'title' => NexusNameCast::class,
    ];

    /**
     * @return BelongsTo<Channel, Topic>
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    /**
     * @return HasMany<Post>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class)->orderBy('created_at');
    }

    /**
     * @return HasOne<Post>
     */
    public function latestPost(): HasOne
    {
        return $this->hasOne(Post::class)->ofMany('created_at', 'max');
    }

    public function comment(User $user, PostText $text): Post
    {
        $post = new Post();
        $post->content = $text;
        $post->user_id = $user->id;
        $post->topic_id = $this->id;
        $post->posted_at = Carbon::now();
        $post->save();

        Event::dispatch(new PostCreatedEvent($post->id, $user->id));

        return $post;
    }


}
