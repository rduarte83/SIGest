var id = localStorage.getItem("id");

$(document).ready(function () {
    //Fetch Comercial
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchCom',
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);
            if (dataResult.data.length == 1) {
                $("#comercial").attr("readonly", true);
                $("#comercial").append($("<option/>").val(dataResult.data[0][0]).text(dataResult.data[0][1]));
            } else {
                $("#comercial").html('<option value="999">Seleccionar Comercial</option>');
                $.each(dataResult.data, function () {
                    $("#comercial").append($("<option/>").val(this[1]).text(this[1]));
                });
            }
        }
    });

    $.ajax({
        url: "../php/queries.php",
        type: "post",
        data: {
            id: id,
            op: 'fetchCliS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data);

            $("#nif").val(dataResult.data[0][0]);
            $("#id").val(dataResult.data[0][1]);
            $("#cli").val(dataResult.data[0][2]);
            $("#morada").val(dataResult.data[0][3]);
            $("#zona").val(dataResult.data[0][4]);
            $("#responsavel").val(dataResult.data[0][5]);
            $("#contacto").val(dataResult.data[0][6]);
            $("#email").val(dataResult.data[0][7]);
            $("#comercial").val(dataResult.data[0][8]);
            $("#obs").val(dataResult.data[0][9]);

        }
    });
});

$("#addForm").on('submit', function (e) {
    $("#oldNif").val(id);
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
    });
});