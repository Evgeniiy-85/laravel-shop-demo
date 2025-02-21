<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriesRequest;
use App\Models\Category;
use App\Helpers\Helper;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use File;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller {

    /*
     * list categories
     */
    public function index() {
        $categories = Category::all();

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    /*
     * View add category
     */
    public function add() {
        $categories = Category::all();

        return view('admin.categories.add', [
            'statuses' => Category::getStatuses(),
            'categories' => $categories,
        ]);
    }

    /*
     * View edit category
     */
    public function edit($id) {
        $category = Category::find($id);
        $categories = Category::all();
        if (is_null($category)) {
            return view('admin.errors.404');
        }

        return view('admin.categories.edit', [
            'statuses' => Category::getStatuses(),
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    /*
     * Create category
     */
    public function store(CategoriesRequest $request) {
        $category = new Category();
        $data = $request->all();

        if ($request->hasFile('cat_image')) {
            $image = $request->file('cat_image');
            $category->cat_image = $image->store('', 'categories');
        }

        if (!$data['cat_alias']) {
            $data['cat_alias'] = Str::slug($data['cat_title']);
        }
        $category->fill($data)->save();

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
        $data = $request->all();

        if ($request->hasFile('cat_image')) {
            if ($category->cat_image) {
               Storage::disk('categories')->delete($category->cat_image);
            }

            $image = $request->file('cat_image');
            $category->cat_image = $image->store('', 'categories');
        }

        if (!$data['cat_alias']) {
            $data['cat_alias'] = Str::slug($data['cat_title']);
        }
        $category->fill($data)->save();

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
            Storage::disk()->delete("images/categories/{$category->cat_image}");
        }
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Успешно');
    }
}
