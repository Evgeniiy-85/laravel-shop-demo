<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller {

    public function index() {
        $categories = Category::where('cat_status', Category::STATUS_ACTIVE)->get();

        return view('catalog.index', [
            'categories' => $categories
        ]);
    }

    public function category($alias) {
        $category = Category::where('cat_status', Category::STATUS_ACTIVE)
         ->where('cat_alias', $alias)
         ->first();
        if (!$category) {
            exit;
        }

        $sub_categories = Category::where('cat_status', Category::STATUS_ACTIVE)
            ->where('cat_parent', $category->cat_id)
            ->get();

        $products = [];
        if (!$sub_categories->count()) {
            $products = Product::where('prod_status', Product::STATUS_ACTIVE)
                ->where('prod_category', $category->cat_id)
                ->get();
        }

        return view('catalog.category', [
            'category' => $category,
            'sub_categories' => $sub_categories,
            'products' => $products,
        ]);
    }

}
