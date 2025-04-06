<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductsRequest;
use App\Models\Category;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends AdminController {

    public function index() {
        return view('admin.products.index', [
            'products' => Product::paginate($this->settings->count_items),
        ]);
    }

    public function add() {
        return view('admin.products.add', [
            'categories' => Category::all(),
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
        ]);
    }

    /**
     * @param ProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductsRequest $request) {
        $product = new Product();
        $product->fill($request->all());
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

        if ($product->image) {
            Storage::disk('products')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Успешно');
    }
}
