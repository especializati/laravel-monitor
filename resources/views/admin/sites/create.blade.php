<h1>Cadastrar Novo Site</h1>

<x-alerts/>

<form action="{{ route('sites.store') }}" method="post">
    @include('admin/sites/partials/form')
</form>
