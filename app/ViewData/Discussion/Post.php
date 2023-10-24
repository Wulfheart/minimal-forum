<?php

declare(strict_types=1);

namespace App\ViewData\Discussion;

final class Post
{
    public function __construct(
        public int $id,
        public string $author,
        public string $postedAt,
        public string $content,
    ){}
}
