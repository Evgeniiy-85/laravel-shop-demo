<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller {

    public function login() {
        if (Gate::allows('User')) {
            return redirect()->route('catalog');
        }

        return view('auth.login');
    }

    public function auth(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attemptWhen([
            'user_email' => $request->email,
            'password' => $request->password,
            'user_status' => User::STATUS_ACTIVE,
        ])) {
            return redirect()->route('catalog');
        }

        return back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {
        if (Gate::allows('User')) {
            Auth::logout();
        }

        return back();
    }
}
