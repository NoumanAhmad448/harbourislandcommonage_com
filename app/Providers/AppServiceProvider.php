<?php

namespace App\Providers;

use App\Spatie\GoogleCaptcha;
use App\Spatie\Js_Debug;
use Illuminate\Support\ServiceProvider;
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\CpuLoadHealthCheck\CpuLoadCheck;
use Spatie\Health\Checks\Checks\DatabaseConnectionCountCheck;
use Spatie\Health\Checks\Checks\DatabaseSizeCheck;
use Spatie\Health\Checks\Checks\DatabaseTableSizeCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\PingCheck;
use Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // CpuLoadCheck::new()
        //     ->failWhenLoadIsHigherInTheLast15Minutes(2.0),
        $checks = [
            DatabaseCheck::new(),
            CacheCheck::new(),
            OptimizedAppCheck::new()
                ->checkConfig()
                ->checkRoutes(),
            DatabaseConnectionCountCheck::new()
                ->failWhenMoreConnectionsThan(100),
            DatabaseTableSizeCheck::new()
                ->table(config("table.users"), maxSizeInMb: config("setting.max_tble_size"))
                ->table(config("table.user_profiles"), maxSizeInMb: config("setting.max_tble_size"))
                ->table(config("table.land_comments"), maxSizeInMb: config("setting.max_tble_size")),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
            SecurityAdvisoriesCheck::new(),
            Js_Debug::new(),
            GoogleCaptcha::new(),
            DatabaseSizeCheck::new(),
        ];

        if(in_array(config('app.env'),["production", "prod"])){
            $checks[] = UsedDiskSpaceCheck::new();
            $checks[] = PingCheck::new()->url(config("app.url"))->retryTimes(config("setting.retry_time"));
        }
        Health::checks($checks);
    }
}
