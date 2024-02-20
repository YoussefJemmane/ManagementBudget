<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="pb-4">
        <div class="flex flex-wrap items-center justify-between">
            <select wire:model.live="selectedRole" class="block w-full max-w-xs border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">All Roles</option>
                <option value="students">Students</option>
                <option value="enseignants">Enseignants</option>
                <option value="directeurs">Directeur de Laboratoire</option>
                <option value="centreanalyses">Centre d'analyse</option>
                <option value="centreappuis">Centre d'appui</option>
            </select>

            <input wire:model.live="searchName" type="text" placeholder="Search by Name" class="block w-full max-w-xs border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

            @if($selectedRole === 'students')
            <input wire:model.live="searchCNE" type="text" placeholder="Search by CNE" class="block w-full max-w-xs border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <button>
                <a href="{{ route('student.create') }}" class="p-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Ajouter un student</a>
            </button>
            @endif
            @if($selectedRole === 'enseignants')
            <button>
                <a href="{{ route('enseignant.create') }}" class="p-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Ajouter un enseignant</a>
            </button>
            @endif
            @if($selectedRole === 'directeurs')
            <button>
                <a href="{{ route('directeur.create') }}" class="p-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Ajouter un directeur</a>
            </button>
            @endif
        </div>


    </div>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="w-full overflow-x-auto">
            <table class="w-full text-left border border-collapse rounded sm:border-separate border-slate-200" cellspacing="0">
                <tbody>
                    <tr>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Name</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Email</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Phone</th>
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Role</th>
                        @if($selectedRole === 'students')
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">CNE</th>
                        @endif
                        <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Action</th>


                    </tr>
                    @foreach ($users as $user)

                    <tr>

                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $user->name }}</td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $user->email }}</td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $user->phone }}</td>
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">

                            {{ $user->roles->implode('name', ', ') }}


                        </td>
                        @if($selectedRole === 'students')
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 "> {{ implode(', ', $user->students->map->cne->toArray()) }}</td>

                        @endif
                        <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
                            <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 ">Edit</a>
                            <a href="{{ route('users.show', $user->id) }}" class="text-yellow-600 ">Show</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="Get" class="inline-block">
                                @csrf

                                {{-- a button without borders just Delete text in red --}}
                                <button type="submit" class="text-red-600 ">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
        <div class="m-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
