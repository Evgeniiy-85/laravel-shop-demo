@extends('admin/layouts.main')

@section('title')
    Добавить продукт
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.products.add') }}
@endsection

@section('h1')
    Добавить продукт
@endsection

@section('content')
    <div class="row mb-3">
        <form action="{{ route('admin.products.add') }}" method="post">
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
    </div>
@endsection
