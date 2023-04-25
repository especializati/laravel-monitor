<h1>Sites</h1>

<a href="{{ route('sites.create') }}">Novo</a>

<table>
    <thead>
        <tr>
            <th>Site</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sites as $site)
            <tr>
                <td>{{ $site->url }}</td>
                <td>
                    <a href="{{ route('sites.edit', $site->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
