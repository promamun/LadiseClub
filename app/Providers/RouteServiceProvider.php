<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
  /**
   * The path to your application's "home" route.
   *
   * Typically, users are redirected here after authentication.
   *
   * @var string
   */

  public const HOME = '/';

    /**
     * Get the home path for the authenticated user.
     *
     * @return string
     */
    public static function getUserHome()
    {
        $user = Auth::user();
        if ($user) {
            switch ($user->is_admin) {
                case 1:
                    return '/';
                case 2:
                    return '/admin/dashbord';
                default:
                    return self::HOME;
            }
        }
        return self::HOME;
    }

  /**
   * Define your route model bindings, pattern filters, and other route configuration.
   */
  public function boot(): void
  {
    RateLimiter::for('api', function (Request $request) {
      return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
    });

    $this->routes(function () {
      Route::middleware('web')
        ->prefix('admin')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin.php'));

      Route::middleware('api')
        ->prefix('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api.php'));

      Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/web.php'));
    });
  }
}
