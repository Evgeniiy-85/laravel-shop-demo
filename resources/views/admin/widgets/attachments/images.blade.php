@if(!$without_container)
    <div class="attachments ui-sortable" data-storage="{{ $storage }}" data-field_name="{{ $field_name }}">
        @if($images)
            @foreach($images as $image)
                @include('admin.widgets.attachments.partials.image')
            @endforeach
        @endif
    </div>
@else
    @if($images)
        @foreach($images as $image)
            @include('admin.widgets.attachments.partials.image')
        @endforeach
    @endif
@endif