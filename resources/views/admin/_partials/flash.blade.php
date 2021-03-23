@if($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops</strong>
        <div class="mb-2">There are sompe problems with your input.</div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success"> {{ session('success') }} </div>
@endif

@if(session('error'))
    <div class="alert alert-danger"> {{ session('error') }} </div>
@endif