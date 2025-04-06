@extends('admin/layouts.main')

@section('title') {{ __('Расширения') }} @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.settings.extensions') }} @endsection
@section('h1') {{ __('Расширения') }} @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7">
                    <div class="row payments-list">
                        @if($extensions)
                            @foreach ($extensions as $extension)
                                <div class="col-md-12 mb-3">
                                    <div class="card card-default card-payment">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <a class="card_cover" href="{{ route("admin.{$extension->ext_name}.settings.edit") }}">
                                                        <img src="">
                                                    </a>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="flex-column align-content-center">
                                                        <h3 class="info-box-text">
                                                            {{ $extension->ext_title }}
                                                        </h3>

                                                       <div>
                                                           <a href="{{ route("admin.{$extension->ext_name}.settings.edit") }}">{{ __('Настройки расширения') }}</a>
                                                       </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-right">
                                                    <div class="align-content-center" style="height:100%">
                                                        <input type="checkbox" name="my-checkbox" @if($extension->ext_status) checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="{{ __('Выкл') }}" data-on-text="{{ __('Вкл') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
