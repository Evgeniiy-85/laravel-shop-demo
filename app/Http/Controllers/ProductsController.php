<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorites;
use App\Models\Product\Product;
use App\Models\Product\ProductFilter;
use App\Models\Product\ProductReview;
use Illuminate\Http\Request;

class ProductsController extends Controller {

    public function index() {
        $products = Product::where('status', 1)->get();

        return view('products.index', [
            'products' => $products
        ]);
    }

    public function product($alias) {
        $product = Product::where('status', 1)
        ->where('alias', $alias)
        ->first();

        if (!$product) {
            abort(404);
        }

        $category = $product->category_id ? Category::find($product->category_id) : false;

        $reviews = ProductReview::where('review_status', 1)
            ->where('id', $product->id);
        $count_reviews = $reviews->count();
        $product_rating = $count_reviews ? number_format($reviews->sum('review_rating') / $count_reviews, 1) : 0;

        return view('products.product', [
            'product' => $product,
            'category' => $category,
            'count_reviews' => $count_reviews,
            'product_rating' => $product_rating,
        ]);
    }


    public function search(Request $request) {
        $search = $request->input('q');
        $products = Product::where('status', 1)
            ->leftJoin('categories', 'categories.cat_id', '=', 'products.category');

        if ($search) {
            $products->where('title', 'like', "%{$search}%")
            ->orWhere('cat_title', 'like', "%{$search}%");
        }

        $filter = new ProductFilter();
        if ($filter->loadFilter($request->input('filter'))) {
            $filter->add($products);
        }

        return view('products.search', [
            'products' => $products->get(),
            'products_count' => $products->count(),
            'filter' => $filter,
        ]);
    }


    public function favorites() {
        $favorites = new Favorites();
        $f_products = $favorites->getProducts();

        $products = $f_products ? Product::where('status', 1)
            ->whereIn('id', array_keys($f_products))
            ->get() : [];

        return view('products.favorites', [
            'products' => $products
        ]);
    }
}
