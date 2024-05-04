<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
      $routeCheck = $request->route()->uri;
      // Check if the URI contains 'admin'
      if (str_contains($routeCheck, 'admin')) {
        return $request->expectsJson() ? null : route('admin.login');
      } else {
        return $request->expectsJson() ? null : route('login');
      }
    }
}
