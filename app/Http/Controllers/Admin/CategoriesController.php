<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoriesRequest;
use App\Models\Category;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends AdminController {

    /*
     * list categories
     */
    public function index() {
        return view('admin.categories.index', [
            'categories' => Category::paginate($this->settings->count_items),
        ]);
    }

    /*
     * View add category
     */
    public function add() {
        return view('admin.categories.add', [
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
            'category' => $category,
            'categories' => Category::where('id', '<>', $id)->get(),
        ]);
    }

    /*
     * Create category
     */
    public function store(CategoriesRequest $request) {
        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Успешно');
    }

    /**
     * Update category
     * @param $id
     * @param CategoriesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, CategoriesRequest $request) {
        $category = Category::findOrFail($id);
        $category->fill($request->all());
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

        if ($category->image) {
            Storage::disk('categories')->delete($category->image);
        }
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Успешно');
    }
}
