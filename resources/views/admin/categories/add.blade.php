@extends('admin/layouts.main')

@section('title')
    {{ __('Добавить категорию') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.categories.add') }}
@endsection

@section('h1')
    {{ __('Добавить категорию') }}
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Новая категория') }}</h3>
                </div>

                <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3"><label class="form-label">{{ __('Название') }}</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>

                        <div class="form-group mb-3"><label class="form-label" title="Алиас подставится автоматически">{{ __('Алиас') }}</label>
                            <input type="text" class="form-control" name="alias">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Родительская категория') }}</label>
                            <select class="form-control" name="parent">
                                <option value="0">-</option>
                                @if($categories)
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                  @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="input_file" class="mb-2">{{ __('Изображение') }}</label>
                            <div class="input-group">
                                <label class="btn bg-purple input-file form-label btn-info" for="image">
                                    <text><span class="fa fa-cloud-upload"></span>&nbsp; {{ __('Загрузить изображение') }}</text>
                                    <input type="file" class="custom-file-input hidden" name="files[image]" id="image" data-ajax_upload="">
                                </label>

                                <x-admin-attachments :data="[
                                    'field' => 'image',
                                    'storage' => 'categories',
                                    'image' => null
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
