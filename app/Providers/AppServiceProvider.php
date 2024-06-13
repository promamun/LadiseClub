<?php

namespace App\Providers;

use App\Models\Setting; // Assuming you have a Setting model
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Schema::defaultStringLength(191);

    // Load settings from the database
    $this->loadSettings();

    // Blade directives for permissions
    Blade::directive('can', function ($expression) {
      return "<?php if(auth()->check() && auth()->user()->hasPermission($expression)): ?>";
    });

    Blade::directive('endcan', function () {
      return "<?php endif; ?>";
    });

    // Custom Vite style tag attributes
    Vite::useStyleTagAttributes(function (?string $src, string $url, ?array $chunk, ?array $manifest) {
      if ($src !== null) {
        return [
          'class' => preg_match("/(resources\/assets\/vendor\/scss\/(rtl\/)?core)-?.*/i", $src) ? 'template-customizer-core-css' : (preg_match("/(resources\/assets\/vendor\/scss\/(rtl\/)?theme)-?.*/i", $src) ? 'template-customizer-theme-css' : '')
        ];
      }
      return [];
    });
  }

  /**
   * Load settings from the database and set them in the config.
   */
  protected function loadSettings(): void
  {
    if (Schema::hasTable('settings')) {
      $allOptions = [];
      $allOptions['settings'] = Setting::all()->pluck('option_value', 'option_key')->toArray();
      config($allOptions);
    }
  }
}
