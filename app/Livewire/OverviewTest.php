<?php

namespace App\Livewire;

use Livewire\Livewire;
use Tests\TestCase;

class OverviewTest extends TestCase
{
    /** @test */
    public function renders_successfully(): void
    {
        Livewire::test(Overview::class)
            ->assertStatus(200);
    }
}
