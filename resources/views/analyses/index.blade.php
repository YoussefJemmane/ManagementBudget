<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Liste des Analyses") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end pb-[20px]">
                @if(Auth::user()->role == 'student')
                <a href="{{ route('formulaireanalyse.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                    Ajouter un Analyse
                </a>
                @endif
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
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Validation de Centre d'analyse</th>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Validation de Directeur de Laboratoire</th>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Validation de Enseignant</th>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Action</th>

                            </tr>
                            @foreach ($analyses as $analyse)

                            <tr>

                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->user->name }}</td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->designantion }} </td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->description }} </td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->prix_total }}</td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $analyse->validation_centre_analyse }}</td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 "> {{ $analyse->validation_directeur_labo }}</td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 "> {{ $analyse->validation_enseignant }}</td>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
