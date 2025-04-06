@extends('admin/layouts.main')

@section('title')
    {{__('Редактировать пользователя')}}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.users.edit') }}
@endsection

@section('h1')
    {{__('Редактировать пользователя')}}
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-xl-6 col-lg-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->user_name }}</h3>
                </div>

                <form action="{{ route('admin.users.update', $user->user_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group mb-3"><label class="form-label">{{ __('Имя') }}</label>
                                    <input type="text" class="form-control" name="user_name" value="{{ $user->user_name }}">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('Фамилия') }}</label>
                                    <input type="text" class="form-control" name="user_surname" value="{{ $user->user_surname }}">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('Отчество') }}</label>
                                    <input type="text" class="form-control" name="user_patronymic" value="{{ $user->user_patronimic }}">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('E-mail') }}</label>
                                    <input type="text" class="form-control" name="user_email" value="{{ $user->user_email }}">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('Телефон') }}</label>
                                    <input type="text" class="form-control" name="user_phone" value="{{ $user->user_phone }}">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <div class="user-info">
                                        <div class="form-group user-photo">
                                            <div class="input-group">
                                                <x-admin-attachments :data="[
                                                    'field' => 'user_photo',
                                                    'storage' => 'users',
                                                    'image' => $user->user_photo,
                                                    'image_url' => $user->user_photo_url,
                                                ]" />

                                                <label class="btn bg-purple input-file form-label btn-info" for="logo_image">
                                                    <text><span class="fa fa-cloud-upload"></span>&nbsp; {{ __('Загрузить фото') }}</text>
                                                    <input type="file" class="custom-file-input hidden" name="files[logo]" id="logo_image">
                                                    <input type="hidden" class="current-image" name="user_photo" value="{{ $user->user_photo ?? '' }}">
                                                </label>
                                            </div>
                                        </div>

                                        <div><b>{{ __('Дата регистрации') }}: </b>{{ Carbon\Carbon::parse($user->created_at)->format('d.m.Y H:i') }}</div>
                                        <div><b>{{ __('Последний вход') }}: </b>{{ Carbon\Carbon::parse($user->user_last_visit_date)->format('d.m.Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3"><label class="form-label" title="{{ __('Введите пароль, если нужно его обновить') }}">{{ __('Пароль') }}</label>
                                    <input type="text" class="form-control" name="user_password" value="">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('Пол') }}</label>
                                    <select class="form-control" name="user_sex">
                                        @foreach ($sexes as $sex => $title)
                                            <option value="{{ $sex }}"  @if($user->user_sex == $sex) selected @endif">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('Роль') }}</label>
                                    <select class="form-control" name="user_role">
                                        @foreach ($roles as $role => $title)
                                            <option value="{{ $role }}"  @if($user->user_role == $role) selected @endif">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('Статус') }}</label>
                                    <select class="form-control" name="user_status">
                                        @foreach ($statuses as $status => $title)
                                            <option value="{{ $status }}"  @if($user->user_role == $status) selected @endif">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
