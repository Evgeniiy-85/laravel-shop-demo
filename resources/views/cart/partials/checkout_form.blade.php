<div class="c-card checkout-form">
    <form action="{{ route('cart.confirm') }}" method="post">
        @csrf

        <div class="c-card-body column-2">
            <div class="form-group"><label class="control-label">E-mail</label>
                <input type="email" class="form-control" name="client_email">
            </div>

            <div class="form-group"><label class="control-label">Имя</label>
                <input type="text" class="form-control" name="client_name">
            </div>

            <div class="form-group"><label class="control-label">Фамилия</label>
                <input type="text" class="form-control" name="client_surname">
            </div>

            <div class="form-group"><label class="control-label">Телефон</label>
                <input type="text" class="form-control" name="client_phone">
            </div>
        </div>

        <div class="c-card-footer text-right">
            <button type="submit" class="button button-ui btn_a-primary button-small" name="confirm">Подтвердить заказ</button>
        </div>
    </form>
</div>
