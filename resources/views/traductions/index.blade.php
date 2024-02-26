<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Liste des Demandes de Traduction") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <livewire:traduction-table/>
    </div>
</x-app-layout>
