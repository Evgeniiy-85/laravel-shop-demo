@extends('admin/layouts.main')

@section('title') Список пользователей @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.users') }} @endsection
@section('h1') Список пользователей @endsection

@section('content')
    <div class="row mb-3">
        <div class="col-3">
            <a href="{{ route('admin.users.add') }}" class="btn btn-block btn-outline-info btn-lg">
                <span>
                    <span class="fa fa-plus"></span> Добавить пользователя
                </span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Фото</th>
                                <th>ФИО</th>
                                <th>E-mail</th>
                                <th>Телефон</th>
                                <th>Дата регистрации</th>
                                <th>Последний визит</th>
                                <th style="width: 30px"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($users->count())
                                @foreach($users as $user)
                                    @php
                                        $category = $user->user_category ? App\Models\Category::find($user->user_category) : false;
                                    @endphp
                                    <tr>
                                        <td width="32">
                                            <a href="/admin/users/edit/{{ $user->user_id }}">{{ $user->user_id }}</a>
                                        </td>

                                        <td>
                                            <img width="32" height="32" class="img-circle img-bordered-sm" src="{{ $user->user_photo ?: '/images/avatars/no-avatar.png' }}"/>
                                        </td>

                                        <td>
                                            <a href="/admin/users/edit/{{ $user->user_id }}">{{ implode(' ', [$user->user_name, $user->user_surname, $user->user_patronymic]) }}</a>
                                        </td>

                                        <td>{{ $user->user_email }}</td>
                                        <td>{{ $user->user_phone }}</td>
                                        <td>{{ $user->user_create_date }}</td>
                                        <td>{{ $user->user_last_visit_date }}</td>
                                        <td> </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    @if(!$users->count())
                        Ничего не найден
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
