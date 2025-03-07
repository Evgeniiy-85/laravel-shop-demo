@extends('admin/layouts.main')

@section('title')
    Основные настройки
@endsection

@section('content_header')
    <h1>Основные настройки</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5">
            <form id="form-settings" action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_link_1" data-toggle="pill" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Общие</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab_link_2" data-toggle="pill" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">Служебные</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab_link_3" data-toggle="pill" href="#tab_3" role="tab" aria-controls="tab_3" aria-selected="false">Почта</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab_link_4" data-toggle="pill" href="#tab_4" role="tab" aria-controls="tab_4" aria-selected="false">Внешний вид</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-five-tabContent">
                            <div class="tab-pane fade active show" id="tab_1" role="tabpanel" aria-labelledby="tab_link_1">
                                <div class="overlay-wrapper">
                                    <div class="form-group field-settings-site_name required"><label class="control-label" for="settings-site_name">Название сайта</label>
                                        <input type="text" id="settings-site_name" class="form-control" name="settings[site_name]" value="{{ $settings ? $settings->site_name : 'Laravel Shop' }}" aria-required="true">
                                        <div class="help-block"></div>
                                    </div>

                                    <div class="form-group field-settings-admin_email"><label class="control-label" for="settings-admin_email">E-mail админа (для уведомлений)</label>
                                        <input type="email" id="settings-admin_email" class="form-control" name="settings[admin_email]" value="{{ $settings->admin_email ?? '' }}">
                                        <div class="help-block"></div>
                                    </div>

                                    <div class="form-group field-settings-currency required"><label class="control-label" for="settings-currency">Валюта</label>
                                        <input type="text" id="settings-currency" class="form-control" name="settings[currency]" value="{{ $settings ? $settings->currency : '₽' }}" aria-required="true">
                                        <div class="help-block"></div>
                                    </div>

                                    <div class="form-group field-settings-page_count_entries required"><label class="control-label" for="settings-page_count_entries">Количество записей на странице</label>
                                        <input type="number" id="settings-page_count_entries" class="form-control" name="settings[page_count_entries]" value="{{ $settings ? $settings->page_count_entries : '20' }}" aria-required="true">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab_link_2">
                                <div class="overlay-wrapper">
                                    <div class="form-group field-settings-cookie_name required"><label class="control-label" for="settings-cookie_name">Имя куки</label>
                                        <input type="text" id="settings-cookie_name" class="form-control" name="settings[cookie_name]" value="{{ $settings->admin_email ?? 'site' }}" aria-required="true">
                                        <div class="help-block"></div>
                                    </div>

                                    <div class="form-group field-settings-upload_max_size required"><label class="control-label" for="settings-upload_max_size">Макс. размер файла при отправке</label>
                                        <input type="number" id="settings-upload_max_size" class="form-control" name="settings[upload_max_size]" value="{{ $settings->admin_email ?? '128' }}" aria-required="true">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab_3" role="tabpanel" aria-labelledby="tab_link_3">
                                <div class="overlay-wrapper">
                                    <div class="form-group field-settings-mail_send_type required"><label class="control-label">Тип отправки</label>
                                        <div id="settings-mail_send_type" role="radiogroup" aria-required="true">
                                            <label><input type="radio" name="settings[mail_send_type]" value="1" {{ !$settings || $settings->mail_send_type == 1 ? 'checked' : '' }}>PHP Mail</label>
                                            <label><input type="radio" name="settings[mail_send_type]" value="2"{{ $settings && $settings->mail_send_type == 2 ? 'checked' : '' }}> Swift Mail</label>
                                        </div>
                                        <div class="help-block"></div>
                                    </div>

                                    <div class="form-group field-settings-mail_host"><label class="control-label" for="settings-mail_host">SMTP хост</label>
                                        <input type="number" id="settings-mail_host" class="form-control" name="settings[mail_host]" vaLue="{{ $settings ? $settings->mail_host : '' }}">
                                        <div class="help-block"></div>
                                    </div>

                                    <div class="form-group field-settings-mail_port"><label class="control-label" for="settings-mail_port">SMTP порт</label>
                                        <input type="number" id="settings-mail_port" class="form-control" name="settings[mail_port]" vaLue="{{ $settings ? $settings->mail_port : '' }}">
                                        <div class="help-block"></div>
                                    </div>

                                    <div class="form-group field-settings-mail_user_name"><label class="control-label" for="settings-mail_user_name">Пользователь</label>
                                        <input type="text" id="settings-mail_user_name" class="form-control" name="settings[mail_user_name]"  vaLue="{{ $settings ? $settings->mail_user_name : '' }}">
                                        <div class="help-block"></div>
                                    </div>

                                    <div class="form-group field-settings-mail_user_pass"><label class="control-label" for="settings-mail_user_pass">Пароль</label>
                                        <input type="text" id="settings-mail_user_pass" class="form-control" name="settings[mail_user_pass]" value="{{ $settings ? $settings->mail_user_pass : '' }}">
                                        <div class="help-block"></div>
                                    </div>

                                    <div class="form-group field-settings-mail_encrypt_type required"><label class="control-label" for="settings-mail_encrypt_type">Шифрование</label>
                                        <select id="settings-mail_encrypt_type" class="form-control" name="settings[mail_encrypt_type]" aria-required="true">
                                            @foreach (\App\Models\Setting::getMailEncryptTypes() as $value => $title)
                                                <option value="{{ $value }}" {{ $settings && $settings->mail_encrypt_type == $value ? 'selected' : '' }}>{{ $title }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block"></div>
                                    </div>

                                    <div class="form-group field-settings-admin_email"><label class="control-label" for="settings-admin_email">E-mail админа (для уведомлений)</label>
                                        <input type="email" id="settings-admin_email" class="form-control" name="settings[admin_email]" value="{{ $settings ? $settings->admin_email : '' }}">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab_4" role="tabpanel" aria-labelledby="tab_link_4">
                                <div class="overlay-wrapper">
                                    <div class="form-group"><label for="input_file" class="mb-2">Favicon</label>
                                        <div class="input-group">
                                            <label class="btn bg-purple input-file form-label btn-info" for="cat_image">
                                                <text><span class="fa fa-cloud-upload"></span>&nbsp; Загрузить изображение</text>
                                                <input type="file" class="custom-file-input hidden" name="files[cat_image]" id="cat_image" data-ajax_upload="">
                                            </label>

                                            <x-adminattachments :data="[
                                                'field' => 'cat_image',
                                                'storage' => 'categories',
                                                'image' => null
                                            ]" />
                                        </div>
                                    </div>

                                    <div class="form-group"><label for="input_file" class="mb-2">Логотип сайта</label>
                                        <div class="input-group">
                                            <label class="btn bg-purple input-file form-label btn-info" for="cat_image">
                                                <text><span class="fa fa-cloud-upload"></span>&nbsp; Загрузить изображение</text>
                                                <input type="file" class="custom-file-input hidden" name="files[cat_image]" id="cat_image" data-ajax_upload="">
                                            </label>

                                            <x-adminattachments :data="[
                                                'field' => 'cat_image',
                                                'storage' => 'categories',
                                                'image' => null
                                            ]" />
                                        </div>
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
