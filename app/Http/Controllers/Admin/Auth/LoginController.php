<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    protected function guard()
    {exit;
        return Auth::guard('admin');
    }

    public function login() {
        return view('admin.auth.login');
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
            'user_role' => User::ROLE_ADMIN,
        ])) {

            return redirect()->intended(route('admin.index'));

            return redirect()->route('admin.index');
        }

        return back();
    }
}
