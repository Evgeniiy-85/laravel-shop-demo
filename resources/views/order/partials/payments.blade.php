<div class="payments-list">
    @foreach ($payments as $payment)
        <div class="c-card card-payment mb-3">
            <div class="c-card-body">
                <div class="row">
                    <div class="col-md-2">
                        <a class="c-card-cover" href="/admin/settings/payments/{{ $payment->pay_id }}">
                            <img src="{{ $payment->pay_image_url }}">
                        </a>
                    </div>

                    <div class="col-md-7">
                        <div class="flex-column align-content-center">
                            <h3 class="info-box-text">
                                {{ $payment->pay_title }}
                            </h3>

                            <div>
                                {{ $payment->pay_desc }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 text-right flex-column mt-2">
                        <div class="btn-group">
                            <button type="submit" class="button button-ui btn_a-primary button-small" name="apply" data-target="#modalPay_{{ $payment->pay_name }}" data-toggle="modal">{{ $payment->pay_button_title }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include(ucfirst($payment->pay_name).".Views.payment.pay")
    @endforeach
</div>
