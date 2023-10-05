<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use LazilyRefreshDatabase;

    public function assertEloquentModelEquals(Model $model1, ?Model $model2): void
    {
        $message = sprintf(
            "Model of class %s with id %s is not equal to model of class %s with id %s",
            get_class($model1),
            $model1->id,
            get_class($model2),
            $model2->id
        );
        $this->assertTrue($model1->is($model2), $message);
    }
}
