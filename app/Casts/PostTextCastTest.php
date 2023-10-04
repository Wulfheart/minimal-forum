<?php

declare(strict_types=1);

namespace App\Casts;

use App\ValueObjects\PostText;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

#[CoversClass(PostTextCast::class)]
final class PostTextCastTest extends TestCase
{
    public function testGetReturnsPostTextInstance(): void
    {
        $cast = new PostTextCast();
        $model = new class() extends Model {
        };
        $key = 'text';
        $value = 'This is a post text';

        $result = $cast->get($model, $key, $value, []);

        $this->assertInstanceOf(PostText::class, $result);
        $this->assertEquals($value, (string) $result);
    }

    public function test_set_throws_exception_if_value_is_not_post_text(): void
    {
        $cast = new PostTextCast();
        $model = new class() extends Model {
        };
        $key = 'text';
        $value = 'This is not a PostText';

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The value must be an instance of " . PostTextCast::class);

        $cast->set($model, $key, $value, []);
    }

    public function test_set_returns_post_text_as_string(): void
    {
        $cast = new PostTextCast();
        $model = new class() extends Model {
        };
        $key = 'text';
        $postText = new PostText('Valid PostText');

        $result = $cast->set($model, $key, $postText, []);

        $this->assertEquals((string) $postText, $result);
    }
}
