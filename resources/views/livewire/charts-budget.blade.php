
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 ">
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between ">
                    <div>
                        <div>
                            <div class="text-sm font-medium text-gray-400">Total Budget</div>

                            <div class="flex items-center ">
                                <div class="text-2xl font-semibold">{{ $first_budget }} MAD</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between ">
                    <div>
                        <div>
                            <div class="text-sm font-medium text-gray-400">Total Reste</div>

                            <div class="flex items-center ">
                                <div class="text-2xl font-semibold">{{ $budgetReste }} MAD</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between ">
                    <div>
                        <div>
                            <div class="text-sm font-medium text-gray-400">Total Depenses</div>

                            <div class="flex items-center ">
                                <div class="text-2xl font-semibold">{{$budgetUsed}} MAD</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="flex justify-center">
    <div style="width: 400px; height: 400px;" class="">
        <canvas id="budgetsChart"></canvas>
    </div>

</div>
<div class="flex justify-center pt-4">
    <div style="width: 500px; height: 500px;" class="">
        <canvas id="depensesLabo"></canvas>
    </div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('budgetsChart').getContext('2d');
    var servicesChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Depenses', 'Reste'],
            datasets: [{
                data: [@json($budgetUsed) , @json($budgetReste)
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)', 'rgb(54, 162, 235)'
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
                    text: 'Percentage of Budgets'
                }
            }
        }
    });
    var ctx2 = document.getElementById('depensesLabo').getContext('2d');
    const labels = [
        'Publication',
        'Traduction',
        'Revision',
        'Analyses'
    ];
    var depensesLaboChart  = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                   label: 'Depenses',
                data: [@json($depensesPublication) , @json($depensesTraduction), @json($depensesRevision), @json($depensesAnalyses)
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
                    text: 'Depenses de tous les services et analyses de laboratoire'
                }
            }
        }
    });
</script>
