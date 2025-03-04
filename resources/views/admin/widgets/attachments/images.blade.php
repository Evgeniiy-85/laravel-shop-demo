@if(!isset($without_container))
    <div class="attachments ui-sortable" data-storage="{{ $storage }}" data-field_name="{{ $field }}" data-multiple="1">
        @include('admin.widgets.attachments.partials.images')
    </div>
@else
    @include('admin.widgets.attachments.partials.images')
@endif