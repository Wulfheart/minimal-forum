<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Hub;
use App\Models\User;
use App\ViewData\Overview\Channel as ChannelViewData;
use App\ViewData\Overview\Hub as HubViewData;
use App\ViewData\Overview\OverviewViewData;
use App\ViewData\Overview\PostPreview;
use App\ViewData\Shared\Author;

final class OverviewDataService
{
    public function getOverviewDataForUser(User $user): OverviewViewData
    {
        $hubs = Hub::with(['channels.latestPost' => [
            'user',
            'topic',
        ]])->withCount('channels.topics', 'channels.posts')->get();

        $hubViewData = [];

        foreach ($hubs as $hub) {

            $channels = $hub->channels->map(function ($channel) {
                $postPreview = new PostPreview(
                    route('overview'),
                    $channel->latestPost->topic->title->string(),
                    new Author(
                        $channel->latestPost->user->name,
                        ''
                    ),
                    $channel->latestPost->posted_at->format('Y-m-d'),
                );
                return new ChannelViewData(
                    (string) $channel->name,
                    $channel->description?->value(),
                    route('channel', $channel->id),
                    $postPreview,
                    $channel->topics_count,
                    $channel->posts_count,
                );
            })->toArray();

            $hubViewData[] = new HubViewData(
                (string) $hub->name,
                $hub->description?->value(),
                $channels,
            );

        }

        return new OverviewViewData('Diplomacy Network Forum', $hubViewData);

    }

    public function getOverviewDataForGuest(): OverviewViewData
    {

    }

}
