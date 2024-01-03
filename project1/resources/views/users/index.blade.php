<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Liste des Utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex justify-end">

                    <a href="{{ route('register') }}" class="px-4 py-2 font-bold bg-blue-500 rounded hover:bg-blue-700 text-ellipsis">
                        {{ __('Ajouter un Utilisateur') }}

                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    {{-- table have name directeur id and budget --}}
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="text-left">
                                <th class="px-4 py-2">{{ __('Nom') }}</th>
                                <th class="px-4 py-2">{{ __('CIN') }}</th>
                                <th class="px-4 py-2">{{ __('Role') }}</th>
                                <th class="px-4 py-2">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="px-4 py-2 border">{{ $user->name }}</td>
                                <td class="px-4 py-2 border">{{ $user->cin }}</td>
                                <td class="px-4 py-2 border">{{ $user->role }}</td>
                                <td class="px-4 py-2 border">
                                    <form method="post" action="{{ route('profile.destroyid',$user->id) }}" class="p-6">
                                        @csrf
                                        @method('delete')
                                            <x-danger-button class="ms-3">
                                                {{ __('Delete Account') }}
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
