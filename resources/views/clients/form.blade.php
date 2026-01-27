<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $client?->id ? __('Edit Client') : __('Create Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="post" action="{{ $client?->id ? route('clients.update', $client) : route('clients.store') }}" class="mt-6 space-y-6">
                    @csrf
                    @method($client?->id ? 'patch' : 'post')

                    <div>
                        <x-input-label for="nome" :value="__('Name')" />
                        <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full"
                            :value="old('nome', $client->nome)" autofocus autocomplete="nome" />
                        <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                    </div>

                    <div>
                        <x-input-label for="telefone" :value="__('Phone')" />
                        <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full"
                            :value="old('telefone', $client->telefone)" autocomplete="telefone" />
                        <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
                    </div>

                    <div>
                        <x-input-label for="estado" :value="__('State')" />
                        <select id="estado" name="estado" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                        @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                        @endif
                    </div>
                    </form>
            </div>

        </div>
    </div>
</x-app-layout>
