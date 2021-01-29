var ctx = $("#chart");
var chart, url;


function createDTT() {
    $("#tableT").DataTable({
        processing: true,
        ajax: {
            url: "/sigest/php/stats.php",
            type: "POST",
            data: {
                op: "fetchAdmTec",
            }
        },
        paging: false,
        searching: false,
        bInfo: false,
        responsive: true,
        autoWidth: true,
        processData: false,
        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
}

function createDTC() {
    $("#tableC").DataTable({
        processing: true,
        ajax: {
            url: "/sigest/php/stats.php",
            type: "POST",
            data: {
                op: "fetchAdmCom",
            }
        },
        paging: false,
        searching: false,
        bInfo: false,
        responsive: true,
        autoWidth: true,
        processData: false,
        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
}

$(document).ready(function () {
    createDTT();

    createDTC();

    //Fetch Mes Tec
    $.ajax({
        url: "/sigest/php/stats.php",
        type: "POST",
        data: {
            op: 'fetchMesT'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#periodoT").html("");
            $("#periodoT").html('<option value="0">Todos</option>');
            $.each(dataResult, function () {
                $("#periodoT").append($("<option/>").val(this[0]).text(this[0]));
            });
        }
    });
    $("#periodoT").on('change', function () {
        if ($.fn.dataTable.isDataTable('#tableT')) {
            $("#tableT").DataTable().destroy();
        }
        ;
        if ($("#periodoT").val() == 0) {
            createDTT();
        } else {
            console.log($("#periodoT").val());

            $("#tableT").DataTable({
                processing: true,
                ajax: {
                    url: "/sigest/php/stats.php",
                    type: "POST",
                    data: {
                        op: "fetchAdmTecS",
                        mes: $("#periodoT").val()
                    }
                },
                paging: false,
                searching: false,
                bInfo: false,
                responsive: true,
                autoWidth: true,
                contentType: false,
                processData: false,
                language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
            });
        }
    });

    //Fetch Mes Com
    $.ajax({
        url: "/sigest/php/stats.php",
        type: "POST",
        data: {
            op: 'fetchMesC'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#periodoC").html("");
            $("#periodoC").html('<option value="0">Todos</option>');
            $.each(dataResult, function () {
                $("#periodoC").append($("<option/>").val(this[0]).text(this[0]));
            });
        }
    });
    $("#periodoC").on('change', function () {
        if ($.fn.dataTable.isDataTable('#tableC')) {
            $("#tableC").DataTable().destroy();
        }
        ;
        if ($("#periodoC").val() == 0) {
            createDTC();
        } else {
            $("#tableC").DataTable({
                processing: true,
                ajax: {
                    url: "/sigest/php/stats.php",
                    type: "POST",
                    data: {
                        op: "fetchAdmComS",
                        mes: $("#periodoC").val()
                    }
                },
                paging: false,
                searching: false,
                bInfo: false,
                responsive: true,
                autoWidth: true,
                contentType: false,
                processData: false,
                language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
            });
        }
    });

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
            chart.data.datasets.push({
                label: label,
                backgroundColor: color,
                data: dataResult
            });
            chart.update();
        }
    });
};