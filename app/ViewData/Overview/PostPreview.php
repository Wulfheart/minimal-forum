<?php

declare(strict_types=1);

namespace App\ViewData\Overview;

use App\ViewData\Shared\Author;

final class PostPreview
{
    public function __construct(
        public string $link,
        public string $topicName,
        public Author $author,
        public string $postedAt
    ) {

    }
}
