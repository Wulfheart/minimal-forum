<?php

namespace App\Models;

use App\Casts\NexusDescriptionCast;
use App\Casts\NexusNameCast;
use App\Events\TopicCreatedEvent;
use App\ValueObjects\NexusName;
use App\ValueObjects\PostText;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;

class Channel extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => NexusNameCast::class,
        'description' => NexusDescriptionCast::class,
    ];

    public function hub(): BelongsTo
    {
        return $this->belongsTo(Hub::class);
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
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
        $post->save();

        Event::dispatch(new TopicCreatedEvent($topic->id, $user->id));

        return $topic;
    }
}
