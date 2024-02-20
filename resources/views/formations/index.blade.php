<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Liste des Formations") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <livewire:formations-table />
    </div>
</x-app-layout>
