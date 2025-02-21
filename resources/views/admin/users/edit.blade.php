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
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->user_name }}</h3>
                </div>

                <form action="{{ route('admin.users.update', $user->user_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group"><label>Имя</label>
                            <input type="text" class="form-control" name="user_name" value="{{ $user->user_name }}" placeholder="Введите имя пользователя">
                        </div>

                        <div class="form-group"><label>Фамилия</label>
                            <input type="text" class="form-control" name="user_surname" value="{{ $user->user_surname }}" placeholder="Введите фамилию пользователя">
                        </div>

                        <div class="form-group"><label>Отчество</label>
                            <input type="text" class="form-control" name="user_patronymic" value="{{ $user->user_patronimic }}" placeholder="Введите отчество пользователя">
                        </div>

                        <div class="form-group"><label>E-mail</label>
                            <input type="text" class="form-control" name="user_email" value="{{ $user->user_email }}" placeholder="Введите e-mail пользователя">
                        </div>

                        <div class="form-group"><label>Телефон</label>
                            <input type="text" class="form-control" name="user_phone" value="{{ $user->user_phone }}" placeholder="Введите телефон пользователя">
                        </div>

                        <div class="form-group"><label>Пароль</label>
                            <input type="text" class="form-control" name="user_password" value="{{ $user->user_password }}" placeholder="Введите пароль, если нужно его обновить">
                        </div>

                        <div class="form-group"><label>Роль</label>
                            <select class="form-control" name="user_role">
                                @foreach ($roles as $role => $title)
                                    <option value="{{ $role }}"  @if($user->user_role == $role) selected @endif">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group"><label>Статус</label>
                            <select class="form-control" name="user_status">
                                @foreach ($statuses as $status => $title)
                                    <option value="{{ $status }}"  @if($user->user_role == $status) selected @endif">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
