<h1>Editar Site</h1>

<x-alerts/>

<form action="{{ route('sites.update', $site->id) }}" method="post">
    @method('PUT')
    @include('admin/sites/partials/form')
</form>
