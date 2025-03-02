@extends('layouts.main')

@section('title')
    Авторизация
@endsection

@section('content_header')
    <h1>Авторизация</h1>
@endsection

@section('content')
    <div class="site-login align-content-center height-100">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="login-box">
                    <div class="card">
                        <div class="card-body login-card-body p-4">
                            <h3 class="login-box-msg">Авторизация</h3>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="input-group mb-4">
                                    <input type="email" class="form-control" placeholder="Email" name="email"/>
                                    <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                                </div>

                                <div class="input-group mb-4">
                                    <input type="password" class="form-control" placeholder="Пароль" name="password"/>
                                    <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                                </div>

                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col-4">
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="button button-ui btn_a-primary float-end">Войти</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
