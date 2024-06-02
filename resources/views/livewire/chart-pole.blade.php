<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 ">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total des Services Effectue</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">
                                {{ $totalServices }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Analyses Effectue</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">
                                {{ $totalAnalyses }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Budget</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">
                                {{ $budget }} MAD
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Budget Rest</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">
                                {{ $budgetRest }} MAD
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Budget Depense</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">
                                {{ $budgetDepense }} MAD
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
