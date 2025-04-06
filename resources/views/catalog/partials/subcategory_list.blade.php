<div class="categories-list">
    @foreach ($subcategories as $subcategory)
        <a class="category" href="/catalog/{{ $category->alias }}/{{ $subcategory->alias }}">
            <div class="category-cover">
                <img src="{{ $subcategory->image_url }}">
            </div>

            <div class="category-title">{{ $subcategory->title }}</div>
        </a>
    @endforeach
</div>
