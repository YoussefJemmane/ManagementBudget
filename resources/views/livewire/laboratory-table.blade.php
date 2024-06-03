<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

    <div class="flex justify-end gap-5 pb-2">

        <form action="{{ route('labos.export') }}" method="POST">
            @csrf
            <button
                class="px-4 py-2 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-green">Export
                Laboratories</button>
        </form>

        <button data-modal-target="import-modal" data-modal-toggle="import-modal"
            class="px-4 py-2 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-lg active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-green">Import
            Laboratories</button>



        <a href="{{ route('laboratory.create') }}"
            class="px-4 py-2 text-sm font-semibold leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">Add
            Laboratory</a>
    </div>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="w-full overflow-x-auto">
            <table class="w-full text-left border border-collapse rounded sm:border-separate border-slate-200"
                cellspacing="0">

                <tbody>
                    <tr>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Name</th>
                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Directeur</th>

                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Budget</th>

                        <th scope="col"
                            class="h-12 px-6 text-sm font-medium border-l first:border-l-0 stroke-slate-700 text-slate-700 bg-slate-100">
                            Action</th>

                    </tr>
                    @foreach ($laboratories as $laboratory)
                        <tr>

                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                {{ $laboratory->name }}</td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                @foreach ($laboratory->users as $user)
                                    @foreach ($user->roles as $role)
                                        {{ $role->name == 'Directeur de laboratoire' ? $user->name : '' }}
                                    @endforeach
                                @endforeach
                            </td>
                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500 ">
                                {{ $laboratory->budget }}</td>


                            <td
                                class="h-12 px-6 text-sm transition duration-300 border-t border-l first:border-l-0 border-slate-200 stroke-slate-500 text-slate-500">
                                <a href="{{ route('laboratory.edit', $laboratory->id) }}"
                                    class="text-indigo-600 ">Edit</a>
                                <a href="{{ route('laboratory.show', $laboratory->id) }}"
                                    class="text-yellow-600 ">Show</a>
                                <form action="{{ route('laboratory.destroy', $laboratory->id) }}" method="POST"
                                    class="inline-block">
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
            <div class="m-4">
                {{ $laboratories->links() }}
            </div>
        </div>
    </div>
    <div id="import-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-white-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-white-600">
                    <h3 class="text-xl font-semibold text-white-900 dark:text-black">
                        Import Laboratories
                    </h3>

                </div>
                <!-- Modal body -->
                <form action="{{ route('labos.import') }}" method="POST" enctype="multipart/form-data">
                    <div class="pl-4 pb-4 pr-4">
                        @csrf

                        <label class="block mb-2 text-sm font-medium text-white-900 dark:text-white"
                            for="file_input">Upload file</label>
                        <input
                            class="block w-full text-sm text-white-900 border border-white-300 rounded-lg cursor-pointer bg-white-50 dark:text-white-400 focus:outline-none dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400"
                            id="file_input" type="file" name="file">
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-white-200 rounded-b dark:border-white-600">
                        <button data-modal-hide="import-modal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        <button data-modal-hide="import-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-white-900 focus:outline-none bg-white rounded-lg border border-white-200 hover:bg-white-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-white-100 dark:focus:ring-white-700 dark:bg-white-800 dark:text-white-400 dark:border-white-600 dark:hover:text-dark dark:hover:bg-white-700">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
