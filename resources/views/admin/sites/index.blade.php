<h1>Sites</h1>

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
                <td>-</td>
            </tr>
        @endforeach
    </tbody>
</table>
