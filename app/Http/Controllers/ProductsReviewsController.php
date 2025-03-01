<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorites;
use App\Models\Product;
use App\Models\ProductFilter;
use App\models\ProductReview;
use Illuminate\Http\Request;

class ProductsReviewsController extends Controller {

    public function add($prod_alias) {
        $product = Product::where('prod_status', Product::STATUS_ACTIVE)
            ->where('prod_alias', $prod_alias)
            ->first();
        if (!$product) {
            abort(404);
        }
        return view('products.reviews.add', [
            'product' => $product
        ]);
    }
}
