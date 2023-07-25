<?php

namespace App\Providers;

use App\Services\impl\MerchandiseServiceImpl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\MerchandiseService', function ($app) {
            return new MerchandiseServiceImpl();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DB::listen(function($query) {
            Log::info(
                $query->sql,
                [
                    'bindings' => $query->bindings,
                    'time' => $query->time
                ]
            );
        });
    }
}
