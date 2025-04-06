<?php

namespace App\Modules\Extensions\Trainings\Controllers\Admin;
use App\Modules\Extensions\Trainings\Models\Category;
use App\Modules\Extensions\Trainings\Models\Lesson;
use App\Modules\Extensions\Trainings\Models\Section;
use App\Modules\Extensions\Trainings\Models\Training;
use App\Modules\Extensions\Trainings\Requests\Admin\TrainingRequest;
use Illuminate\Support\Str;

class TrainingController extends \App\Http\Controllers\Admin\AdminController {

    public function index() {
        return view('trainings::admin.trainings.index', [
            'trainings' => Training::paginate($this->settings->count_items),
        ]);
    }

    public function add() {
        return view('trainings::admin.trainings.add', [
            'categories' => Category::all()
        ]);
    }

    public function store(TrainingRequest $request) {
        $training = new Training();
        $training->fill($request->all());
        $training->sort = Training::max('sort') + 1;
        $training->save();

        return redirect()->route('admin.trainings')->with('success', 'Успешно');
    }

    public function edit($id) {
        $training = Training::find($id);
        if (!$training) {
            return view('admin.errors.404');
        }

        return view('trainings::admin.trainings.edit', [
            'training' => $training,
            'categories' => Category::all()
        ]);
    }


    public function update(TrainingRequest $request, $id) {
        $training = Training::find($id);
        if (!$training) {
            abort(404);
        }

        $training->fill($request->all());
        $training->save();

        return redirect()->route('admin.trainings')->with('success', 'Успешно');
    }

    public function destroy($id) {
        $training = Training::findOrFail($id);
        $lessons = Lesson::where('training_id', $training->id);
        if ($lessons->count() > 0) {
            $lessons->delete();
        }

        $sections = Section::where('training_id', $training->id);
        if ($sections->count() > 0) {
            $sections->delete();
        }

        $training->delete();

        return redirect()->route('admin.trainings')->with('success', 'Успешно');
    }
}
