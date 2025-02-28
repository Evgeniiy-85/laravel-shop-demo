@extends('admin/layouts.main')

@section('title')
    Добавить категорию
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.categories.add') }}
@endsection

@section('h1')
    Добавить категорию
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Новая категория</h3>
                </div>

                <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3"><label class="form-label">Название</label>
                            <input type="text" class="form-control" name="cat_title" placeholder="Введите название категории" required>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Алиас</label>
                            <input type="text" class="form-control" name="cat_alias" placeholder="Алиас категории подставится автоматически">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Родительская категория</label>
                            <select class="form-control" name="cat_parent">
                                <option value="0">-</option>
                                @if($categories)
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->cat_id }}">{{ $cat->cat_title }}</option>
                                  @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="input_file">Изображение</label>
                            <div class="input-group">
                                <label class="btn bg-purple input-file form-label btn-info" for="cat_image">
                                    <text><span class="fa fa-cloud-upload"></span>&nbsp; Загрузить изображение</text>
                                    <input type="file" class="custom-file-input hidden" name="cat_image" id="cat_image">
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Статус</label>
                            <select class="form-control" name="cat_status">
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
