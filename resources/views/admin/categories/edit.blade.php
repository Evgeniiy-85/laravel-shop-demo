@extends('admin/layouts.main')

@section('title')
    Редактировать категорию
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.categories.edit') }}
@endsection

@section('h1')
    Редактировать категорию
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-header flex">
                    <h3 class="card-title">{{ $category->cat_title }}
                        <a href="{{ route('catalog.category', $category->cat_alias) }}" target="_blank">
                            <i class="fa fa-external-link-alt"></i>
                        </a>
                    </h3>
                </div>

                <form action="{{ route('admin.categories.update', $category->cat_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3"><label class="form-label">Название</label>
                            <input type="text" class="form-control" name="cat_title" placeholder="Введите название категории" value="{{ $category->cat_title }}" required>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Алиас</label>
                            <input type="text" class="form-control" name="cat_alias" placeholder="Алиас категории подставится автоматически" value="{{ $category->cat_alias }}">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Родительская категория</label>
                            <select class="form-control" name="cat_parent">
                                <option value="0">-</option>
                                @if($categories)
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->cat_id }}" @if($category->cat_parent == $cat->cat_id) selected @endif>{{ $cat->cat_title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="input_file" class="mb-2">Изображение</label>
                            <div class="input-group">
                                <label class="btn bg-purple input-file form-label btn-info" for="cat_image">
                                    <text><span class="fa fa-cloud-upload"></span>&nbsp; Загрузить изображение</text>
                                    <input type="file" class="custom-file-input hidden" name="files[cat_image]" id="cat_image" data-ajax_upload="">
                                </label>
                                {{ Widget::AdminAttachments(['field' => 'cat_image', 'storage' => 'categories', 'image' => $category->cat_image]) }}
                            </div>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Статус</label>
                            <select class="form-control" name="cat_status">
                                @foreach ($statuses as $status => $title)
                                    <option value="{{ $status }}" @if($category->cat_category == $cat->cat_id) selected @endif">{{ $title }}</option>
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
