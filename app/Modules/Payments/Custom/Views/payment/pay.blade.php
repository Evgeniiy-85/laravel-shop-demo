<div class="modal fade " id="modalPay_{{ $payment->pay_name }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center width-100">
                    <h4 class="modal-title">К оплате {{ $order->order_sum }} р.</h4>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="form-pay-tinkoff" action="{{ route('payments.custom.pay', $order->order_id) }}" method="post">
                    @csrf
                    <div class="c-card-body column-2">
                        <div class="form-group"><label class="control-label">Наименование организации</label>
                            <input type="email" class="form-control" name="organization">
                        </div>

                        <div class="form-group"><label class="control-label">ИНН/КПП</label>
                            <input type="text" class="form-control" name="inn">
                        </div>

                        <div class="form-group"><label class="control-label">БИК</label>
                            <input type="text" class="form-control" name="bik">
                        </div>

                        <div class="form-group"><label class="control-label">Р/счёт</label>
                            <input type="text" class="form-control" name="billing_number">
                        </div>

                        <div class="form-group"><label class="control-label">Адрес для отправки закрывающих документов</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="button button-ui btn_a-primary button-small" name="send">Выписать счет</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
