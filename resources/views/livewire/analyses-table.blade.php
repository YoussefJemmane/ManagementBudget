<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    @error('budget')
        <div class="alert alert-danger">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ $message }}</strong>
            </div>
        </div>
    @enderror
    {{-- add a button that add a analyse a modal will pop up and have the form --}}
    <div class="flex justify-end pb-2">
        @if (auth()->user()->hasRole('Etudiant'))
            <a href="{{ route('formulaireanalyse.create') }}"
                class="px-4 py-2 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">Add
                Analyse</a>
        @endif
    </div>



    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="w-full overflow-x-auto">
            <table class="w-full text-left border border-collapse rounded sm:border-separate border-slate-200"
                cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Nom de la benificeur</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Designation</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Description</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Prix Total</th>
                        @if (auth()->user()->hasRole('Centre d\'analyse') )
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Validation de Centre d'analyse</th>
                        @endif

                        @if (auth()->user()->hasRole('Centre d\'analyse|Etudiant|Pole de recherche'))
                            <th scope="col"
                                class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                Status de Centre d'analyse</th>
                            @endif @if (auth()->user()->hasRole('Centre d\'analyse'))
                                <th scope="col"
                                    class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                    Execution de analyse</th>
                            @endif

                            @if (auth()->user()->hasRole('Centre d\'analyse|Etudiant|Pole de recherche'))
                                <th scope="col"
                                    class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                    Status de execution de l'analyse</th>
                            @endif

                            @if (auth()->user()->hasRole('Directeur de laboratoire'))
                                <th scope="col"
                                    class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                    Validation de Directeur de Laboratoire</th>
                            @endif

                            @if (auth()->user()->hasRole('Directeur de laboratoire|Etudiant|Pole de recherche'))
                                <th scope="col"
                                    class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                    Status de Directeur de Laboratoire</th>
                            @endif

                            @if (auth()->user()->hasRole('Enseignant'))
                                <th scope="col"
                                    class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                    Validation de Enseignant</th>
                            @endif

                            @if (auth()->user()->hasRole('Enseignant|Etudiant|Pole de recherche'))
                                <th scope="col"
                                    class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                    Status de Enseignant</th>
                            @endif

                                <th scope="col"
                                    class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                                    Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($analyses as $analyse)
                        @php
                            $showRow = auth()->user()->hasRole('Centre d\'analyse')
                                ? $analyse->validation_enseignant == 'validate'
                                : true;
                        @endphp

                        @if ($showRow)
                            <tr>

                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $analyse->user->name }}</td>
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $analyse->designantion }} </td>
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $analyse->description }} </td>
                                <td
                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    {{ $analyse->prix_total }}</td>
                                @if (auth()->user()->hasRole('Centre d\'analyse') )
                                    <td
                                        class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                        <form
                                            action="{{ route('formulaireanalysevalidationcentreanalyse.update', $analyse->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-blue-600 "@if (($analyse->execution_analyse === 'execute')) disabled @endif>Validate</button>
                                        </form>
                                        <form
                                            action="{{ route('formulaireanalysenovalidationcentreanalyse.update', $analyse->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-red-600 "@if (($analyse->execution_analyse === 'execute')) disabled @endif>No Validate</button>
                                        </form>
                                    </td>
                                @endif
                                @if (auth()->user()->hasRole('Etudiant|Centre d\'analyse|Pole de recherche'))
                                    <td
                                        class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">


                                        {{ $analyse->validation_centre_analyse }}
                                    </td>
                                    @endif @if (auth()->user()->hasRole('Centre d\'analyse'))
                                        <td
                                            class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                            <form
                                                action="{{ route('formulaireanalysependingexecutionanalyse.update', $analyse->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-red-600 "
                                                    @if (($analyse->execution_analyse === 'execute' || $analyse->execution_analyse === 'pending')) disabled @endif>Pending</button>
                                            </form>
                                            <form
                                                action="{{ route('formulaireanalyseexecutioncentreanalyse.update', $analyse->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-blue-600 "
                                                    @if (($analyse->execution_analyse === 'execute')) disabled @endif>Execute</button>
                                            </form>
                                        </td>
                                    @endif
                                    @if (auth()->user()->hasRole('Etudiant|Centre d\'analyse|Pole de recherche'))
                                        <td
                                            class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">


                                            {{ $analyse->execution_analyse }}
                                        </td>
                                    @endif
                                    @if (auth()->user()->hasRole('Directeur de laboratoire'))
                                        <td
                                            class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">

                                            <form
                                                action="{{ route('formulaireanalysevalidationdirecteurlabo.update', $analyse->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-blue-600 "
                                                    @if (($analyse->execution_analyse === 'execute')) disabled @endif>
                                                    Validate
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('formulaireanalysenovalidationdirecteurlabo.update', $analyse->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-red-600 "@if ($analyse->execution_analyse === 'execute') disabled @endif>
                                                    No Validate
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                    @if (auth()->user()->hasRole('Etudiant|Directeur de laboratoire|Pole de recherche'))
                                        <td
                                            class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">

                                            {{ $analyse->validation_directeur_labo }}
                                        </td>
                                    @endif
                                    @if (auth()->user()->hasRole('Enseignant') )
                                        <td
                                            class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">

                                            <form
                                                action="{{ route('formulaireanalysevalidationenseignant.update', $analyse->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-blue-600 "@if (($analyse->execution_analyse === 'execute')) disabled @endif>
                                                    Validate
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('formulaireanalysenovalidationenseignant.update', $analyse->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-red-600 " @if (($analyse->execution_analyse === 'execute')) disabled @endif>
                                                    No Validate
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                    @if (auth()->user()->hasRole('Etudiant|Enseignant|Pole de recherche'))
                                        <td
                                            class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">


                                            {{ $analyse->validation_enseignant }}

                                        </td>
                                    @endif
                                    @if (auth()->user()->hasRole('Etudiant') )
                                        @if($analyse->execution_analyse === "execute")
{{--                                            return a button download have route analyse.generatepdf--}}
                                            <td
                                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
                                                <a href="{{ route('formulaireanalyse.generatepdf', $analyse->id) }}"
                                                   class="text-green-600 ">Download</a>
                                            </td>

                                        @else
                                                <td
                                                    class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
                                                    <a href="{{ route('formulaireanalyse.edit', $analyse->id) }}"
                                                       class="text-indigo-600 " @if (($analyse->execution_analyse === 'execute')) disabled @endif>
                                                        Edit</a>
                                                    <a href="{{ route('formulaireanalyse.show', $analyse->id) }}"
                                                       class="text-yellow-600 " @if (($analyse->execution_analyse === 'execute')) disabled @endif> Show</a>
                                                    <form action="{{ route('formulaireanalyse.destroy', $analyse->id) }}"
                                                          method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- a button without borders just Delete text in red --}}
                                                        <button type="submit" class="text-red-600 " @if (($analyse->execution_analyse === 'execute')) disabled @endif>Delete</button>
                                                    </form>
                                                </td>
                                        @endif

                                @else
                                    <td
                                        class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">

                                        <a href="{{ route('formulaireanalyse.show', $analyse->id) }}"
                                           class="text-yellow-600 " @if (($analyse->execution_analyse === 'execute')) disabled @endif> Show</a>

                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <div class="m-4">
                {{ $analyses->links() }}
            </div>
        </div>

    </div>

</div>
