<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="flex flex-wrap items-center justify-between pb-4">
        <input wire:model.live="search" type="text" placeholder="Search by benefactor's name" class="px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        @if(auth()->user()->hasRole('student'))
        <a href="{{ route('formulaireanalyse.create') }}" class="p-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
            Ajouter un Analyse
        </a>

        @endif

    </div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="w-full overflow-x-auto">
            <table class="w-full text-left border border-collapse rounded sm:border-separate border-slate-200" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Nom de la benificeur</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Designation</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Description</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Prix Total</th>
                        @if(auth()->user()->hasRole('centreanalyse'))

                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Validation de Centre d'analyse</th>
                        @endif

                        @if(auth()->user()->hasRole('centreanalyse|student|admin'))

                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Status de Centre d'analyse</th>
                        @endif

                        @if(auth()->user()->hasRole('directeur'))

                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Validation de Directeur de Laboratoire</th>
                        @endif

                        @if(auth()->user()->hasRole('directeur|student|admin'))

                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Status de Directeur de Laboratoire</th>
                        @endif

                        @if(auth()->user()->hasRole('enseignant'))

                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Validation de Enseignant</th>
                        @endif

                        @if(auth()->user()->hasRole('enseignant|student|admin'))

                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Status de Enseignant</th>
                        @endif

                        @if(auth()->user()->hasRole('student'))

                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($analyses as $analyse)

                    <tr>

                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->user->name }}</td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->designantion }} </td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->description }} </td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->prix_total }}</td>
                        @if(auth()->user()->hasRole('centreanalyse'))
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                            <form action="{{ route('formulaireanalysevalidationcentreanalyse.update', $analyse->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-blue-600 ">Validate</button>
                            </form>
                            <form action="{{ route('formulaireanalysenovalidationcentreanalyse.update', $analyse->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-red-600 ">No Validate</button>
                            </form>
                        </td>
                        @endif
                        @if(auth()->user()->hasRole('student|centreanalyse|admin'))
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">


                            {{ $analyse->validation_centre_analyse }}
                        </td>
                        @endif
                        @if(auth()->user()->hasRole('directeur'))
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">

                            <form action="{{ route('formulaireanalysevalidationdirecteurlabo.update', $analyse->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-blue-600 ">Validate</button>
                            </form>
                            <form action="{{ route('formulaireanalysenovalidationdirecteurlabo.update', $analyse->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-red-600 ">No Validate</button>
                            </form>
                        </td>
                        @endif
                        @if(auth()->user()->hasRole('student|directeur|admin'))
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">

                            {{ $analyse->validation_directeur_labo }}
                        </td>
                        @endif
                        @if(auth()->user()->hasRole('enseignant'))
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">

                            <form action="{{ route('formulaireanalysevalidationenseignant.update', $analyse->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-blue-600 ">Validate</button>
                            </form>
                            <form action="{{ route('formulaireanalysenovalidationenseignant.update', $analyse->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-red-600 ">No Validate</button>
                            </form>
                        </td>
                        @endif
                        @if(auth()->user()->hasRole('student|enseignant|admin'))
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">


                            {{ $analyse->validation_enseignant }}

                        </td>
                        @endif
                        @if(auth()->user()->hasRole('student'))

                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
                            <a href="{{ route('formulaireanalyse.edit', $analyse->id) }}" class="text-indigo-600 ">Edit</a>
                            <a href="{{ route('formulaireanalyse.show', $analyse->id) }}" class="text-yellow-600 ">Show</a>
                            <form action="{{ route('formulaireanalyse.destroy', $analyse->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                {{-- a button without borders just Delete text in red --}}
                                <button type="submit" class="text-red-600 ">Delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
