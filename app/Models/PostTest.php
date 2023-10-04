<?php

declare(strict_types=1);

namespace App\Models;

use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

#[CoversClass(Post::class)]
final class PostTest extends TestCase
{
}
