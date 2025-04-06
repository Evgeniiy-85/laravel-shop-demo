<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard() {
        return Auth::guard('admin');
    }


    public function login() {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin');
        }

        return view('admin.auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt([
            'user_email' => $request->email,
            'password' => $request->password,
            'user_status' => User::STATUS_ACTIVE,
            'user_role' => User::ROLE_ADMIN,
        ])) {
            return redirect()->route('admin');
        }

        return back();
    }


    /**
     * @return void
     */
    public function logout() {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
