<?php

declare(strict_types=1);

namespace App\Casts;

use App\ValueObjects\NexusName;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

#[CoversClass(NexusNameCast::class)]
final class NexusNameCastTest extends TestCase
{
    public function test_get_returns_nexus_name_instance(): void
    {
        $cast = new NexusNameCast();
        $model = new class() extends Model {};
        $key = 'name';
        $value = 'John Doe';

        $result = $cast->get($model, $key, $value, []);

        $this->assertInstanceOf(NexusName::class, $result);
        $this->assertEquals($value, (string) $result);
    }

    public function test_set_throws_exception_if_value_is_not_nexus_name(): void
    {
        $cast = new NexusNameCast();
        $model = new class() extends Model {};
        $key = 'name';
        $value = 'This is not a NexusName';

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The value must be an instance of " . NexusNameCast::class);

        $cast->set($model, $key, $value, []);
    }

    public function test_set_returns_nexus_name_as_string(): void
    {
        $cast = new NexusNameCast();
        $model = new class() extends Model {};
        $key = 'name';
        $nexusName = new NexusName('Valid NexusName');

        $result = $cast->set($model, $key, $nexusName, []);

        $this->assertEquals((string) $nexusName, $result);
    }
}
