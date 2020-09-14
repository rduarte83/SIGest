var ctx = $("#chart");
var chart, url;

function createDT() {
    $("#table").DataTable({
        processing: true,
        ajax: {
            url: "/sigest/php/queries.php",
            type: "POST",
            data: {
                op: 'fetchVendas'
            }
        },
        dom: 'Bfrtip',
        columnDefs: [
            {"visible": false, "targets": 0}
        ],
        buttons: {
            buttons: [
                {
                    extend: 'print',
                    'text': '<i class="fa fa-print" aria-hidden="true"></i>',
                    "className": 'btn btn-default btn-xs'
                },
                {
                    extend: 'pdf',
                    'text': '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                    "className": 'btn btn-default btn-xs'
                },
                {
                    extend: 'excel',
                    'text': '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                    "className": 'btn btn-default btn-xs'
                }
            ],
        },
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
        url: "/sigest/php/queries.php",
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
        url: "/sigest/php/fetchChart.php",
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
        if ($.fn.dataTable.isDataTable('#table')) {
            $("#table").DataTable().destroy();
        }
        ;
        if ($("#periodo").val() == 0) {
            createDT();
            url = "/sigest/php/fetchChart.php";

        } else {
            console.log( $("#periodo").val() );
            url = "/sigest/php/fetchChartMes.php"

            $("#table").DataTable({
                processing: true,
                ajax: {
                    url: "/sigest/php/queries.php",
                    type: "POST",
                    data: {
                        op: 'fetchVendasMes',
                        mes: $("#periodo").val()
                    },
                },
                dom: 'Bfrtip',
                buttons: {
                    buttons: [
                        {
                            extend: 'print',
                            'text': '<i class="fa fa-print" aria-hidden="true"></i>',
                            "className": 'btn btn-default btn-xs'
                        },
                        {
                            extend: 'pdf',
                            'text': '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                            "className": 'btn btn-default btn-xs'
                        },
                        {
                            extend: 'excel',
                            'text': '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                            "className": 'btn btn-default btn-xs'
                        }
                    ],
                },
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
    });
});