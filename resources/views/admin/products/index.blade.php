@extends('admin/layouts.main')

@section('title') {{ __('Продукты') }} @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.products') }} @endsection
@section('h1') {{ __('Продукты') }} @endsection

@section('content')
    <div class="row mb-3">
        <div class="col-3">
            <a href="{{ route('admin.products.add') }}" class="btn btn-outline-primary btn-lg">
                <span>
                    <span class="fa fa-plus"></span> {{ __('Добавить продукт') }}
                </span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Список продуктов') }}</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Изображение') }}</th>
                                <th>{{ __('Название') }}</th>
                                <th>{{ __('Категория') }}</th>
                                <th>{{ __('Статус') }}</th>
                                <th class="text-right" width="140">{{ __('Действие') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($products->count())
                                @foreach($products as $product)
                                    @php
                                        $category = $product->category_id ? App\Models\Category::find($product->category_id) : false;
                                    @endphp
                                    <tr class="align-middle">
                                        <td width="160">
                                            <div class="card_cover">
                                                <img src="{{ $product->image_url }}"/>
                                            </div>
                                        </td>

                                        <td width="300">
                                            <a href="{{ route('admin.products.edit', $product->id) }}">{{ $product->title }}</a>
                                        </td>

                                        <td>
                                            @if($category)
                                                <a href="{{ '/admin/products/'.$product->category_id }}">{{ $category->title }}</a>
                                            @else
                                                <span>--</span>
                                            @endif
                                        </td>

                                        <td>
                                            <small class="badge {{ $product->status == App\Enums\ActivityStatus::STATUS_ACTIVE ? 'text-bg-success' : 'text-bg-danger' }}">
                                                {{ $product->status->label() }}
                                            </small>
                                        </td>

                                        <td class="text-right">
                                            <div class="card-tools" style="width:140px;">
                                                <a class="btn btn-tool text-bg-primary" href="{{ route('products.product', $product->alias) }}" target="_blank"><i class="fa fa-external-link-alt"></i></a>
                                                <a class="btn btn-tool text-bg-success" href="{{ route('admin.products.edit', $product->id) }}"><i class="fa fa-pencil-alt"></i></a>
                                                <a class="btn btn-tool text-bg-danger" href="{{ route('admin.products.delete', $product->id) }}" onclick="return confirm('{{ __('Вы уверены?') }}')"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $products->links('admin.layouts.paginator') }}
                </div>
            </div>
        </div>
    </div>
@endsection
