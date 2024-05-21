
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Show un Analyse') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <h1 class="text-3xl font-bold text-center">Analyse : {{ $formulaireanalyse->designation }}</h1>
                    </div>
                    <div class="mt-6">
                        <div class="flex">
                            <div class="w-1/2">
                                <p class="font-bold">Prix Total:</p>
                                <p>{{ $formulaireanalyse->prix_total }} DH</p>
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Demendeur :</p>
                                @php
                                    $user = $formulaireanalyse->user;
                                    $roles = $user->roles;
                                    $nameParts = explode(" ", $user->name);
                                @endphp

                                    @foreach ($roles as $role)
                                        @if ($role->name == 'Etudiant')
                                            {{--                                        must part the nom and prenom by " " from {{ $user->name }}--}}
                                        @if (!empty($nameParts[1]))
                                            <p>Nom : {{ $nameParts[0] }}</p>
                                            <p>Prenom : {{ $nameParts[1] }}</p>
                                        @else
                                            <p>{{ $user->name }}</p>
                                        @endif
                                        @endif

                                    @endforeach

                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-1/2">
                                <p class="font-bold">Telephone:</p>

                                  @foreach($roles as $role)
                                      @if($role->name == 'Etudiant')
                                          <p>{{ $user->phone }}</p>
                                      @endif
                                  @endforeach

                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Email :</p>
                                    @foreach ($roles as $role)
                                        @if ($role->name == 'Etudiant')
                                            <p>{{ $user->email }}</p>
                                        @endif

                                    @endforeach
                            </div>
                        </div>
 <div class="flex">
                            <div class="w-1/2">
                                <p class="font-bold">Validation de Directeur de Labo:</p>
                                {{ $formulaireanalyse->validation_directeur_labo }}
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Validation de l'enseignant :</p>
                                {{ $formulaireanalyse->validation_enseignant }}
                            </div>
                        </div>

                        <div class="flex mt-4">
                            <div class="w-1/2">
                                <p class="font-bold">Créé le:</p>
                                <p>{{ $formulaireanalyse->created_at }}</p>
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">Mis à jour le:</p>
                                <p>{{ $formulaireanalyse->updated_at }}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
