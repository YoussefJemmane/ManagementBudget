
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
        </div><div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Budget Publication</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">{{ $publicationFraisSum }} MAD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Budget Revision</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">{{$revisionFraisSum}} MAD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between ">
                <div>
                    <div>
                        <div class="text-sm font-medium text-gray-400">Total Budget Traduction</div>

                        <div class="flex items-center ">
                            <div class="text-2xl font-semibold">{{$traductionFraisSum}} MAD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="flex justify-center pt-4">
<div style="width: 500px; height: 500px;" class="">
    <canvas id="servicesCount"></canvas>
</div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

var ctx2 = document.getElementById('servicesCount').getContext('2d');
const labels = [
    'Publication',
    'Traduction',
    'Revision',

];
var servicesCount  = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
               label: 'Total de chaque service',
            data: [@json($PublicationCount) , @json($TraductionCount), @json($RevisionCount)
            ],
            backgroundColor: [
                'rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)'
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
                text: 'Total de chaque service'
            }
        }
    }
});
</script>
