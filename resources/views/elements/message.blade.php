<div id="flash-message">
    @if(Session::has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif
</div>
