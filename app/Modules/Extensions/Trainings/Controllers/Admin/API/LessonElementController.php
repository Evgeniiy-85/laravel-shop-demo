<?php

namespace App\Modules\Extensions\Trainings\Controllers\Admin\API;
use App\Modules\Extensions\Trainings\Models\Lesson;
use App\Modules\Extensions\Trainings\Models\LessonElement;
use App\Modules\Extensions\Trainings\Models\Section;
use App\Modules\Extensions\Trainings\Models\Sort;
use App\Modules\Extensions\Trainings\Models\Training;
use App\Modules\Extensions\Trainings\Requests\Admin\LessonRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonElementController extends \App\Http\Controllers\Admin\AdminController {

    public function edit($id) {
        $element = LessonElement::findOrFail($id);
        $lesson = Lesson::findOrFail($element->lesson_id);

        return view("trainings::admin.lessons.partials.elements.{$element->element_name}.form", [
            'element' => $element,
            'lesson' => $lesson,
        ]);
    }

    public function updateSort(Request $request) {
        $this->validate($request, [
            'element_id' => 'required|array'
        ]);

        $status = true;
        foreach ($request->get('element_id') as $sort => $id) {
            $element = LessonElement::findOrFail((int)$id);
            $element->sort = $sort + 1;
            $status = $element->save() && $status;
        }

        exit(json_encode([
            'status' => $status,
        ]));
    }
}
