<canvas id="myChart" width="100%"></canvas>

<script>
    const ctx = document.getElementById("myChart").getContext("2d")
    const data = {
        labels: ["Shield", "Model", "Hooks",],
        datasets: [{
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                ],
                borderWidth: 1
            }]
        }]
    };


    const chart = new Chart(ctx, {
        type: 'bar',
        data: data,
    })

</script>