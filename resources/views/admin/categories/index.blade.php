@extends('admin/layouts.main')

@section('title') Список категорий @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.categories') }} @endsection
@section('h1') Список категорий @endsection

@section('content')
    <div class="row mb-3">
        <div class="col-3">
            <a href="{{ route('admin.categories.add') }}" class="btn btn-block btn-outline-info btn-lg">
                <span>
                    <span class="fa fa-plus"></span> Добавить категорию
                </span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
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
                                    <tr>
                                        <td width="160">
                                            <div class="card_cover">
                                                <img src="{{ asset($category->cat_image ? "/load/categories/{$category['cat_image']}" : '/images/no-img.png') }}"/>
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
                                            <small class="badge {{ $category->cat_status == App\Models\Category::STATUS_ACTIVE ? 'badge-success' : 'badge-danger' }}">
                                                {{ App\Models\Category::getStatuses($category->cat_status) }}
                                            </small>
                                        </td>

                                        <td class="text-right">
                                            <div class="card-tools" style="width:140px;">
                                                <a class="btn btn-tool btn-default bg-gradient-primary" href="{{ route('categories', $category->cat_alias) }}" target="_blank"><i class="fa fa-external-link-alt"></i></a>
                                                <a class="btn btn-tool btn-default bg-gradient-success" href="{{ route('admin.categories.edit', $category->cat_id) }}"><i class="fa fa-pencil-alt"></i></a>
                                                <a class="btn btn-tool btn-default bg-gradient-danger" href="{{ route('admin.categories.delete', $category->cat_id) }}" onclick="return confirm('Вы уверены?')"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    @if(!$categories->count())
                        Ничего не найден
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
