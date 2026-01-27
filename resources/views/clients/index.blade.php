<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>

        <form action="" method="get">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="border border-gray-300 rounded-md px-2 py-1">
            <button type="submit" class="ml-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Search') }}
            </button>
        </form>

        <div>
            <a href="{{ route('clients.create') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Add Client') }}
            </a>
        </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-5">

                <div>
                    {{ $clients->links() }}
                </div>

                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->nome }}</td>
                                    <td>{{ $client->telefone }}</td>
                                    <td>{!! $client->estado == 1 ? '<span class="text-green-500">activo</span>' : 'inactivo' !!}</td>
                                    <td>
                                        <a href="{{ route('clients.edit', $client) }}" class="text-blue-600 hover:text-blue-900">Editar</a>

                                        <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Tem certeza que deseja eliminar este cliente?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div>
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
