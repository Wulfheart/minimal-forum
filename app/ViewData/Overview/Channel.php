<?php

declare(strict_types=1);

namespace App\ViewData\Overview;

final class Channel
{
    public function __construct(
        public string $title,
        public ?string $description,
        public string $link,
        public PostPreview $latestPost,
        public int $numberOfTopics,
        public int $numberOfPosts,
    ) {
    }

}
