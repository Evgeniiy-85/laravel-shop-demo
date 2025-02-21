@extends('admin/layouts.main')

@section('title')
    Добавить продукт
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.users.add') }}
@endsection

@section('h1')
    Добавить пользователя
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Новый пользователь</h3>
                </div>

                <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group"><label>Название</label>
                            <input type="text" class="form-control" name="prod_title" placeholder="Введите название продукта">
                        </div>

                        <div class="form-group"><label>Алиас</label>
                            <input type="text" class="form-control" name="prod_alias" placeholder="Алиас продукта подставится автоматически">
                        </div>

                        <div class="form-group"><label>Статус</label>
                            <select class="form-control" name="prod_status">
                                @foreach ($statuses as $status => $title)
                                    <option value="{{ $status }}">{{ $title }}</option>
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
