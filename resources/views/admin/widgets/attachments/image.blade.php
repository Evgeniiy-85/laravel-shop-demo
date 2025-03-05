@if(!isset($without_container))
    <div class="attachments" data-storage="{{ $storage }}" data-field_name="{{ $field }}" data-multiple="" data-url="{{ route('api.admin.attachments.add') }}">
        @include('admin.widgets.attachments.partials.image')
    </div>
@else
    @include('admin.widgets.attachments.partials.image')
@endif