@if($image || isset($image_url))
    <div class="attach-wrap">
        @if($image)
            <div class="attach-action attach-delete">
                <span class="fa fa-remove"></span>
            </div>
        @endif

        <div class="attach">
            <img src="{{ $image_url ?? Storage::disk($storage)->url($image) }}">
        </div>

        <input type="hidden" name="{{ $field }}" value="{{ $image }}">
    </div>
@endif
