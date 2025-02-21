<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UsersRequest;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller {

    public function index() {
        $users = User::all();

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function add() {
        return view('admin.users.add', [
            'statuses' => User::getStatuses(),
        ]);
    }


    public function edit($id) {
        $product = User::find($id);

        return view('admin.users.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'statuses' => User::getStatuses(),
        ]);
    }

    /**
     * @param UsersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UsersRequest $request) {
        $product = new User();
        $product->fill($request->all());

        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $product->user_image = $image->store('', 'users');
        }

        if (!$product->user_alias) {
            $product->user_alias = Str::slug($product->user_title);
        }

        $product->save();

        return redirect()->route('admin.users')->with('success', 'Успешно');
    }

    /**
     * @param $id
     * @param UsersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UsersRequest $request) {
        $product = User::find($id);
        $product->fill($request->all());

        if ($request->hasFile('user_image')) {
            if ($product->user_image) {
                Storage::disk('images')->delete($product->user_image);
            }

            $image = $request->file('user_image');
            $product->user_image = $image->store('', 'users');
        }

        if (!$product->user_alias) {
            $product->user_alias = Str::slug($product->user_title);
        }

        $product->save();

        return redirect()->route('admin.users')->with('success', 'Успешно');
    }


    /*
    * Delete category
    */
    public function delete($id) {
        $product = User::find($id);
        if (is_null($product)) {
            return view('admin.errors.404');
        }

        if ($product->user_image) {
            Storage::disk('users')->delete($product->user_image);
        }
        $product->delete();

        return redirect()->route('admin.categories')->with('success', 'Успешно');
    }
}
