@extends('admin/layouts.main')

@section('title')
    {{ __('Добавить продукт') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.products.add') }}
@endsection

@section('h1')
    {{ __('Добавить продукт') }}
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Новый продукт') }}</h3>
                </div>

                <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3"><label class="form-label">{{ __('Название') }}</label>
                            <input type="text" class="form-control" name="title">
                        </div>

                        <div class="form-group mb-3"><label class="form-label" title="Алиас подставится автоматически">{{ __('Алиас') }}</label>
                            <input type="text" class="form-control" name="alias">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Категория') }}</label>
                            <select class="form-control" name="category">
                                <option value="0">-</option>
                                @if($categories)
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                  @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Стоимость') }}</label>
                            <input type="number" min="0" max="999999999" class="form-control" name="price"  value="0">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Количество') }}</label>
                            <input type="number" min="0" max="999999999" class="form-control" name="quantity"value="0">
                        </div>

                        <div class="form-group mb-3">
                            <label for="input_file" class="mb-2">{{ __('Изображение') }}</label>
                            <div class="input-group">
                                <label class="btn bg-purple input-file form-label btn-info" for="image">
                                    <text><span class="fa fa-cloud-upload"></span>&nbsp; {{ __('Загрузить изображение') }}</text>
                                    <input type="file" class="custom-file-input hidden" name="files[image][]" id="image" data-ajax_upload="" multiple>
                                </label>

                                <x-admin-attachments :data="[
                                    'field' => 'images',
                                    'storage' => 'products',
                                    'images' => null
                                ]" />
                            </div>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Статус') }}</label>
                            <select class="form-control" name="status">
                                @foreach(\App\Enums\ActivityStatus::cases() as $type)
                                    <option value="{{ $type->value }}">{{ $type->label() }}</option>
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
