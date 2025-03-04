@if($image)
    <div class="attach-wrap">
        <div class="attach-action attach-delete">
            <span class="fa fa-remove"></span>
        </div>

        <div class="attach">
            <img src="{{ Storage::disk($storage)->url($image) }}">
        </div>

        <input type="hidden" name="{{ $field }}" value="{{ $image }}">
    </div>
@endif