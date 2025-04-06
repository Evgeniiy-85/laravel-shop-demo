<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoriesRequest;
use App\Http\Requests\Admin\ExtensionsRequest;
use App\Models\Category;
use App\Models\Extension;
use App\Models\Payment;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Str;

class ExtensionsController extends AdminController {

    public function index() {
        $extensions = Extension::all();

        return view('admin.settings.extensions.index', [
            'extensions' => $extensions,
        ]);
    }

    /**
     * Update extension
     * @param $ext_name
     * @param ExtensionsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($ext_name, ExtensionsRequest $request) {
        $extension = Extension::where('ext_name', $ext_name)->first();
        if (!$extension) {
            abort(404);
        }

        $extension->fill($request->all());
        $extension->save();

        return redirect()->route('admin.settings.extensions')->with('success', 'Успешно');
    }
}
