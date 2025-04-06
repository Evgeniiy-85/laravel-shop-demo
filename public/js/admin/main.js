$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* Контекстное меню */
    $(document).on("click", ".context-button", function() {
        let $parent = $(this).parent();
        $parent.toggleClass('show-dmenu');
    });

    $(document).on("click", ".context-menu-list a", function() {
        let $parent = $(this).closest('.context-menu').removeClass('show-dmenu');
    });

    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    if ($('.ui-sortable').length > 0 ) {
        let $sortable = $('.ui-sortable');

        $sortable.sortable({
            cursor: 'move',
            handle: '.button-drag',
        });
    }

    let hash = document.location.hash;
    if (hash && $(`.nav-tabs .nav-link[href="${hash}"]`).length > 0) {
        $('.nav-tabs .nav-link').removeClass('active');
        $(`.nav-tabs .nav-link[href="${hash}"]`).addClass('active');
        $('.tab-pane').removeClass('active').removeClass('show');
        $(`${hash}.tab-pane`).addClass('active').addClass('show');
    }

    $('.nav-tabs .nav-link').click(function() {
        document.location.hash = $(this).attr('href');
    });

    let depend_blocks = new DependentBlocks();
    depend_blocks.init();

    $('select[multiple]').select2();

    editor_init();
});

var errorMessages = function(messages) {
    let html = '';
    messages.forEach((msg, i) => {
        html += `<div><strong>${msg}</strong></div>`;
    });
    html =
    '<div id="error_messages" class="alert alert-warning alert-dismissible">' +
        html +
       '<script>window.setTimeout(function() {$("#error_messages").hide();}, 5000);</script>' +
    '</div>';


    if ($('#admin_notices').children('#error_messages').length > 0) {
        $('#admin_notices').children('#error_messages').replaceWith(html);
    } else {
        $('#admin_notices').prepend(html)
    }
}
