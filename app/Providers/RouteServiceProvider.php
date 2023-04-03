<?php

namespace App\Providers;

use App\Models\HomeSlider;
use Illuminate\Http\Request;
use App\Models\FrontPages\About;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Controllers\FrontPages\FrontController;
use App\Models\FrontPages\Methodology;
use App\Models\ProjType;
use App\Models\Service;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::model('HomeSlider', HomeSlider::class);
            Route::model('About', About::class);
            Route::model('service', Service::class);
            Route::model('about', FrontController::class);
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
