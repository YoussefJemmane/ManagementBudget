<div style="width: 400px; height: 400px;">
    <canvas id="usersChart"></canvas>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('usersChart').getContext('2d');
    var usersChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Enseignant', 'Admin', 'Etudiant', 'Directeur de laboratoire', 'Entreprise',
                'Centre d\'appui', 'Pole de recherche', 'Centre d\'analyse'
            ],
            datasets: [{
                data: [@json($enseignant), @json($admin),
                    @json($etudiant), @json($directeur_laboratoire),
                    @json($entreprise), @json($centre_appui),
                    @json($pole_recherche), @json($centre_analyse)
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
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
                    text: 'Percentage of Users'
                }
            }
        }
    });
</script>
