<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorites;
use App\Models\Product;
use App\Models\ProductFilter;
use App\models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller {

    public function login() {
        if (Gate::allows('User')) {
            return redirect()->route('catalog');
        }

        return view('auth.login');
    }
}
