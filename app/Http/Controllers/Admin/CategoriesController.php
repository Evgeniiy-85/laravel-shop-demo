<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriesRequest;
use App\Models\Category;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller {

    /*
     * list categories
     */
    public function index() {
        return view('admin.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    /*
     * View add category
     */
    public function add() {
        return view('admin.categories.add', [
            'statuses' => Category::getStatuses(),
            'categories' => Category::all(),
        ]);
    }

    /*
     * View edit category
     */
    public function edit($id) {
        $category = Category::find($id);
        if (is_null($category)) {
            return view('admin.errors.404');
        }

        return view('admin.categories.edit', [
            'statuses' => Category::getStatuses(),
            'category' => $category,
            'categories' => Category::all(),
        ]);
    }

    /*
     * Create category
     */
    public function store(CategoriesRequest $request) {
        $category = new Category();
        $category->fill($request->all());

        if ($request->hasFile('cat_image')) {
            $image = $request->file('cat_image');
            $category->cat_image = $image->store('', 'categories');
        }

        if (!$category->cat_alias) {
            $category->cat_alias = Str::slug($category->cat_title);
        }

        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Успешно');
    }

    /*
     * Update category
     */
    /**
     * @throws FileNotFoundException
     */
    public function update($id, CategoriesRequest $request) {
        $category = Category::findOrFail($id);
        $category->fill($request->all());

        if ($request->hasFile('cat_image')) {
            if ($category->cat_image) {
               Storage::disk('categories')->delete($category->cat_image);
            }

            $image = $request->file('cat_image');
            $category->cat_image = $image->store('', 'categories');
        }

        if (!$category->cat_alias) {
            $category->cat_alias = Str::slug($category->cat_title);
        }

        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Успешно');
    }

    /*
     * Delete category
     */
    public function delete($id) {
        $category = Category::find($id);
        if (is_null($category)) {
            return view('admin.errors.404');
        }

        if ($category->cat_image) {
            Storage::disk('categories')->delete($category->cat_image);
        }
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Успешно');
    }
}
