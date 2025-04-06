<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product\Product;
use App\Models\Product\ProductFilter;
use Illuminate\Http\Request;

class CatalogController extends Controller {

    public function index() {
        $categories = Category::where('status', 1)->where('parent', 0)->get();

        return view('catalog.index', [
            'categories' => $categories
        ]);
    }

    public function category(Request $request, $alias, $subcategory_alias = '') {
        $category = Category::where('status', 1)
        ->where('alias', $subcategory_alias ?: $alias)
        ->first();
        if (!$category) {
            abort(404);
        }

        $subcategories = Category::where('status', 1)
            ->where('parent', $category->id)
            ->get();

        $filter = new ProductFilter();
        $products = new Product();

        if (!$subcategories->count()) {
            $products = Product::where('status', 1)
                ->where('category_id', $category->id);

            if ($filter->loadFilter($request->input('filter'))) {
                $filter->add($products);
            }
        }

        return view('catalog.category', [
            'category' => $category,
            'subcategories' => $subcategories,
            'products' => $products->get(),
            'filter' => $filter,
        ]);
    }
}
