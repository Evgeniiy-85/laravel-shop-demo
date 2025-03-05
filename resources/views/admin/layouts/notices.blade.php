<div class="admin-notices" id="admin_notices">
    @if ($errors->any())
        <div id="error_messages" class="alert alert-warning alert-dismissible">
            @foreach ($errors->all() as $error)
                <div><strong>{{ $error }}</strong></div>
            @endforeach
        </div>
        <script>window.setTimeout(function(){$("#error_messages").hide();}, 5000);</script>
    @endif

    @if(session('success'))
        <div id="saveModelStatus" class="alert alert-success alert-dismissible mt-2">
            <div><strong>{{ session('success') }}</strong></div>
            <script>window.setTimeout(function(){$("#saveModelStatus").hide();}, 2000);</script>
        </div>
    @elseif(session('error'))
        <div id="saveModelStatus" class="alert alert-danger alert-dismissible mt-2">
            <div><strong>{{ session('error') }}</strong></div>
            <script>window.setTimeout(function(){$("#saveModelStatus").hide();}, 2000);</script>
        </div>
    @endif
</div>
