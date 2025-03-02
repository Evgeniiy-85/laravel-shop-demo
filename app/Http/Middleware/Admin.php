<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class Admin extends Middleware {
    public function handle($request, Closure $next, ...$guards) {
        if (!$this->auth->user()) {
            return redirect()->route('admin.login');
        }

        if (!Gate::allows('Admin')) {
            return redirect()->route('admin.login')->with('Ошибка', 'У вас нет разрешений на доступ к этой странице');
        }

        return $next($request);
    }
}
