@extends('admin/layouts.main')

@section('title')
    Настройки продуктов
@endsection

@section('content_header')
    <h1>Настройки продуктов</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5">
            <form id="form-settings" action="{{ route('admin.products.settings.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-primary card-tabs card-outline">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_link_1" data-toggle="pill" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Общие</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-five-tabContent">
                            <div class="tab-pane fade active show" id="tab_1" role="tabpanel" aria-labelledby="tab_link_1">
                                <div class="overlay-wrapper">
                                    <div class="form-group field-settings-mail_encrypt_type required"><label class="control-label" for="settings-width">Ширина блока</label>
                                        <select id="settings-width" class="form-control" name="settings[width]" aria-required="true">
                                            <option value="25" {{ $product_settings->width == 25 ? 'selected' : '' }}>25%</option>
                                            <option value="50" {{ $product_settings->width == 50 ? 'selected' : '' }}>50%</option>
                                            <option value="100" {{ $product_settings->width == 100 ? 'selected' : '' }}>100%</option>
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
