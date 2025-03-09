@extends('admin/layouts.main')

@section('title') Категории @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.categories') }} @endsection
@section('h1') Категории @endsection

@section('content')
    <div class="row mb-3">
        <div class="col-3">
            <a href="{{ route('admin.categories.add') }}" class="btn btn-outline-primary btn-lg">
                <span>
                    <span class="fa fa-plus"></span> Добавить категорию
                </span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title">Список категорий</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Родительская категория</th>
                            <th>Статус</th>
                            <th class="text-right" width="140">Действие</th>
                        </tr>
                        </thead>

                        <tbody>
                            @if($categories->count())
                                @foreach($categories as $category)
                                    @php
                                        $parent_category = $category->cat_parent ? App\Models\Category::find($category->cat_parent) : false;
                                    @endphp
                                    <tr class="align-middle">
                                        <td width="160">
                                            <div class="card_cover">
                                                <img src="{{ $category->cat_image_url }}"/>
                                            </div>
                                        </td>

                                        <td width="300">
                                            <a href="/admin/categories/edit/{{ $category->cat_id }}">{{ $category->cat_title }}</a>
                                        </td>

                                        <td>
                                            @if($parent_category)
                                                <a href="{{ '/admin/categories/'.$category->cat_parent }}">{{ $parent_category->cat_title }}</a>
                                            @else
                                                <span>--</span>
                                            @endif
                                        </td>

                                        <td>
                                            <small class="badge {{ $category->cat_status == App\Models\Category::STATUS_ACTIVE ? 'text-bg-success' : 'text-bg-danger' }}">
                                                {{ App\Models\Category::getStatuses($category->cat_status) }}
                                            </small>
                                        </td>

                                        <td class="text-right">
                                            <div class="card-tools" style="width:140px;">
                                                <a class="btn btn-tool text-bg-primary" href="{{ route('catalog.category', $category->cat_alias) }}" target="_blank"><i class="fa fa-external-link-alt"></i></a>
                                                <a class="btn btn-tool text-bg-success" href="{{ route('admin.categories.edit', $category->cat_id) }}"><i class="fa fa-pencil-alt"></i></a>
                                                <a class="btn btn-tool text-bg-danger" href="{{ route('admin.categories.delete', $category->cat_id) }}" onclick="return confirm('Вы уверены?')"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $categories->links('admin.layouts.paginator') }}
                </div>
            </div>
        </div>
    </div>
@endsection
