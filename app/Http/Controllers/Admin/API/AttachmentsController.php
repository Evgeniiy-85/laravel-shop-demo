<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Arrilot\Widgets;

class AttachmentsController extends Controller {

    public function add(Request $request) {
        $request->validate([
            'storage' => 'required|string',
            'field_name' => 'required|string',
        ]);

        if ($request->hasFile('attachments')) {
            $images = $request->file('attachments');
            $added_images = [];
            foreach ($images as $image) {
                $added_images[] = $image->store('', $request->input('storage'));
            }

            return view('admin.attachments.images', [
                'field_name' => $request->input('field_name'),
                'images' => $added_images,
                'storage' => $request->input('storage')
            ]);
        }
    }
}
