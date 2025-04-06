<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\Product\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsReviewsController extends Controller {

    public function add($alias) {
        $product = Product::where('status', 1)
            ->where('alias', $alias)
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
    public function store(Request $request, $alias) {
        $product = Product::where('status', 1)
            ->where('alias', $alias)
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
        $review->id = $product->id;
        $review->user_id = $user_id;
        $review->save();

        return redirect()->route('products.product', $product->alias)->with('success', 'Успешно');
    }
}
