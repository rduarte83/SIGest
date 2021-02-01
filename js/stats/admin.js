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
        autoWidth: false,
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
        autoWidth: false,
        processData: false,
        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
}

function createDTCP() {
    $("#tableCP").DataTable({
        processing: true,
        ajax: {
            url: "/sigest/php/stats.php",
            type: "POST",
            data: {
                op: "fetchAdmPenCom",
            }
        },
        searching: false,
        responsive: true,
        autoWidth: false,
        contentType: false,
        processData: false,
        lengthChange: false,

        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
}

function createDTTP() {
    $("#tableTP").DataTable({
        processing: true,
        ajax: {
            url: "/sigest/php/stats.php",
            type: "POST",
            data: {
                op: "fetchAdmPenTec",
            }
        },
        searching: false,
        responsive: true,
        autoWidth: false,
        contentType: false,
        processData: false,
        lengthChange: false,

        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
}

function createDTCobP() {
    $("#tableCobP").DataTable({
        processing: true,
        ajax: {
            url: "/sigest/php/stats.php",
            type: "POST",
            data: {
                op: "fetchAdmPenCob",
            }
        },
        searching: false,
        responsive: true,
        autoWidth: false,
        contentType: false,
        processData: false,
        lengthChange: false,
        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
}

function createDTRmaP() {
    $("#tableRmaP").DataTable({
        processing: true,
        ajax: {
            url: "/sigest/php/stats.php",
            type: "POST",
            data: {
                op: "fetchAdmPenRma",
            }
        },
        searching: false,
        responsive: true,
        autoWidth: false,
        contentType: false,
        processData: false,
        lengthChange: false,

        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
}

function createDTCopiaP() {
    $("#tableCopiaP").DataTable({
        processing: true,
        ajax: {
            url: "/sigest/php/stats.php",
            type: "POST",
            data: {
                op: "fetchPenCopia",
            }
        },
        searching: false,
        responsive: true,
        autoWidth: false,
        contentType: false,
        processData: false,
        lengthChange: false,

        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
}

function createDTSWP() {
    $("#tableSWP").DataTable({
        processing: true,
        ajax: {
            url: "/sigest/php/stats.php",
            type: "POST",
            data: {
                op: "fetchPenSW",
            }
        },
        searching: false,
        responsive: true,
        autoWidth: false,
        contentType: false,
        processData: false,
        lengthChange: false,

        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
}

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

$(document).ready(function () {
    //Stats Tec
    createDTT();
    $.ajax({
        url: "/sigest/php/stats.php",
        type: "POST",
        data: {
            op: 'fetchMesT'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#periodoMT").html("");
            $("#periodoMT").html('<option value="0">Todos</option>');
            $.each(dataResult, function () {
                $("#periodoMT").append($("<option/>").val(this[0]).text(this[0]));
            });
        }
    });
    $("#periodoMT").on('change', function () {
        if ($.fn.dataTable.isDataTable('#tableT')) {
            $("#tableT").DataTable().destroy();
        }
        ;
        if ($("#periodoMT").val() == 0) {
            createDTT();
        } else {
            console.log($("#periodoMT").val());

            $("#tableT").DataTable({
                processing: true,
                ajax: {
                    url: "/sigest/php/stats.php",
                    type: "POST",
                    data: {
                        op: "fetchAdmTecS",
                        mes: $("#periodoMT").val()
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
    });

    //Pen Tec
    createDTTP();
    $.ajax({
        url: "/sigest/php/queries.php",
        type: "POST",
        data: {
            op: 'fetchTec'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#periodoT").html("");
            $("#periodoT").html('<option value="0">Todos</option>');
            $.each(dataResult.data, function () {
                $("#periodoT").append($("<option/>").val(this[0]).text(this[1]));
            });
        }
    });
    $("#periodoT").on('change', function () {
        if ($.fn.dataTable.isDataTable('#tableTP')) {
            $("#tableTP").DataTable().destroy();
        };
        if ($("#periodoT").val() == 0) {
            createDTTP();
        } else {
            $("#tableTP").DataTable({
                processing: true,
                ajax: {
                    url: "/sigest/php/stats.php",
                    type: "POST",
                    data: {
                        op: "fetchAdmPenTecS",
                        user: $("#periodoT").val()
                    }
                },
                searching: false,
                responsive: true,
                autoWidth: false,
                contentType: false,
                processData: false,
                lengthChange: false,
                language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
            });
        }
    });

    //Stats Com
    createDTC();
    $.ajax({
        url: "/sigest/php/stats.php",
        type: "POST",
        data: {
            op: 'fetchMesC'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#periodoMC").html("");
            $("#periodoMC").html('<option value="0">Todos</option>');
            $.each(dataResult, function () {
                $("#periodoMC").append($("<option/>").val(this[0]).text(this[0]));
            });
        }
    });
    $("#periodoMC").on('change', function () {
        if ($.fn.dataTable.isDataTable('#tableC')) {
            $("#tableC").DataTable().destroy();
        }
        ;
        if ($("#periodoMC").val() == 0) {
            createDTC();
        } else {
            $("#tableC").DataTable({
                processing: true,
                ajax: {
                    url: "/sigest/php/stats.php",
                    type: "POST",
                    data: {
                        op: "fetchAdmComS",
                        mes: $("#periodoMC").val()
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

    //Pen Com
    createDTCP();
    $.ajax({
        url: "/sigest/php/queries.php",
        type: "POST",
        data: {
            op: 'fetchCom'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#periodoC").html("");
            $("#periodoC").html('<option value="0">Todos</option>');
            $.each(dataResult.data, function () {
                $("#periodoC").append($("<option/>").val(this[0]).text(this[1]));
            });
        }
    });
    $("#periodoC").on('change', function () {
        if ($.fn.dataTable.isDataTable('#tableCP')) {
            $("#tableCP").DataTable().destroy();
        };
        if ($("#periodoC").val() == 0) {
            createDTCP();
        } else {
            $("#tableCP").DataTable({
                processing: true,
                ajax: {
                    url: "/sigest/php/stats.php",
                    type: "POST",
                    data: {
                        op: "fetchAdmPenComS",
                        user: $("#periodoC").text()
                    }
                },
                searching: false,
                responsive: true,
                autoWidth: false,
                contentType: false,
                processData: false,
                lengthChange: false,
                language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
            });
        }
    });

    //Pen Cobrancas
    createDTCobP();
    //Pen RMAs
    createDTRmaP();
    //Pen Copia
    createDTCopiaP();
    //Pen SW
    createDTSWP();
});