<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFilter;
use Illuminate\Http\Request;

class ProductsController extends Controller {

    public function index() {
        $products = Product::where('prod_status', Product::STATUS_ACTIVE)->get();

        return view('products.index', [
            'products' => $products
        ]);
    }

    public function product($alias) {
        $product = Product::where('prod_status', Product::STATUS_ACTIVE)
        ->where('prod_alias', $alias)
        ->first();
        if (!$product) {
            abort(404);
        }

        $category = $product->prod_category ? Category::find($product->prod_category) : false;

        return view('products.product', [
            'product' => $product,
            'category' => $category,
        ]);
    }


    public function search(Request $request) {
        $search = $request->input('q');
        $products = Product
            ::where('prod_status', Product::STATUS_ACTIVE)
            ->leftJoin('categories', 'categories.cat_id', '=', 'products.prod_category');

        if ($search) {
            $products->where('prod_title', 'like', "%{$search}%")
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
}
