@if(!isset($without_container))
    <div class="attachments" data-storage="{{ $storage }}" data-field_name="{{ $field }}" data-multiple="">
        @include('admin.widgets.attachments.partials.image')
    </div>
@else
    @include('admin.widgets.attachments.partials.image')
@endif