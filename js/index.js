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
                    labels: dataResult.comercial,
                    datasets: [{
                        label: 'Número de Assistências',
                        data: dataResult.total,
                        backgroundColor: [
                            'red',
                            'blue',
                            'yellow'
                        ]
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