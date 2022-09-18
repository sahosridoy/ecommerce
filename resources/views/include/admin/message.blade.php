<!-- Validation Error -->
@if ($errors->any())
    <div class="alert alert-danger alert-with-border alert-dismissible" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- Success -->
@if (Session::has('success'))
    <div class="alert alert-success alert-with-border alert-dismissible" role="alert">
        {{ Session::get('success'); }}
    </div>
@endif


<!-- error -->
@if (Session::has('error'))
    <div class="alert alert-danger alert-with-border alert-dismissible" role="alert">
        {{ Session::get('error'); }}
    </div>
@endif
