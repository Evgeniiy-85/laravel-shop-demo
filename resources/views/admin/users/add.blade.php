@extends('admin/layouts.main')

@section('title')
    {{ __('Добавить пользователя') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.users.add') }}
@endsection

@section('h1')
    {{ __('Добавить пользователя') }}
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Новый пользователь') }}</h3>
                </div>

                <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3"><label class="form-label">{{ __('Имя') }}</label>
                            <input type="text" class="form-control" name="user_name">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Фамилия') }}</label>
                            <input type="text" class="form-control" name="user_surname">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Отчество') }}</label>
                            <input type="text" class="form-control" name="user_patronymic">
                        </div>

                        <div class="form-group mb-3"><label class="mb-2">{{ __('Фото') }}</label>
                            <div class="input-group">
                                <label class="btn bg-purple input-file form-label btn-info" for="logo_image">
                                    <text><span class="fa fa-cloud-upload"></span>&nbsp; {{ __('Загрузить фото') }}</text>
                                    <input type="file" class="custom-file-input hidden" name="files[logo]" id="logo_image">
                                    <input type="hidden" class="current-image" name="user_photo" value="{{ $user->user_photo ?? '' }}">
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('E-mail') }}</label>
                            <input type="text" class="form-control" name="user_email">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Телефон') }}</label>
                            <input type="text" class="form-control" name="user_phone">
                        </div>

                        <div class="form-group mb-3"><label class="form-label" title="Введите пароль, если нужно его обновить">{{ __('Пароль') }}</label>
                            <input type="text" class="form-control" name="user_password">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Пол') }}</label>
                            <select class="form-control" name="user_sex">
                                @foreach ($sexes as $sex => $title)
                                    <option value="{{ $sex }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Роль') }}</label>
                            <select class="form-control" name="user_role">
                                @foreach ($roles as $role => $title)
                                    <option value="{{ $role }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">{{ __('Статус') }}</label>
                            <select class="form-control" name="user_status">
                                @foreach ($statuses as $status => $title)
                                    <option value="{{ $status }}">{{ $title }}</option>
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
