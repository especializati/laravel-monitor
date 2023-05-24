<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mx-4">
                {{ __("Endpoints do site {$site->url}") }}
            </h2>
            <a href="{{ route('endpoints.create', $site->id) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 px-4 ml-4">+</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-alerts/>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-6">Endpoint</th>
                                <th scope="col" class="px-6 py-6">Frequência</th>
                                <th scope="col" class="px-6 py-6">Próxima Verificação</th>
                                <th scope="col" class="px-6 py-6">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($endpoints as $endpoint)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $endpoint->endpoint }}</td>
                                    <td class="px-6 py-4">{{ $endpoint->frequency }}</td>
                                    <td class="px-6 py-4">{{ $endpoint->next_check }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('endpoints.edit', [$site->id, $endpoint->id]) }}">Editar</a>
                                        <a href="{{ route('endpoints.index', $site->id) }}">Logs</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
