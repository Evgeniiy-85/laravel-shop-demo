<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttachmentsRequest;

class AttachmentsController extends Controller {

    public function add(AttachmentsRequest $request) {
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
