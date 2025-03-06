@extends('admin/layouts.main')

@section('title')
    Редактировать пользователя
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.users.edit') }}
@endsection

@section('h1')
    Редактировать пользователя
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
                                <div class="form-group mb-3"><label class="form-label">Имя</label>
                                    <input type="text" class="form-control" name="user_name" value="{{ $user->user_name }}" placeholder="Введите имя пользователя">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">Фамилия</label>
                                    <input type="text" class="form-control" name="user_surname" value="{{ $user->user_surname }}" placeholder="Введите фамилию пользователя">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">Отчество</label>
                                    <input type="text" class="form-control" name="user_patronymic" value="{{ $user->user_patronimic }}" placeholder="Введите отчество пользователя">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <div class="user-info">
                                        <div class="user-photo">
                                            <img src="{{ $user->user_photo_url }}">
                                        </div>

                                        <div><b>Дата регистрации: </b>{{ Carbon\Carbon::parse($user->created_at)->format('d.m.Y H:i') }}</div>
                                        <div><b>Последний вход: </b>{{ Carbon\Carbon::parse($user->user_last_visit_date)->format('d.m.Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3"><label class="form-label">E-mail</label>
                                    <input type="text" class="form-control" name="user_email" value="{{ $user->user_email }}" placeholder="Введите e-mail пользователя">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">Телефон</label>
                                    <input type="text" class="form-control" name="user_phone" value="{{ $user->user_phone }}" placeholder="Введите телефон пользователя">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">Пароль</label>
                                    <input type="text" class="form-control" name="user_password" value="" placeholder="Введите пароль, если нужно его обновить">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">Пол</label>
                                    <select class="form-control" name="user_sex">
                                        @foreach ($sexes as $sex => $title)
                                            <option value="{{ $sex }}"  @if($user->user_sex == $sex) selected @endif">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3"><label class="form-label">Роль</label>
                                    <select class="form-control" name="user_role">
                                        @foreach ($roles as $role => $title)
                                            <option value="{{ $role }}"  @if($user->user_role == $role) selected @endif">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3"><label class="form-label">Статус</label>
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
                        <button type="submit" class="btn btn-primary float-end">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
