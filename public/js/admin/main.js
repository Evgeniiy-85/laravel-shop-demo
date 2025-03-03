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