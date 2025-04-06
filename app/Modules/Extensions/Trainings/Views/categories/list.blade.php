<div class="categories-list">
    @foreach ($categories as $category)
        <a class="t-card" href="{{ route('trainings.category', $category->alias) }}">
            <div class="t-card__cover">
                <img src="{{ $category->image_url }}">
            </div>

            <div class="t-card__body">
                <div class="t-card__title">{{ $category->title }}</div>
                <div class="t-card__desc">{{ $category->short_desc }}</div>
            </div>

            <div class="t-card__footer">

            </div>
        </a>
    @endforeach
</div>
