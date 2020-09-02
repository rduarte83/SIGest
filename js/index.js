var ctx = $("#chart");
var chart, url;

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

    //Fetch Chart info
    $.ajax({
        url: "php/fetchChart.php",
        type: "post",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult);

            chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: dataResult.comercial,
                    datasets: [{
                        data: dataResult.total,
                        backgroundColor: [
                            'red',
                            'blue',
                            'yellow',
                            'green',
                            'black',
                            'white'
                        ]
                    }]
                },
                options: {
                    plugins: {
                        labels: {
                            render: 'value',
                            fontSize: 20,
                            fontStyle: 'bold',
                            fontColor: 'black',
                        }
                    },
                    title: {
                        display: true,
                        text: 'Vendas mensais por Comercial'
                    },
                    tooltips: {
                        intersect: false
                    },
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
        if ($("#periodo").val() == 0) url = "php/fetchChart.php";
        else url = "php/fetchChartMes.php"

        $.ajax({
            url: url,
            type: "post",
            data: {
              data: $("#periodo").val()
            },
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                console.log(dataResult);
                chart.data.labels = dataResult.comercial;
                chart.data.datasets.forEach((dataset) => {
                    dataset.data = dataResult.total;
                });
                chart.update();
            }
        })
    })
})