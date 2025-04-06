@extends('admin/layouts.main')

@section('title') {{ __('Платежные модули') }} @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.settings.payments') }} @endsection
@section('h1') {{ __('Платежные модули') }} @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="row payments-list">
                        @if($payments)
                            @foreach ($payments as $payment)
                                <div class="col-md-12 mb-3">
                                    <div class="card card-default card-payment">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <a class="card_cover" href="{{ route("admin.settings.payments.{$payment->pay_name}") }}">
                                                        <img src="{{ $payment->pay_image_url }}">
                                                    </a>
                                                </div>

                                                <div class="col-md-11">
                                                    <div class="flex-column align-content-center">
                                                        <h3 class="info-box-text">
                                                            {{ $payment->pay_title }}
                                                        </h3>

                                                        <div>
                                                            {{ $payment->pay_desc }}
                                                        </div>
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
