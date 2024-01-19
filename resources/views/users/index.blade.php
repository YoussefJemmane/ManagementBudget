<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Liste des Utilisateurs") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full text-left border border-collapse rounded sm:border-separate border-slate-200" cellspacing="0">
                        <tbody>
                            <tr>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Name</th>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Email</th>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Phone</th>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Role</th>
                                <th scope="col" class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">Action</th>


                            </tr>
                            @foreach ($users as $user)

                            <tr>

                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $user->name }}</td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $user->email }}</td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">{{ $user->phone }}</td>
                                <td class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                    <a href="{{ route("$user->role.index") }}" class="text-indigo-600 ">
                                        {{ $user->role }}
                                    </a>

                                </td>
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
            </div>
        </div>
    </div>
</x-app-layout>
