@extends('admin/layouts.main')

@section('title')
    404 Страница не найдена
@endsection

@section('h1')
    404 Страница не найдена
@endsection

@section('content')
    <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i>Страница не найдена</h3>

            <p>
                Неправильно набран адрес, или такой страницы больше не существует
                <br><br><a href="{{ route('admin') }}">Главная страница</a>
            </p>
        </div>
    </div>
@endsection
