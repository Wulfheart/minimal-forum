<?php

declare(strict_types=1);

namespace App\ViewData\Discussion;

use App\ViewData\Shared\Color;
use App\ViewData\Structure\ChannelPill;
use Livewire\Wireable;

final class ListItem implements Wireable
{
    public function __construct(
        public int $id,
        public string $title,
        public string $link,
        public ChannelPill $channelPill,
        public string $lastAuthor,
        public string $lastPostedAt,
        public bool $lastPostIsResponse,
        public int $responseCount,
        public bool $isUnread,
    )
    {
    }

    public function toLivewire(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'link' => $this->link,
            'channelPill' => $this->channelPill->toLivewire(),
            'lastAuthor' => $this->lastAuthor,
            'lastPostedAt' => $this->lastPostedAt,
            'lastPostIsResponse' => $this->lastPostIsResponse,
            'responseCount' => $this->responseCount,
            'isUnread' => $this->isUnread,
        ];
    }

    public static function fromLivewire(mixed $value): ListItem
    {
        return new self(
            $value['id'],
            $value['title'],
            $value['link'],
            ChannelPill::fromLivewire($value['channelPill']),
            $value['lastAuthor'],
            $value['lastPostedAt'],
            $value['lastPostIsResponse'],
            $value['responseCount'],
            $value['isUnread'],
        );
    }
}