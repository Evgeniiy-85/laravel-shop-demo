<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductsRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductsController extends AdminController {

    public function index() {
        return view('admin.products.index', [
            'products' => Product::paginate($this->settings->count_items),
        ]);
    }

    public function add() {
        return view('admin.products.add', [
            'categories' => Category::all(),
            'statuses' => Product::getStatuses(),
        ]);
    }


    public function edit($id) {
        $product = Product::find($id);
        if (is_null($product)) {
            return view('admin.errors.404');
        }

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'statuses' => Product::getStatuses(),
        ]);
    }

    /**
     * @param ProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductsRequest $request) {
        $product = new Product();
        $product->fill($request->all());
        $product->prod_images = $request->input('prod_images') ? collect($product->prod_images)->toJson() : null;

        if (!$product->prod_alias) {
            $product->prod_alias = Str::slug($product->prod_title);
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Успешно');
    }

    /**
     * @param $id
     * @param ProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, ProductsRequest $request) {
        $product = Product::findOrFail($id);
        $product->fill($request->all());

        if (!$product->prod_alias) {
            $product->prod_alias = Str::slug($product->prod_title);
        }
        $product->prod_images = $request->input('prod_images') ? collect($product->prod_images)->toJson() : null;
        $product->save();

        return redirect()->route('admin.products')->with('success', 'Успешно');
    }


    /*
    * Delete category
    */
    public function delete($id) {
        $product = Product::find($id);
        if (is_null($product)) {
            return view('admin.errors.404');
        }

        if ($product->prod_image) {
            Storage::disk('products')->delete($product->prod_image);
        }
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Успешно');
    }
}
