@extends('layouts.main')

@section('title')
    Каталог
@endsection

@section('content')
    <h1>Каталог</h1>

    <div class="site-catalog">
        <div class="categories-list">
            @foreach ($categories as $category)
                <a class="category" href="/catalog/{{ $category->alias }}">
                    <div class="category-cover">
                        <img src="{{ $category->image_url }}">
                    </div>

                    <div class="category-title">{{ $category->title }}</div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
