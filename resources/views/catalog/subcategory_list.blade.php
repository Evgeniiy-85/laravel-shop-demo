@extends('layouts.main')

@section('title')
    Каталог
@endsection

@section('content')
    <h1>Каталог</h1>

    <div class="site-catalog">
        <div class="categories-list">
            @foreach ($categories as $category)
                <a class="category" href="/catalog/{{ $category->cat_alias }}">
                    <div class="category-cover">
                        <img src="/load/categories/{{ $category->cat_image }}">
                    </div>

                    <div class="category-title">{{ $category->cat_title }}</div>
                </a>
            @endforeach
        </div>
    </div>
@endsection



