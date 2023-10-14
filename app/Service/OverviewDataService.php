<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Hub;
use App\Models\User;
use App\ViewData\Overview\Channel as ChannelViewData;
use App\ViewData\Overview\Hub as HubViewData;
use App\ViewData\Overview\OverviewViewData;
use App\ViewData\Overview\PostPreview;
use Exception;

final class OverviewDataService
{
    public function getOverviewDataForUser(User $user): OverviewViewData
    {
        $hubs = Hub::with(['channels.latestPost' => [
            'user',
            'topic',
        ]])->withCount('channels.topics', 'channels.posts')->get();

        foreach ($hubs as $hub) {
            $channels = $hub->channels->map(function ($channel) {
                return new ChannelViewData(
                    (string) $channel->name,
                    $channel->description?->value(),
                    route('channel', $channel->id),
                    new PostPreview(
                        route('overview'),
                        $channel->latestPost->topic->title->string() ?? throw new Exception('No topic title'),
                        $channel->latestPost->user->name,
                        $channel->latestPost->created_at
                    ),
                    $channel->topics_count,
                    $channel->posts_count,
                );
            })->toArray();

            $hubViewData[] = new HubViewData(
                (string) $hub->name,
                (string) $hub->description,
                $channels,
            );

        }

        return new OverviewViewData('Diplomacy Network Forum', $hubViewData);

    }

}
