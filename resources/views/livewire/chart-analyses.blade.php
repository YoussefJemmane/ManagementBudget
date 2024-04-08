<div style="width: 400px; height: 400px;">
    <canvas id="analysesChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('analysesChart').getContext('2d');
    var analysesChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
                "Analyses chimiques par chromatographie",
                "Spectroscopie",
                "Spectrometrie",
                "Microscopie",
                "Cristallographie",
                "Analyses Environnementales"
            ],
            datasets: [{
                data: [@json($analyses_chimiques), @json($spectroscopie),
                    @json($spectrometrie), @json($microscopie),
                    @json($cristallographie), @json($analyses_environnementales)
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)', // Red
                    'rgba(255, 159, 64, 0.7)', // Orange
                    'rgba(255, 205, 86, 0.7)', // Yellow
                    'rgba(75, 192, 192, 0.7)', // Cyan
                    'rgba(54, 162, 235, 0.7)', // Blue
                    'rgba(153, 102, 255, 0.7)' // Purple
                ]
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
                    text: 'Percentage of Analyses'
                }
            }
        }
    });
</script>
