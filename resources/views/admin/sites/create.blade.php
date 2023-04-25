<h1>Cadastrar Novo Site</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert-error">
            <p>{{ $error }}</p>
        </div>
    @endforeach
@endif

<form action="{{ route('sites.store') }}" method="post">
    @csrf()
    <input type="text" name="url" placeholder="URL">
    <button type="submit">Enviar</button>
</form>
