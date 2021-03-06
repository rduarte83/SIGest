function createDT() {
    $("#table").DataTable({
        processing: true,
        ajax: {
            url: "php/stats.php",
            type: "POST",
            data: {
                op: 'fetchStats'
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
        url: "php/stats.php",
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

    $("#periodo").on('change', function () {
        if ($.fn.dataTable.isDataTable('#table')) {
            $("#table").DataTable().destroy();
        }
        ;
        if ($("#periodo").val() == 0) {
            createDT();
        } else {
            console.log( $("#periodo").val() );
            $("#table").DataTable({
                processing: true,
                ajax: {
                    url: "php/stats.php",
                    type: "POST",
                    data: {
                        op: 'fetchStatsS',
                        mes: $("#periodo").val()
                    },
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
});