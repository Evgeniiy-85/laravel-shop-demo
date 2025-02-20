<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriesRequest;
use App\Models\Category;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
class CategoriesController extends Controller {

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index() {
        $categories = Category::all();

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function add() {
        $categories = Category::all();

        return view('admin.categories.add', [
            'statuses' => Category::getStatuses(),
            'categories' => $categories,
        ]);
    }

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

    /**
     * @param CategoriesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoriesRequest $request) {
        $category = new Category();
        $request['cat_image'] = '';
        if (!$request['cat_alias']) {
            $request['cat_alias'] = Str::slug($request['cat_title']);
        }
        $category->fill($request->all())->save();

        return redirect()->route('admin.categories')->with('success', 'Успешно');
    }

    /**
     * @param $id
     * @param CategoriesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, CategoriesRequest $request) {
        $category = Category::findOrFail($id);
        $request['cat_image'] = '';
        if (!$request['cat_alias']) {
            $request['cat_alias'] = Str::slug($request['cat_title']);
        }
        $category->fill($request->all())->save();
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Успешно');
    }

    /**
     * @param $id
     * @param CategoriesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id) {
        $category = Category::find($id);
        if (is_null($category)) {
            return view('admin.errors.404');
        }
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Успешно');
    }
}
