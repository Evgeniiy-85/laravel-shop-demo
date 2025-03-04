@extends('admin/layouts.main')

@section('title')
    Добавить продукт
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.products.add') }}
@endsection

@section('h1')
    Добавить продукт
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Новый продукт</h3>
                </div>

                <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3"><label class="form-label">Название</label>
                            <input type="text" class="form-control" name="prod_title" placeholder="Введите название продукта">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Алиас</label>
                            <input type="text" class="form-control" name="prod_alias" placeholder="Алиас продукта подставится автоматически">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Категория</label>
                            <select class="form-control" name="prod_category">
                                <option value="0">-</option>
                                @if($categories)
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->cat_id }}">{{ $cat->cat_title }}</option>
                                  @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Цена</label>
                            <input type="number" min="0" max="999999999" class="form-control" name="prod_price" placeholder="Введите цену продукта" value="0">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Количество</label>
                            <input type="number" min="0" max="999999999" class="form-control" name="prod_quantity" placeholder="Введите количество продуктов" value="0">
                        </div>

                        <div class="form-group mb-3">
                            <label for="input_file" class="mb-2">Изображение</label>
                            <div class="input-group">
                                <label class="btn bg-purple input-file form-label btn-info" for="prod_image">
                                    <text><span class="fa fa-cloud-upload"></span>&nbsp; Загрузить изображение</text>
                                    <input type="file" class="custom-file-input hidden" name="files[prod_image][]" id="prod_image" data-ajax_upload="" multiple>
                                </label>
                                {{ Widget::AdminAttachments(['field' => 'prod_images', 'storage' => 'products', 'images' => null]) }}
                            </div>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Статус</label>
                            <select class="form-control" name="prod_status">
                                @foreach ($statuses as $status => $title)
                                    <option value="{{ $status }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-end">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
