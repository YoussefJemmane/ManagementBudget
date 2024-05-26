<div style="width: 400px; height: 400px;">
    <canvas id="fluxBudgetChart"></canvas>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('fluxBudgetChart').getContext('2d');
    var fluxBudgetChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Centre Analyse Budget', 'Centre Appui Budget', 'Rest de Laboratoires'
            ],
            datasets: [{
                data: [
                    @json($fraisServices),@json($fraisAnalyse),@json($laboratoriesReste)
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',

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
                    text: 'Percentage of Budget Flow'
                }
            }
        }
    });
</script>
