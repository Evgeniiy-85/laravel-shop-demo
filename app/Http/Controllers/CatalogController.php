<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFilter;

class CatalogController extends Controller {

    public function index() {
        $categories = Category::where('cat_status', Category::STATUS_ACTIVE)->where('cat_parent', 0)->get();

        return view('catalog.index', [
            'categories' => $categories
        ]);
    }

    public function category($alias, $subcategory_alias = '') {
        $category = Category::where('cat_status', Category::STATUS_ACTIVE)
        ->where('cat_alias', $subcategory_alias ?: $alias)
        ->first();
        if (!$category) {
            abort(404);
        }

        $subcategories = Category::where('cat_status', Category::STATUS_ACTIVE)
            ->where('cat_parent', $category->cat_id)
            ->get();

        $products = $filter = [];
        if (!$subcategories->count()) {
            $products = Product::where('prod_status', Product::STATUS_ACTIVE)
                ->where('prod_category', $category->cat_id)
                ->get();
            $filter = new ProductFilter();
        }

        return view('catalog.category', [
            'category' => $category,
            'subcategories' => $subcategories,
            'products' => $products,
            'filter' => $filter,
        ]);
    }
}
