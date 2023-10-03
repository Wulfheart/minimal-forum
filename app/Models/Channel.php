<?php

namespace App\Models;

use App\Casts\NexusDescriptionCast;
use App\Casts\NexusNameCast;
use App\ValueObjects\NexusName;
use App\ValueObjects\PostText;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

        $post = new Post();
        $post->content = $postText;
        $post->
        $topic->posts->add()
    }
}
