@extends('admin/layouts.main')

@section('title')
    Добавить продукт
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.users.add') }}
@endsection

@section('h1')
    Добавить пользователя
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Новый пользователь</h3>
                </div>

                <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3"><label class="form-label">Имя</label>
                            <input type="text" class="form-control" name="user_name" placeholder="Введите имя пользователя">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Фамилия</label>
                            <input type="text" class="form-control" name="user_surname" placeholder="Введите фамилию пользователя">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Отчество</label>
                            <input type="text" class="form-control" name="user_patronymic" placeholder="Введите отчество пользователя">
                        </div>

                        <div class="form-group mb-3"><label class="mb-2">Фото</label>
                            <div class="input-group">
                                <label class="btn bg-purple input-file form-label btn-info" for="logo_image">
                                    <text><span class="fa fa-cloud-upload"></span>&nbsp; Загрузить фото</text>
                                    <input type="file" class="custom-file-input hidden" name="files[logo]" id="logo_image">
                                    <input type="hidden" class="current-image" name="user_photo" value="{{ $user->user_photo ?? '' }}">
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">E-mail</label>
                            <input type="text" class="form-control" name="user_email" placeholder="Введите e-mail пользователя">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Телефон</label>
                            <input type="text" class="form-control" name="user_phone" placeholder="Введите телефон пользователя">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Пароль</label>
                            <input type="text" class="form-control" name="user_password" placeholder="Введите пароль, если нужно его обновить">
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Пол</label>
                            <select class="form-control" name="user_sex">
                                @foreach ($sexes as $sex => $title)
                                    <option value="{{ $sex }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Роль</label>
                            <select class="form-control" name="user_role">
                                @foreach ($roles as $role => $title)
                                    <option value="{{ $role }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3"><label class="form-label">Статус</label>
                            <select class="form-control" name="user_status">
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
