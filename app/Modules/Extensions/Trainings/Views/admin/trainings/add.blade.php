@extends('trainings::admin.layouts.main')

@section('title')
    {{ __('Добавить тренинг') }}
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.trainings.add') }}
@endsection
@section('h1')
    {{ __('Добавить тренинг') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-5">
            <form id="form-settings" action="{{ route('admin.trainings.store') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Новый тренинг') }}</h3>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="main-tab" data-toggle="pill" href="#main" role="tab"
                                   aria-controls="main" aria-selected="true">{{ __('Основное') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="access-tab" data-toggle="pill" href="#access" role="tab"
                                   aria-controls="access" aria-selected="false">{{ __('Доступ') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="seo-tab" data-toggle="pill" href="#seo" role="tab"
                                   aria-controls="seo" aria-selected="false">{{ __('SEO') }}</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="main" role="tabpanel" aria-labelledby="main-tab">
                                <div class="row mt-3">
                                    <div class="col-xl-12">
                                        <div class="form-group mb-3"><label
                                                class="form-label">{{ __('Название') }}</label>
                                            <input type="text" class="form-control" name="title" value="">
                                        </div>

                                        <div class="form-group mb-3"><label
                                                class="form-label">{{ __('Категория') }}</label>
                                            <select class="form-control" name="category_id">
                                                <option value="0">-</option>
                                                @if($categories)
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group"><label
                                                class="control-label">{{ __('Платный тренинг') }}</label>
                                            <div role="radiogroup" aria-required="true">
                                                <label><input type="radio" name="is_paid" value="1">{{ __('Да') }}
                                                </label>
                                                <label><input type="radio" name="is_paid" value="0"
                                                              checked>{{ __('Нет') }}</label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="input_file" class="mb-2">{{ __('Изображение') }}</label>
                                            <div class="input-group">
                                                <label class="btn bg-purple input-file form-label btn-info">
                                                    <text><span
                                                            class="fa fa-cloud-upload"></span>&nbsp; {{ __('Загрузить изображения') }}
                                                    </text>
                                                    <input type="file" class="custom-file-input hidden"
                                                           name="files[image]" data-ajax_upload="" multiple>
                                                </label>

                                                <x-admin-attachments :data="[
                                                    'field' => 'image',
                                                    'storage' => 'trainings',
                                                    'image' => null
                                                ]"/>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3"><label
                                                class="form-label">{{ __('Краткое описание') }}</label>
                                            <textarea type="text" class="form-control" name="short_desc"></textarea>
                                        </div>

                                        <div class="form-group mb-3"><label
                                                class="form-label">{{ __('Описание') }}</label>
                                            <textarea class="form-control" name="desc" cols="20" rows="8"></textarea>
                                        </div>

                                        <div class="form-group mb-3"><label
                                                class="form-label">{{ __('Статус') }}</label>
                                            <select class="form-control" name="status">
                                                <option value="1">{{ __('Активен') }}</option>
                                                <option value="0">{{ __('Отключен') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="access" role="tabpanel" aria-labelledby="access-tab">
                                <div class="row mt-3">
                                    <div class="col-xl-12">
                                        <div class="form-group mb-3"><label
                                                class="form-label">{{ __('Тип доступа') }}</label>
                                            <select class="form-control" name="access_type">
                                                @foreach(\App\Modules\Extensions\Trainings\Enums\AccessType::cases() as $type)
                                                    <option value="{{ $type->value }}"
                                                            @if($type === \App\Modules\Extensions\Trainings\Enums\AccessType::GROUP) data-show_on="#user-groups" @endif >{{ $type->label() }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3" id="user-groups"><label
                                                class="form-label">{{ __('Группа') }}</label>
                                            <select class="form-control" name="params[access_groups][]"
                                                    multiple="multiple">
                                                @if($groups = \App\Models\User\UserGroup::all())
                                                    @foreach($groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->title }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                <div class="row mt-3">
                                    <div class="col-xl-12">
                                        <div class="form-group mb-3"><label class="form-label">{{ __('Title') }}</label>
                                            <input type="text" class="form-control" name="seo_title" value="">
                                        </div>

                                        <div class="form-group mb-3"><label class="form-label">{{ __('Алиас') }}</label>
                                            <input type="text" class="form-control" name="alias" value="">
                                        </div>

                                        <div class="form-group mb-3"><label
                                                class="form-label">{{ __('Meta Description') }}</label>
                                            <textarea type="text" class="form-control" name="meta_desc"></textarea>
                                        </div>

                                        <div class="form-group mb-3"><label
                                                class="form-label">{{ __('Meta Keyword') }}</label>
                                            <textarea type="text" class="form-control" name="meta_keys"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-end">{{ __('Сохранить') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
