export default class Search {

    init() {
        this.events();
    }

    events() {
        let search = this;

        $('#form-search input')
            .on("focus", function() {
                search.btnClearDisplay();
            })
            .on("blur", function() {
                setTimeout(() => {
                    if (!$('#form-search input').is(':focus')) {
                        search.btnClearDisplay(1);
                    }
                }, 100);
            })
            .on("input", function() {
                search.btnClearDisplay();
            })

        $('.search-wrap .search__icon-clear').click(function () {
            $('#form-search input').val('').focus();
        });

        $('.search-wrap .search__icon-search').click(function () {
            if ($('#form-search input').val()) {
                $('#form-search').submit();
            }
        });
    }

    btnClearDisplay(to_hide = false, to_active = false) {
        if (to_hide) {
            $('#form-search .search__icon-clear').removeClass('active');
        } else if(to_active) {
            $('#form-search .search__icon-clear').addClass('active');
        } else if($('#form-search input').val()) {
            $('#form-search .search__icon-clear').addClass('active');
        } else {
            $('#form-search .search__icon-clear').removeClass('active');
        }
    }
}
