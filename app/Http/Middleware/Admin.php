<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

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
