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
            'multiple' => 'nullable|string',
        ]);

        if ($request->hasFile('attachments')) {
            $images = $request->file('attachments');
            $added_images = [];
            foreach ($images as $image) {
                $added_images[] = $image->store('', $request->input('storage'));
            }

            $data = [
                'field' => $request->input('field_name'),
                'images' => $added_images,
                'storage' => $request->input('storage'),
            ];

            if ($request->input('multiple')) {
                return view('admin.attachments.images', $data);
            } else {
                return view('admin.attachments.image', $data);
            }
        }
    }
}
