@extends('admin/layouts.main')

@section('title') Редактировать платежный модуль @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.settings.payments.custom') }} @endsection
@section('h1') Редактировать платежный модуль @endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header with-border">
                    <h3 class="card-title">Ручной способ</h3>
                </div>

                <form action="{{ route('admin.settings.payments.custom.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3"><label class="form-label">Название</label>
                            <input type="text" class="form-control" name="pay_title"  value="{{ $payment->pay_title }}" placeholder="Введите название">
                        </div>

                        <div class="form-group mb-3"><label class="form-label" for="input_file">Изображение</label>
                            <div class="input-group">
                                <label class="btn bg-purple input-file form-label btn-info" for="pay_image">
                                    <text><span class="fa fa-cloud-upload"></span>&nbsp; Загрузить изображение</text>
                                    <input type="file" class="custom-file-input hidden" name="pay_image" id="pay_image">
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3"><label class="form-label" for="input_file">Описание</label>
                            <textarea name="pay_desc">{{ $payment->pay_desc }}</textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-end" value="save">Сохранить</button>
                    </div>
               </form>
            </div>
        </div>
    </div>
@endsection
