var ctx = $("#chart");
var chart, url;

function createDT() {
    $("#table").DataTable({
        processing: true,
        ajax: {
            url: "/sigest/php/stats.php",
            type: "POST",
            data: {
                op: "fetchStatsAdm"
            }
        },
        paging: false,
        searching: false,
        bInfo: false,
        responsive: true,
        autoWidth: false,
        contentType: false,
        processData: false,
        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
}

$(document).ready(function () {
    createDT();

    //Fetch Mes
    $.ajax({
        url: "/sigest/php/stats.php",
        type: "POST",
        data: {
            op: 'fetchMesAdm'
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
        url: "/sigest/php/fetchChartAdm.php",
        type: "post",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data);

            chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: dataResult.stats,
                    datasets: [{
                        data: dataResult.total,
                        backgroundColor: [
                            'red',
                            'blue',
                            'cyan',
                            'green',
                            'orange',
                            'indigo',
                            'pink',
                            'yellow'
                        ],
                    }],
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
                        text: 'Estatísticas dos Administrativos'
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
        if ($.fn.dataTable.isDataTable('#table')) {
            $("#table").DataTable().destroy();
        };
        if ($("#periodo").val() == 0) {
            createDT();
            url = "/sigest/php/fetchChartAdm.php";

        } else {
            console.log( $("#periodo").val() );
            url = "/sigest/php/fetchChartAdmMes.php";

            $("#table").DataTable({
                processing: true,
                ajax: {
                    url: "/sigest/php/stats.php",
                    type: "POST",
                    data: {
                        op: "fetchStatsAdmMes",
                        mes: $("#periodo").val()
                    }
                },
                paging: false,
                searching: false,
                bInfo: false,
                responsive: true,
                autoWidth: false,
                contentType: false,
                processData: false,
                language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
            });
        }
        $.ajax({
            url: url,
            type: "post",
            data: {
                mes: $("#periodo").val()
            },
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                console.log(dataResult);
                chart.data.labels = dataResult.stats;
                chart.data.datasets.forEach((dataset) => {
                    dataset.data = dataResult.total;
                });
                chart.update();
            }
        })
    });
});