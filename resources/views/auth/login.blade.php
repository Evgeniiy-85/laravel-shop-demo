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
                            @include('auth.partials.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
