@if(!isset($without_container))
    <div class="attachments" data-storage="{{ $storage }}" data-field_name="{{ $field }}" data-multiple="" data-url="{{ route('api.admin.attachments.add') }}">
        @include('admin.components.attachments.partials.image')
    </div>
@else
    @include('admin.components.attachments.partials.image')
@endif