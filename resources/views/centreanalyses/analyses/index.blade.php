<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Liste des Analyses") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end pb-[20px]">
          
            </div>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full text-left border border-collapse rounded sm:border-separate border-slate-200" cellspacing="0">
                        <tbody>
                            <tr>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Nom de la benificeur</th>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Designation</th>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Description</th>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Prix Total</th>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Validation</th>


                            </tr>
                            @foreach ($analyses as $analyse)

                            <tr>

                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->user->name }}</td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->designantion }} </td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->description }} </td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->prix_total }}</td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    @if(Auth::user()->role == 'centreanalyse')
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
                                    {{ $analyse->validation_centre_analyse }}
                                    @endif
                                    @if(Auth::user()->role == 'directeur' && $analyse->validation_centre_analyse == "validate" && $analyse->validation_enseignant == "validate")
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
                                    {{ $analyse->validation_directeur_labo }}
                                    @endif
                                    @if(Auth::user()->role == 'enseignant' && $analyse->validation_centre_analyse == "validate")
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
                                    {{ $analyse->validation_enseignant }}

                                    @endif


                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
