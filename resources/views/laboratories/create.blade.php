<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Create Un Laboratoire") }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 ">
        <div class="border rounded-md bg-white p-[20px]  w-[400px]">
            <form method="POST" action="{{ route('laboratory.store') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- Budget -->
                <div class="mt-4">
                    <x-input-label for="budget" :value="__('Budget')" />
                    <x-text-input id="budget" class="block w-full mt-1" type="number" name="budget" :value="old('budget')" required autofocus autocomplete="budget" />
                    <x-input-error :messages="$errors->get('budget')" class="mt-2" />
                </div>

               

                <!-- Directeur -->
                <div class="mt-4" id="directeur">
                    <x-input-label for="directeur" :value="__('Directeur')" />
                    <select name="directeur_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @foreach ($directeurs as $directeur)
                        <option value="{{ $directeur->id }}">{{ $directeur->user->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('directeur')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-link-button class="ms-4" href="{{ route('laboratory.index') }}">
                        {{ __('Annuler') }}
                    </x-link-button>
                    <x-primary-button class="ms-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

