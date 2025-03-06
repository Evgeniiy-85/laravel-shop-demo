@if(!isset($without_container))
    <div class="attachments ui-sortable" data-storage="{{ $storage }}" data-field_name="{{ $field }}" data-multiple="1" data-url="{{ route('api.admin.attachments.add') }}">
        @include('admin.components.attachments.partials.images')
    </div>
@else
    @include('admin.components.attachments.partials.images')
@endif