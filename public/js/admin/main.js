$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* Контекстное меню */
    $(document).on("click", ".context-button", function(){
        let $parent = $(this).parent();
        $parent.toggleClass('show-dmenu');
    });

    $(document).on("click", ".context-menu-list a", function(){
        let $parent = $(this).closest('.context-menu').removeClass('show-dmenu');
    });
});

var errorMessages = function(messages) {
    let html = '';
    messages.forEach((msg, i) => {
        html += `<div><strong>${msg}</strong></div>`;
    });
    html =
    '<div id="error_messages" class="alert alert-warning alert-dismissible">' +
        html +
       '<script>window.setTimeout(function(){$("#error_messages").hide();}, 3000);</script>' +
    '</div>';


    if ($('#main_content').children('#error_messages').length > 0) {
        $('#main_content').children('#error_messages').replaceWith(html);
    } else {
        $('#main_content').prepend(html)
    }
}