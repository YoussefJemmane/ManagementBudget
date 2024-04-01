<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create a Service') }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 " x-data="{ selectedForm: '' }">
        <form action="{{ route('services.store') }}" method="POST">
            @csrf



            <div class="border rounded-md bg-white p-[20px]  w-[1000px]">
                <div class="mb-4 flex justify-around pt-3">
                    {{-- a label choose a service --}}
                    <label class="text-lg font-semibold">Choose a service :</label>
                    <input type="radio" id="traductionCheckbox" name="service" value="traduction"
                        @change="selectedForm = $event.target.checked ? 'traduction' : ''">
                    <label for="traductionCheckbox">Traduction</label><br>
                    <input type="radio" id="publicationCheckbox" name="service" value="publication"
                        @change="selectedForm = $event.target.checked ? 'publication' : ''">
                    <label for="publicationCheckbox">Publication</label><br>
                    <input type="radio" id="revisionCheckbox" name="service" value="revision"
                        @change="selectedForm = $event.target.checked ? 'revision' : ''">
                    <label for="revisionCheckbox">Revision</label><br>
                </div>


                <div class="mb-4">
                    <label for="titre" class="text-lg font-semibold">Titre :</label>
                    <input type="text" name="titre" id="titre" class="border rounded-md p-2 w-full">
                </div>


                <div x-show="selectedForm === 'publication'">

                    <div class="mb-4">
                        <label for="intitule_article" class="text-lg font-semibold">Intitule de l'article :</label>
                        <input type="text" name="intitule_article" id="intitule_article"
                            class="border rounded-md p-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="intitule_journal" class="text-lg font-semibold">Intitule du journal :</label>
                        <input type="text" name="intitule_journal" id="intitule_journal"
                            class="border rounded-md p-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="ISSN" class="text-lg font-semibold">ISSN :</label>
                        <input type="text" name="ISSN" id="ISSN" class="border rounded-md p-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="Base_donne_indexation" class="text-lg font-semibold">Base de donne indexation
                            :</label>
                        <input type="text" name="Base_donne_indexation" id="Base_donne_indexation"
                            class="border rounded-md p-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="qualite_article" class="text-lg font-semibold">Qualite de l'article :</label>
                        <input type="text" name="qualite_article" id="qualite_article"
                            class="border rounded-md p-2 w-full">
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4">
                <button type="submit" class="bg-blue-500 text-white p-4 rounded-md">
                    Create Service
                </button>
            </div>



        </form>

    </div>
</x-app-layout>
