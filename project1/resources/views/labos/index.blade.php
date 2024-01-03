<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Liste des laboratoires') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- table have name directeur id and budget --}}
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="text-left">
                                <th class="px-4 py-2">{{ __('Nom') }}</th>
                                <th class="px-4 py-2">{{ __('Directeur') }}</th>
                                <th class="px-4 py-2">{{ __('Budget') }}</th>
                                <th class="px-4 py-2">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($labos as $labo)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $labo->name }}</td>
                                    <td class="px-4 py-2 border">{{ $labo->directeur->users->name }}</td>
                                    <td class="px-4 py-2 border">{{ $labo->budget }}</td>
                                    <td class="px-4 py-2 border">
                                        {{-- <a href="{{ route('labo.show', $labo->id) }}" class="text-blue-500 hover:text-blue-700">{{ __('Voir') }}</a>
                                        <a href="{{ route('labo.edit', $labo->id) }}" class="text-blue-500 hover:text-blue-700">{{ __('Modifier') }}</a>
                                        <form action="{{ route('labo.destroy', $labo->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">{{ __('Supprimer') }}</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>

                            <tr>
                                <td colspan="4">
                                    {{ $labos->links('pagination::tailwind') }}
                                    {{-- {{ $labos->links('pagination::bootstrap-4') }} --}}
                                    {{-- {{ $labos->links('pagination::simple-tailwind') }} --}}
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
