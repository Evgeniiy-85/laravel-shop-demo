@extends('admin/layouts.main')

@section('title') Пользователи @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.users') }} @endsection
@section('h1') Пользователи @endsection

@section('content')
    <div class="row mb-3">
        <div class="col-3">
            <a href="{{ route('admin.users.add') }}" class="btn btn-outline-primary btn-lg">
                <span>
                    <span class="fa fa-plus"></span> Добавить пользователя
                </span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список пользователей</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table">
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
                                    <tr class="align-middle">
                                        <td width="32">
                                            <a href="/admin/users/edit/{{ $user->user_id }}">{{ $user->user_id }}</a>
                                        </td>

                                        <td>
                                            <img width="32" height="32" class="img-circle img-bordered-sm p-0" src="{{ $user->user_photo_url }}"/>
                                        </td>

                                        <td>
                                            <a href="/admin/users/edit/{{ $user->user_id }}">{{ implode(' ', [$user->user_name, $user->user_surname, $user->user_patronymic]) }}</a>
                                        </td>

                                        <td>{{ $user->user_email }}</td>
                                        <td>{{ $user->user_phone }}</td>
                                        <td>{{ $user->user_create_date }}</td>
                                        <td>{{ $user->user_last_visit_date }}</td>
                                        <td class="user-action-buttons text-right">
                                            @component('admin.components.context_menu', [
                                                'menu' => [
                                                    [
                                                        'icon' => 'fa fa-pencil',
                                                        'title' => 'Редактировать',
                                                        'href' => "/admin/users/edit/{$user->user_id}",
                                                        'class' => 'dont-replace-href',
                                                    ],
                                                    [
                                                        'icon' => 'fa fa-sign-in',
                                                        'title' => 'Войти под пользователем',
                                                        'href' => "/admin/users/auth/{$user->user_id}",
                                                        'target' => '_blank',
                                                    ],
                                                    [
                                                        'icon' => 'fa fa-trash',
                                                        'title' => 'Удалить',
                                                        'href' => "/admin/users/edit/delete/{$user->user_id}",
                                                        'onclick' => 'return confirm(\'Точно удалить?\')',
                                                    ]
                                                ],
                                                'class' => 'float-right'])
                                            @endcomponent
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $users->links('admin.layouts.paginator')}}
                </div>
            </div>
        </div>
    </div>
@endsection
