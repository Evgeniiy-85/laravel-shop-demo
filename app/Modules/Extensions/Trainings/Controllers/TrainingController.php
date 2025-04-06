<?php

namespace App\Modules\Extensions\Trainings\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Extensions\Trainings\Models\Access;
use App\Modules\Extensions\Trainings\Models\Category;
use App\Modules\Extensions\Trainings\Models\Lesson;
use App\Modules\Extensions\Trainings\Models\Section;
use App\Modules\Extensions\Trainings\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller {

    public function training($alias) {
        $training = Training::where('status', 1)->where('alias', $alias)->firstOrFail();
        $category = $training->category_id ? Category::find($training->category_id) : null;

        $access = new Access($category, $training);
        if (!$access->check()) {
            return view('trainings::layouts.no-access', ['access' => $access]);
        }

        $sections = Section::join('trainings_sort', 'trainings_sort.sort_id', '=', 'trainings_sections.sort_id')
            ->where('trainings_sections.training_id', $training->id)
            ->where('trainings_sections.status', 1)
            ->orderBy('trainings_sort.sort')
            ->get();

        $lessons = Lesson::join('trainings_sort', 'trainings_sort.sort_id', '=', 'trainings_lessons.sort_id')
            ->where('trainings_lessons.training_id', $training->id)
            ->where('trainings_lessons.section_id', 0)
            ->where('trainings_lessons.status', 1)
            ->orderBy('trainings_sort.sort')
            ->get();

        return view('trainings::trainings.training', [
            'training' => $training,
            'category' => $category,
            'sections' => $sections,
            'lessons' => $lessons,
        ]);
    }
}
