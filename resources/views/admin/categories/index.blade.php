@extends('admin/layouts.main')

@section('title') {{ __('Категории') }} @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.categories') }} @endsection
@section('h1') {{ __('Категории') }} @endsection

@section('content')
    <div class="row mb-3">
        <div class="col-3">
            <a href="{{ route('admin.categories.add') }}" class="btn btn-outline-primary btn-lg">
                <span>
                    <span class="fa fa-plus"></span> {{ __('Добавить категорию') }}
                </span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Список категорий') }}</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Изображение') }}</th>
                                <th>{{ __('Название') }}</th>
                                <th>{{ __('Родительская категория') }}</th>
                                <th>{{ __('Статус') }}</th>
                                <th class="text-right" width="140">{{ __('Действие') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($categories->count())
                                @foreach($categories as $category)
                                    @php
                                        $parent_category = $category->parent ? App\Models\Category::find($category->parent) : false;
                                    @endphp
                                    <tr class="align-middle">
                                        <td width="160">
                                            <div class="card_cover">
                                                <img src="{{ $category->image_url }}"/>
                                            </div>
                                        </td>

                                        <td width="300">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->title }}</a>
                                        </td>

                                        <td>
                                            @if($parent_category)
                                                <a href="{{ '/admin/categories/'.$category->parent }}">{{ $parent_category->title }}</a>
                                            @else
                                                <span>--</span>
                                            @endif
                                        </td>

                                        <td>
                                            <small class="badge {{ $category->status == App\Enums\ActivityStatus::STATUS_ACTIVE ? 'text-bg-success' : 'text-bg-danger' }}">
                                                {{ $category->status->label() }}
                                            </small>
                                        </td>

                                        <td class="text-right">
                                            <div class="card-tools" style="width:140px;">
                                                <a class="btn btn-tool text-bg-primary" href="{{ route('catalog.category', $category->alias) }}" target="_blank"><i class="fa fa-external-link-alt"></i></a>
                                                <a class="btn btn-tool text-bg-success" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-pencil-alt"></i></a>
                                                <a class="btn btn-tool text-bg-danger" href="{{ route('admin.categories.delete', $category->id) }}" onclick="return confirm('{{ __('Вы уверены?') }}')"><i class="fa fa-trash"></i></a>
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
