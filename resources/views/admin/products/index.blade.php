@extends('admin/layouts.main')

@section('title') Список продуктов @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.products') }} @endsection
@section('h1') Список продуктов @endsection

@section('content')
    <div class="row mb-3">
        <div class="col-3">
            <a href="{{ route('admin.products.add') }}" class="btn btn-block btn-outline-info btn-lg">
                <span>
                    <span class="fa fa-plus"></span> Добавить продукт
                </span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Изображение</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>Статус</th>
                                <th class="text-right" width="140">Действие</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($products->count())
                                @foreach($products as $product)
                                    @php
                                        $category = $product->prod_category ? App\Models\Category::find($product->prod_category) : false;
                                    @endphp
                                    <tr>
                                        <td width="160">
                                            <div class="card_cover">
                                                <img src="{{ $product->prod_image_url }}"/>
                                            </div>
                                        </td>

                                        <td width="300">
                                            <a href="/admin/products/edit/{{ $product->prod_id }}">{{ $product->prod_title }}</a>
                                        </td>

                                        <td>
                                            @if($category)
                                                <a href="{{ '/admin/products/'.$product->category }}">{{ $category->cat_title }}</a>
                                            @else
                                                <span>--</span>
                                            @endif
                                        </td>

                                        <td>
                                            <small class="badge {{ $product->prod_status == App\Models\Product::STATUS_ACTIVE ? 'badge-success' : 'badge-danger' }}">
                                                {{ App\Models\Product::getStatuses($product->prod_status) }}
                                            </small>
                                        </td>

                                        <td class="text-right">
                                            <div class="card-tools" style="width:140px;">
                                                <a class="btn btn-tool btn-default bg-gradient-primary" href="{{ route('products', $product->prod_alias) }}" target="_blank"><i class="fa fa-external-link-alt"></i></a>
                                                <a class="btn btn-tool btn-default bg-gradient-success" href="{{ route('admin.products.edit', $product->prod_id) }}"><i class="fa fa-pencil-alt"></i></a>
                                                <a class="btn btn-tool btn-default bg-gradient-danger" href="{{ route('admin.products.delete', $product->prod_id) }}" onclick="return confirm('Вы уверены?')"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    @if(!$products->count())
                        Ничего не найден
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
