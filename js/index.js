$(document).ready(function () {
    $.ajax({
        url: "php/fetchChart.php",
        type: "post",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult);

            var ctx = $("#chart");
            var chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Rui', 'João'],
                    datasets: [{
                        label: 'Número de Assistências',
                        data: dataResult,
                        backgroundColor: [
                            'red',
                            'blue'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });
});