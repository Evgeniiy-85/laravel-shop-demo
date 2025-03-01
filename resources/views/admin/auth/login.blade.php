@extends('admin.layouts.auth.login')

@section('title')
    Авторизация
@endsection

@section('content_header')
    <h1>Авторизация</h1>
@endsection

@section('content')
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <h3 class="login-box-msg">Авторизация</h3>
                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email"/>
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Пароль" name="password"/>
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>

                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary float-end">Войти</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
