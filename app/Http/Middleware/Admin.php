<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Admin extends Middleware {

    /**
     * @param $request
     * @param Closure $next
     * @param ...$guards
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next, ...$guards) {
        if (!$this->auth->guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
