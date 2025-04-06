@if($categories->count())
    <div class="filter">
        <livewire:filter :list="$categories" :filter_name="'category'" :model_field="'category_id'" model="\App\Modules\Extensions\Trainings\Models\Training"/>
    </div>
@endif

