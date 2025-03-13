<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /*
     * Create category
     */
    public function store(Request $request, $prod_alias) {
        $product = Product::where('prod_status', Product::STATUS_ACTIVE)
            ->where('prod_alias', $prod_alias)
            ->first();
        $user_id = Auth::check() ? Auth::user()->user_id : null;
        if (!$product || !$user_id) {
            abort(404);
        }

        $data = $request->validate([
            'review_advantage' => 'nullable|string|min:10',
            'review_disadvantage' => 'nullable|string|min:10',
            'review_comment' => 'nullable|string|min:10',
            'review_rating' => 'required|numeric|min:1',
        ]);

        $review = new ProductReview();
        $review->fill($data);
        $review->prod_id = $product->prod_id;
        $review->user_id = $user_id;
        $review->save();

        return redirect()->route('products.product', $product->prod_alias)->with('success', 'Успешно');
    }
}
