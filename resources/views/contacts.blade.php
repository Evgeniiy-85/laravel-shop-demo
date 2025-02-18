@extends('layouts.main')

@section('title')
    Страница контактов
@endsection

@section('content')
    <h1>Страница контактов</h1>

    <form action="{{ route('contact-from') }}" method="post">
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="name" class="form-label">Введите имя</label>
                    <input type="text" name="name" placeholder="Введитье имя" id="name" class="form-control">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="email" class="form-label">Введите email</label>
                    <input type="text" name="email" placeholder="Введитье email" id="email" class="form-control">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="comment" class="form-label">Введите comment</label>
                    <textarea name="comment" placeholder="Введитье что-нибудь" id="comment" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success" name="send">Отправить</button>
            </div>
        </div>
    </form>
@endsection
