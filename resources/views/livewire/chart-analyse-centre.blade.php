<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 ">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Budget</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">{{ $budget }} MAD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Analyses chimiques par chromatographie</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">{{ $analysesChimiqueFraisSum }} MAD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Spectroscopie</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">{{ $spectroscopieFraisSum }} MAD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Spectrometrie</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">{{ $spectrometrieFraisSum }} MAD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Microscopie</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">{{ $microscopieFraisSum }} MAD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Cristallographie</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">{{ $cristallographieFraisSum }} MAD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Analyses Environnementales</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">{{ $analysesEnvironnementalesFraisSum }} MAD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>


    <div class="flex justify-center pt-4">
        <div style="width: 500px; height: 500px;" class="">
            <canvas id="analysesCount"></canvas>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx2 = document.getElementById('analysesCount').getContext('2d');
    const labels = [
        "Analyses chimiques par chromatographie",
        "Spectroscopie",
        "Spectrometrie",
        "Microscopie",
        "Cristallographie",
        "Analyses Environnementales"

    ];
    var analysesCount = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total de chaque service',
                data: [@json($analyses_chimiques), @json($spectroscopie),
                    @json($spectrometrie), @json($microscopie),
                    @json($cristallographie), @json($analyses_environnementales)
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)'
                ],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Total de chaque analyse'
                }
            }
        }
    });
</script>
