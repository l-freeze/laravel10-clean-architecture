<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * @var array{prefix => routefile}
     */
    private $routesFileSet = [
        'account' => 'routes/domain/account.php',
        'system' => 'routes/domain/system.php',
    ];

    /**
     * @var array<string>
     */
    private $routeFileList = [
        'routes/domain/account.php',
    ];

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));


//            array_walk(
//                $this->routesFileSet,
//                fn()=>Route::namespace($this->namespace)
//                    ->prefix('account')
//                    ->group(base_path('routes/domain/account.php'))
//            );
            
            array_walk(
                $this->routesFileSet,
                fn($route)=>Route::namespace($this->namespace)->group(base_path($route))
            );

        });
    }
}
