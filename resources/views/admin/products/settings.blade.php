@extends('admin/layouts.main')

@section('title') Настройки продуктов @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.products.settings') }} @endsection
@section('h1') Настройки продуктов @endsection

@section('content')
    <div class="row">
        <div class="col-md-5">
            <form id="form-settings" action="{{ route('admin.products.settings.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-primary card-tabs card-outline">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_link_1" data-toggle="pill" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Внешний вид</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-five-tabContent">
                            <div class="tab-pane fade active show" id="tab_1" role="tabpanel" aria-labelledby="tab_link_1">
                                <div class="overlay-wrapper">
                                    <div class="form-group field-settings-mail_encrypt_type required"><label class="control-label" for="settings-width">Шаблон страницы</label>
                                        <select id="settings-width" class="form-control" name="settings[columns]" aria-required="true">
                                            <option value="1" {{ $product_settings->columns == 1 ? 'selected' : '' }}>В 1 колонку</option>
                                            <option value="2" {{ $product_settings->columns == 2 ? 'selected' : '' }}>В 2 колонки</option>
                                            <option value="3" {{ $product_settings->columns == 3 ? 'selected' : '' }}>В 3 колонки</option>
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right" name="save">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
