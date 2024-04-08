<div style="width: 400px; height: 400px;">
    <canvas id="labosChart"></canvas>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('labosChart').getContext('2d');
    var labosChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: @json($laboratoryNames),
            datasets: [{
            data: @json($laboratoryBudgets),
            backgroundColor: [
               
                @foreach($colors as $color)
                    '{{$color}}',
                @endforeach
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
                    text: 'Percentage of Laboratories'
                }
            }
        }
    });
</script>
