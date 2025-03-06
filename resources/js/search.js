export default class Search {

    init() {
        this.events();
    }

    events() {
        let search = this;

        $('#form-search input')
            .on("focus", function() {
                $('#form-search .search__controls').addClass('active');
            })
            .on("blur", function() {
                setTimeout(() => {
                    if (!$('#form-search input').is(':focus')) {
                        $('#form-search .search__controls').removeClass('active');
                    }
                }, 100);
            });

        $('.search-wrap .search__icon-clear').click(function () {
            $('#form-search input').val('').focus();
            $('#form-search .search__controls').addClass('active');
        });

        $('.search-wrap .search__icon-search').click(function () {
            if ($('#form-search input').val()) {
                $('#form-search').submit();
            }
        });
    }
}
