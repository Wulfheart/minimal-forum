<?php

declare(strict_types=1);

namespace App\Casts;

use App\ValueObjects\NexusDescription;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

#[CoversClass(NexusDescriptionCast::class)]
final class NexusDescriptionCastTest extends TestCase
{
    public function test_get_returns_nexus_description_instance(): void
    {
        $cast = new NexusDescriptionCast();
        $model = new class() extends Model {
        };
        $key = 'description';
        $value = 'This is a description';

        $result = $cast->get($model, $key, $value, []);

        $this->assertInstanceOf(NexusDescription::class, $result);
        $this->assertEquals($value, $result->value());
    }

    public function test_set_throws_exception_if_value_is_not_nexus_description(): void
    {
        $cast = new NexusDescriptionCast();
        $model = new class() extends Model {
        };
        $key = 'description';
        $value = 'This is not a NexusDescription';

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The value must be an instance of " . NexusDescriptionCast::class);

        $cast->set($model, $key, $value, []);
    }

    public function test_set_returns_nexus_description_value(): void
    {
        $cast = new NexusDescriptionCast();
        $model = new class() extends Model {
        };
        $key = 'description';
        $nexusDescription = new NexusDescription('Valid NexusDescription');

        $result = $cast->set($model, $key, $nexusDescription, []);

        $this->assertEquals($nexusDescription->value(), $result);
    }
}
