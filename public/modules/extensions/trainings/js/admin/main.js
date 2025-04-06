$(function(){
    if ($('.structure').length > 0 ) {
        let $sortable = $('.structure-wrap .t-ui-sortable');
        let url = $('.structure-wrap').data('url');

        $sortable.sortable({
            cursor: 'move',
            handle: '.button-drag',
            activate: function( event, ui ) {
                $(ui.item).closest('.structure-item-wrap').addClass('moving');
            },
            stop: function (event, ui) {
                $(ui.item).closest('.structure-item-wrap').removeClass('moving');
                let sort = $('.structure [name="sort_id[]"]').serialize();

                $.ajax({
                    url: url,
                    method: 'post',
                    dataType: 'json',
                    data: sort,
                    success: function (resp) {
                        if (!resp.status) {
                            alert('Ошибка при сохранении данных');
                            console.error(resp.error);
                        }
                    },
                    error: function (err) {
                        alert("Ошибка при сохранении данных");
                        console.error(err);
                    }
                });
            }
        });
    }

    $('.lesson-elements [data-element_edit]').click(function(e) {
        e.preventDefault();
        let modal_id = $(this).attr('href');
        let url = $(this).data('url');
        let modal = new bootstrap.Modal(document.querySelector(modal_id));

        $.ajax({
            url: url,
            type: 'get',
            dataType: 'html',
            data: {},
            success: function (html) {
                $(modal_id).find('.modal-body').html(html);
                editor_init();
                modal.show();
            }, error: function () {
                alert('Произошла ошибка при получении данных');
            }
        });
    });

    if ($('.lesson-elements').length > 0 ) {
        let $sortable = $('[data-ajax_sortable]');
        let url = $sortable.data('ajax_sortable');

        $sortable.sortable({
            cursor: 'move',
            handle: '.button-drag',
            activate: function( event, ui ) {

            },
            stop: function (event, ui) {
                let elements = $sortable.find('[name="element_id[]"]').serialize();

                $.ajax({
                    url: url,
                    method: 'post',
                    dataType: 'json',
                    data: elements,
                    success: function (resp) {
                        if (!resp.status) {
                            alert('Ошибка при сохранении данных');
                            console.error(resp.error);
                        }
                    },
                    error: function (err) {
                        alert("Ошибка при сохранении данных");
                        console.error(err);
                    }
                });
            }
        });
    }
});
