<div style="width: 400px; height: 400px;">
    <canvas id="servicesChart"></canvas>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('servicesChart').getContext('2d');
    var servicesChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Publication', 'Revision', 'Traduction'],
            datasets: [{
                data: [@json($publicationCount), @json($traductionCount),
                    @json($revisionCount)
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'
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
                    text: 'Percentage of Services'
                }
            }
        }
    });
</script>
