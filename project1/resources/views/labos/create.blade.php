<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Creer un laboratoire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('addlabo') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm font-bold text-gray-700">Nom</label>
                            <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" placeholder="Nom du laboratoire" value="{{ old('name') }}">
                            @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="directeur" class="block mb-2 text-sm font-bold text-gray-700">Directeur</label>
                            {{-- select to loop $ditrectors --}}
                            <select name="directeur_id" id="directeur" class="w-full px-3 py-2 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                                @foreach ($directors as $director)
                                <option value="{{ $director->id }}">{{ $director->users->name }}</option>
                                @endforeach
                                @error('directeur')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="budget" class="block mb-2 text-sm font-bold text-gray-700">Budget</label>
                            <input type="number" name="budget" id="budget" class="w-full px-3 py-2 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" placeholder="Budget du laboratoire" value="{{ old('budget') }}">
                            @error('budget')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">Ajouter</button>
                        </div>
                        <a href="{{ route('listlabo') }}" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
