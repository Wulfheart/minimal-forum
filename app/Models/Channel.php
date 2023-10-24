<?php

namespace App\Models;

use App\Casts\NexusDescriptionCast;
use App\Casts\NexusNameCast;
use App\Events\TopicCreatedEvent;
use App\ValueObjects\NexusName;
use App\ValueObjects\PostText;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Facades\Event;

/**
 * @property-read Post $latestPost
 * @property-read Hub $hub
 */
class Channel extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => NexusNameCast::class,
        'description' => NexusDescriptionCast::class,
    ];

    /**
     * @return BelongsTo<Hub, Channel>
     */
    public function hub(): BelongsTo
    {
        return $this->belongsTo(Hub::class);
    }

    /**
     * @return HasMany<Topic>
     */
    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    /**
     * @return HasManyThrough<Post>
     */
    public function posts(): HasManyThrough
    {
        return $this->hasManyThrough(Post::class, Topic::class);
    }

    /**
     * @return HasOneThrough<Post>
     */
    public function latestPost(): HasOneThrough
    {
        return $this->hasOneThrough(Post::class, Topic::class)->latest('posts.posted_at');
    }

    public function createTopic(NexusName $title, PostText $postText, User $user): Topic
    {
        $topic = new Topic();
        $topic->title = $title;
        $topic->channel_id = $this->id;
        $topic->save();

        $post = new Post();
        $post->content = $postText;
        $post->user_id = $user->id;
        $post->topic_id = $topic->id;
        $post->posted_at = Carbon::now();
        $post->save();

        Event::dispatch(new TopicCreatedEvent($topic->id, $user->id));

        return $topic;
    }
}
