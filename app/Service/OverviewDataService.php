<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Topic;
use App\Models\User;
use App\ViewData\Discussion\ListItem;
use App\ViewData\Shared\Color;
use App\ViewData\Structure\ChannelDisplayData;

final class OverviewDataService
{
    /**
     * @return array<ListItem>
     */
    public function getAllDiscussionsForUser(User $user, int $page, int $numPerPage): array
    {
        $query = Topic::with('latestPost.user', 'channel.hub')->withCount('posts');

        $paginated = $query->paginate($numPerPage, page: $page);

        $paginated->map(fn(Topic $topic) => new ListItem(
            $topic->id,
            $topic->title->string(),
            '#',
           new ChannelDisplayData(
               $topic->channel->hub->name->string(),
               Color::fromHex($topic->channel->hub->color),
                $topic->channel->name->string(),
               Color::fromHex($topic->channel->color),
               $topic->channel->icon,
           ),
            $topic->latestPost->user->name,
            $topic->latestPost->posted_at->diffForHumans(),
            $topic->posts_count > 1,
            $topic->posts_count,
            false
        ));

        return [];
    }
}
