<div class="categories-list">
    @foreach ($subcategories as $subcategory)
        <a class="category" href="/catalog/{{ $category->cat_alias }}/{{ $subcategory->cat_alias }}">
            <div class="category-cover">
                <img src="/load/categories/{{ $subcategory->cat_image }}">
            </div>

            <div class="category-title">{{ $subcategory->cat_title }}</div>
        </a>
    @endforeach
</div>
