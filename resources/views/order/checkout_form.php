<div class="c-card checkout-form">
    <form action="{{ route('cart.checkout') }}" method="post">
        @csrf

        <div class="c-card-body column-2">
            <input type="email" name="client_email" value="">
            <input type="text" name="client_name" value="">
            <input type="text" name="client_surname" value="">
            <input type="text" name="client_phone" value="">
        </div>

        <div class="c-card-footer text-right">
            <button type="submit" class="button button-ui btn_a-primary button-small" name="next">Продолжить</button>
        </div>
    </form>
</div>
