<script src="{{ asset('js/overlayscrollbars.browser.es6.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui-1.12.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/admin/adminlte.js') }}"></script>
<script src="{{ asset('js/admin/dependent_blocks.js') }}"></script>
<script src="{{ asset('js/admin/main.js') }}"></script>
<script src="{{ asset('js/admin/attachments.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>

<script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });

    var editor_init = function() {
        tinymce.init({
            selector: 'textarea.editor',
            language: 'ru',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen emoticons',
                'insertdatetime media table'
            ],
            toolbar: 'insert | undo redo |  code | formatselect | bold italic backcolor forecolor  emoticons | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | bullist numlist',
            image_dimensions: true,
            image_advtab: true,
            convert_urls: false,
            height: 400,
            filemanager_title: "Responsive Filemanager",
            relative_urls: false,
            remove_script_host : false,
            deprecation_warnings: false,
            setup: function (editor) {
                editor.on('change', function (e) {
                    editor.save();
                });
            }
        });
    };
</script>
@yield('scripts')
