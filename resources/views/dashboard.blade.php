<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(!Auth::user()->hasRole("admin"))
                    {{ __("You're logged in!") }}
                    
                    @endif
                    @if(Auth::user()->hasRole("admin"))
                    <div class="flex justify-center">
                        <div class="grid grid-cols-2">
                            <livewire:chart-services />
                            <livewire:chart-analyses />
                        </div>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
