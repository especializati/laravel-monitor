@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert-error">
            <p>{{ $error }}</p>
        </div>
    @endforeach
@endif

@if (session()->has('message'))
    <div class="alert-success">
        {{ session('message') }}
    </div>
@endif
