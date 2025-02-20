@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
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
