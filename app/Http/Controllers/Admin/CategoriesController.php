<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriesRequest;
use App\Models\Category;
use Illuminate\Support\Str;
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

    /**
     * @param CategoriesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(CategoriesRequest $request) {
        $category = new Category();
        $category->cat_title = $request->input('cat_title');
        $category->cat_parent = $request->input('cat_parent');
        $category->cat_alias = $request->input('cat_alias');
        if (!$category->cat_alias) {
            $category->cat_alias = Str::ascii(str_replace(' ', '-', $category->cat_title));
        }
        $category->cat_image = '';
        $category->cat_status = $request->input('cat_status');
        $res = $category->save();

        return redirect()->route('admin.categories')->with('success', 'Успешно');
    }


    public function add() {
        $categories = Category::all();

        return view('admin.categories.add', [
            'statuses' => Category::getStatuses(),
            'categories' => $categories,
        ]);
    }
}
