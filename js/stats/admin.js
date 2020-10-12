$(document).ready(function () {
    $.ajax({
        url: "/sigest/php/fetchChart.php",
        type: "post",
        data: {
            'op': 'mes'
        },
        success: function (dataResult) {
            dataResult = JSON.parse(dataResult);
            var ctx = $("#chart");
            var barChart = new Chart(ctx, {
                type: 'bar',
                options: {
                    title: {
                      display: true,
                      text: 'Vendas por Comercial',
                    },
                    plugins: {
                        labels: {
                            render: 'value',
                        },
                    },
                },
                data: {
                    labels: dataResult
                }
            });

            addData(barChart, 'pablo', '#ff0000');
            addData(barChart, 'ricardo', '#00ff00');
            addData(barChart, 'tiago', '#0000ff');
        }
    });

});

function addData(chart, label, color) {
    $.ajax({
        url: "/sigest/php/fetchChart.php",
        type: "post",
        data: {
            'op': 'data',
            'com': label
        },
        success: function (dataResult) {
            dataResult = JSON.parse(dataResult);
            console.log(dataResult);
            chart.data.datasets.push({
                label: label,
                backgroundColor: color,
                data: dataResult
            });
            chart.update();
        }
    });
}