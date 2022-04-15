@if (Session::get('fail'))
    <div class="container my-2">
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    </div>
@endif
<br>
