class DependentBlocks {
    init() {
        let depend_blocks = this;

        if ($('[data-show_on],[data-show_off]').length > 0) {
            $('[data-show_on],[data-show_off]').each(function () {
                let is_active = $(this).is(':selected') || $(this).is(':checked');
                depend_blocks.render($(this), is_active);
            });
        }

        this.events();
    }

    events() {
        let depend_blocks = this;

        $(document).on('change', 'select', function (e) {
            $(this).find('option[data-show_on],option[data-show_off]').each(function () {
                depend_blocks.render($(this), $(this).is(':selected'));
            });
        });
    };

    render($el, is_active) {
        let $show_blocks = typeof($el.data('show_on')) !== 'undefined' ? $($el.data('show_on')) : null;
        let $hide_blocks = typeof($el.data('show_off')) !== 'undefined' ? $($el.data('show_off')) : null;

        if ($show_blocks) {
            is_active ? $show_blocks.removeClass('hidden') : $show_blocks.addClass('hidden');
        }
        if ($hide_blocks) {
            is_active ? $hide_blocks.addClass('hidden') : $hide_blocks.removeClass('hidden');
        }
    }

}
