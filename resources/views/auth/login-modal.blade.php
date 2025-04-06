<div class="modal fade" id="login-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header no-border p-0 mb-4">
                <div class="text-center width-100">
                    <h3 class="m-0">Авторизация</h3>
                </div>

                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span>×</span>
                </button>
            </div>

            <div class="modal-body p-0">
                @include('auth.partials.form')
            </div>
        </div>
    </div>
</div>
