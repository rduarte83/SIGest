$(document).ready(function () {
    //Fetch Mes
    $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {
            op: 'fetchMes'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult);
            $("#periodo").html("");
            $("#periodo").html('<option value="0">Todos</option>');
            $.each(dataResult, function () {
                $("#periodo").append($("<option/>").val(this[0]).text(this[0]));
            });
        }
    });

    $.ajax({
        url: "php/fetchChart.php",
        type: "post",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult);

            var ctx = $("#chart");
            var chart = new Chart(ctx, {
                title: 'Aasasasasasasa',
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


    $("#periodo").on('change', function () {
        chart.

        $.ajax({
            url: "php/fetchChartMes.php",
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



});