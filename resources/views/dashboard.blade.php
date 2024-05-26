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
                    @if (!Auth::user()->hasRole('Pole de recherche|Directeur de laboratoire'))


                                <div class="flex justify-center">
                                    <h1 class="text-3xl font-bold text-center">{{ $user->name }}</h1>
                                </div>
                                <div class="mt-6">
                                    <div class="flex">
                                        <div class="w-1/2">
                                            <p class="font-bold">Nom:</p>
                                            <p>{{ $user->name }}</p>
                                        </div>
                                        <div class="w-1/2">
                                            <p class="font-bold">Email:</p>
                                            <p>{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="flex mt-4">
                                        <div class="w-1/2">
                                            <p class="font-bold">Rôle:</p>
                                            <p>
                                                @foreach ($user->roles as $role)
                                                    <span>{{ $role->name }}</span>
                                                @endforeach
                                            </p>
                                        </div>
                                        {{-- if role is even Etudiant, Enseignant, Directeur de laboratoire --}}

                                    </div>
                                    <div class="flex mt-4">


                                        @foreach ($user->roles as $role)
                                            @if ($role->name == 'Etudiant')
                                                <div class="w-1/2">
                                                    <p class="font-bold">CNE:</p>
                                                    <p>{{ $user->cne }}</p>
                                                </div>
                                                <div class="w-1/2">
                                                    <p class="font-bold">Date d'inscription:</p>
                                                    <p>{{ $user->date_inscription }}</p>
                                                </div>
                                            @endif
                                            {{-- if the role is Directeur de Laboratoire show his laboratory --}}
                                            @if ($role->name == 'Directeur de laboratoire')
                                                <div class="w-1/2">
                                                    <p class="font-bold">Laboratoire:</p>
                                                    <p>{{ $user->laboratory->name }}</p>
                                                </div>
                                            @endif


                                        @endforeach
                                    </div>
                                    <div class="flex mt-4">


                                        @foreach ($user->roles as $role)
                                            @if ($role->name == 'Etudiant')
                                                <div class="w-1/2">
                                                    <p class="font-bold">Ettablissement:</p>
                                                    <p>{{ $user->etablissement }}</p>
                                                </div>
                                                <div class="w-1/2">
                                                    <p class="font-bold">Enseignant:</p>
                                                    <p>{{ $user->enseignant }}</p>
                                                </div>
                                            @endif


                                        @endforeach
                                    </div>
                                    <div class="flex mt-4">


                                        @foreach ($user->roles as $role)
                                            @if ($role->name == 'Etudiant|Enseignant')
                                                <div class="w-1/2">
                                                    <p class="font-bold">Laboratoire:</p>
                                                    <p>{{ $user->laboratory->name }}</p>
                                                </div>
                                                <div class="w-1/2">
                                                    <p class="font-bold">Directeur de Laboratoire:</p>
                                                    @foreach ($user->laboratory->users as $user)
                                                        @if ($user->roles->first()->name == 'Directeur de laboratoire')
                                                            <p>{{ $user->name }}</p>
                                                        @endif

                                                    @endforeach
                                                </div>

                                            @endif


                                        @endforeach
                                    </div>

                                    <div class="flex mt-4">
                                        <div class="w-1/2">
                                            <p class="font-bold">Créé le:</p>
                                            <p>{{ $user->created_at }}</p>
                                        </div>
                                        <div class="w-1/2">
                                            <p class="font-bold">Mis à jour le:</p>
                                            <p>{{ $user->updated_at }}</p>
                                        </div>

                                    </div>

                                </div>


                    @endif
                    @if (Auth::user()->hasRole('Pole de recherche'))
                        <div class="flex justify-center">
                            <div class="grid grid-cols-2">
                                <livewire:chart-services />
                                <livewire:chart-analyses />
                            </div>

                        </div>
                    @endif
                    @if (Auth::user()->hasRole('Pole de recherche'))
                        <div class="flex justify-center">
                            <div class="grid grid-cols-2">
                                <livewire:charts-fluxBudget />
                                <livewire:charts-laboratories />
                            </div>

                        </div>
                    @endif
                    @if (Auth::user()->hasRole('Directeur de laboratoire'))
                        <div class="flex justify-center">
                                <livewire:charts-budget />
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
