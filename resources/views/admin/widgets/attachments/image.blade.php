@if($image)
    <div class="attachments">
        <div class="attach-wrap">
            <div class="attach-action attach-delete">
                <span class="fa fa-remove"></span>
            </div>
            <div class="attach">
                <img src="{{ $image }}">
            </div>
        </div>
    </div>
@endif