<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Create Une Analyse") }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 ">
        <div class="border rounded-md bg-white p-[20px]  w-[1000px]">
            <form method="POST" action="{{ route('formulaireanalyse.store') }}" class=" pt-4 w-[900px] mx-auto">
                @csrf
                <div class="grid md:grid-cols-2 md:gap-6">

                    <!-- Designation -->
                    <div class="relative z-0 w-full mb-5 group">
                        <select onchange="updateSemiDesignationOptions()" name="designantion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" id="designation">
                            <option value="-1">
                                Choisir la designation
                            </option>
                            <option value="1">
                                Analyses chimiques par chromatographie
                            </option>
                            <option value="2">
                                Spectroscopie
                            </option>
                            <option value="3">
                                Spectrometrie
                            </option>
                            <option value="4">
                                Microscopie
                            </option>
                            <option value="5">
                                Cristallographie
                            </option>
                            <option value="6">
                                Analyses Environnementales
                            </option>
                        </select>
                        <label for="designantion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Designation</label>
                        @error('designantion')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Semi Designation -->
                    <div class="relative z-0 w-full mb-5 group">
                        <select onchange="updateModeFacturation()" name="semidesignation" id="semidesignation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" id="semidesignation">
                            <option value="">
                                Choisir le semi designation
                            </option>

                        </select>
                        <label for="semidesignation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Semi Designation</label>
                        @error('semidesignation')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Mode de Facturation -->
                <div class="relative z-0 w-full mb-5 group">
                    <input id="mode_facturation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" type="text" name="mode_facturation" :value="old('mode_facturation')" required autofocus />
                    <label for="mode_facturation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mode de Facturation</label>
                    @error('mode_facturation')
                    <span class="text-xs italic text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <!-- Prix Unitaire -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input id="prix_unitaire" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" type="text" name="prix_unitaire" :value="old('prix_unitaire')" required autofocus />
                        <label for="prix_unitaire" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prix Unitaire</label>
                        @error('prix_unitaire')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Qauntite -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input id="quantite" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" type="text" name="quantite" :value="old('quantite')" required autofocus />
                        <label for="quantite" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Qauntite</label>
                        @error('quantite')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">


                    <x-link-button class="ms-4" href="{{ route('formulaireanalyse.index') }}">
                        {{ __('Annuler') }}
                    </x-link-button>
                    <x-primary-button class="ms-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>

        </div>


    </div>
</x-app-layout>
<script>
    function updateSemiDesignationOptions() {

        var selectedDesignation = document.getElementById('designation').value;

        var semiDesignationSelect = document.getElementById('semidesignation');

        semiDesignationSelect.innerHTML = '<option value="">Choisir le semi designation</option>';

        switch (selectedDesignation) {
            case '1':
                semiDesignationSelect.innerHTML += '<option value="1">Chromatographie en Phase Gazeuse Couplée à la Spectrométrie de masse (GC- MS/MS) BRUKER 456-GC</option>';
                break;
            case '2':
                semiDesignationSelect.innerHTML += '<option value="2">Spectroscopie Infrarouge à Transformation de Fourier (FTIR)</option>';
                semiDesignationSelect.innerHTML += '<option value="3">Spectrophotometre à flamme</option>';
                semiDesignationSelect.innerHTML += '<option value="4">Spectrophotomètre UV-visible (échantillon liquide)</option>';
                break;
            case '3':
                semiDesignationSelect.innerHTML += '<option value="5">Spectrométrie d\'Emission Optique à Plasma à Couplage inductif (ICP-AES)</option>';
                semiDesignationSelect.innerHTML += '<option value="6">Spectrométrie d\'Emission Atomique à Plasma à Micro-ondes (MP-AES)</option>';
                semiDesignationSelect.innerHTML += '<option value="7">Spectrométrie d\'Absorption Atomique à Flamme (SAAF)</option>';
                break;
            case '4':
                semiDesignationSelect.innerHTML += '<option value="8">Microscope Optique Métallographique</option>';
                break;
            case '5':
                semiDesignationSelect.innerHTML += '<option value="9">Diffraction des Rayon X-Poudre</option>';
                break;
            case '6':
                semiDesignationSelect.innerHTML += '<option value="10">PH-mètre</option>';
                semiDesignationSelect.innerHTML += '<option value="11">Conductimetre</option>';
                semiDesignationSelect.innerHTML += '<option value="12">Turbidimètre</option>';
                semiDesignationSelect.innerHTML += '<option value="13">Physico-chimique (Cr-SO-Cat M Durté-Alcalinité-K-Na)</option>';
                semiDesignationSelect.innerHTML += '<option value="14">Critères de pollution (DCO-DBO-MES...)</option>';
                break;
            default:
                semiDesignationSelect.innerHTML += '<option value="">Choisir le semi designation</option>';
        }


    }

    function updateModeFacturation() {

        var selectedsemiDesignation = document.getElementById('semidesignation').value;

        var modeFacturation = document.getElementById('mode_facturation');

        var prixUnitaire = document.getElementById('prix_unitaire');

        switch (selectedsemiDesignation) {
            case '1':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '350';
                break;
            case '2':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '150';
                break;
            case '3':
                modeFacturation.value = 'Element (Li, Ba, Ca, K, Na)';
                prixUnitaire.value = '150';
                break;
            case '4':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '150';
                break;
            case '5':
                modeFacturation.value = 'Element';
                prixUnitaire.value = '150';
                break;
            case '6':
                modeFacturation.value = 'Element';
                prixUnitaire.value = '150';
                break;
            case '7':
                modeFacturation.value = 'Element';
                prixUnitaire.value = '150';
                break;
            case '8':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '80';
                break;
            case '9':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '250';
                break;
            case '10':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '80';
                break;
            case '11':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '80';
                break;
            case '12':
                modeFacturation.value = 'Echantillon';
                prixUnitaire.value = '80';

                break;
            case '13':
                modeFacturation.value = 'Element';
                prixUnitaire.value = '80';
                break;
            case '14':
                modeFacturation.value = 'Element';
                prixUnitaire.value = '150';
                break;

            default:
                modeFacturation.value = '';
                break;
        }

    }

</script>
