@extends('admin/layouts.main')

@section('title')
    {{ __('Редактировать продукт') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.products.edit') }}
@endsection

@section('h1')
    {{ __('Редактировать продукт') }}
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ $product->title }}
                        <a href="{{ route('products.product', $product->alias) }}" target="_blank">
                            <i class="fa fa-external-link-alt"></i>
                        </a>
                    </h3>
                </div>

                <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3"><label class="form-label">{{ __('Название') }}</label>
                            <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Алиас') }}</label>
                            <input type="text" class="form-control" name="alias" value="{{ $product->alias }}">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Категория') }}</label>
                            <select class="form-control" name="category_id">
                                <option value="0">-</option>
                                @if($categories)
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}" @if($product->category_id == $cat->id) selected @endif">{{ $cat->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Стоимость') }}</label>
                            <input type="number" min="0" max="999999999" class="form-control" name="price"  value="{{ $product->price }}">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Количество') }}</label>
                            <input type="number" min="0" max="999999999" class="form-control" name="quantity" value="{{ $product->quantity }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="input_file" class="mb-2">{{ __('Изображение') }}</label>
                            <div class="input-group">
                                <label class="btn bg-purple input-file form-label btn-info">
                                    <text><span class="fa fa-cloud-upload"></span>&nbsp; {{ __('Загрузить изображения') }}</text>
                                    <input type="file" class="custom-file-input hidden" name="files[image][]" data-ajax_upload="" multiple>
                                </label>

                                <x-admin-attachments :data="[
                                    'field' => 'images',
                                    'storage' => 'products',
                                    'images' => $product->images
                                ]" />
                            </div>
                        </div>

                        <div class="form-group mb-3" ><label class="form-label">{{ __('Краткое описание') }}</label>
                            <textarea class="form-control" name="short_desc" cols="20" rows="3">{{ $product->short_desc }}</textarea>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Описание') }}</label>
                            <textarea class="form-control" name="desc" cols="20" rows="8">{{ $product->desc }}</textarea>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Статус') }}</label>
                            <select class="form-control" name="status">
                                @foreach(\App\Enums\ActivityStatus::cases() as $type)
                                    <option value="{{ $type->value }}" @if($product->status == $type) selected @endif>{{ $type->label() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-end">{{ __('Сохранить') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
