<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Model::unguard();
        Model::preventLazyLoading();
        Model::preventAccessingMissingAttributes();
        Model::preventSilentlyDiscardingAttributes();

        ComponentAttributeBag::macro('collect', function (string $prefix) {
            $inputAttributes = collect($this->whereStartsWith($prefix)->getAttributes())
                ->mapWithKeys(fn ($value, $key) => [str_replace($prefix, '', $key) => $value])
                ->toArray();

            return new ComponentAttributeBag($inputAttributes);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
