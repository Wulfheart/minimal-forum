<?php

declare(strict_types=1);

namespace App\Service;

use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

#[CoversClass(OverviewDataService::class)]
final class OverviewDataServiceTest extends TestCase
{
    public function test_getOverviewDataForUser(): void
    {
        $this->markTestIncomplete();
    }
}
