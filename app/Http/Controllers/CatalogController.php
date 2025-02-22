<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFilter;

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
