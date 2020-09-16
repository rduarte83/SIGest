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
            $("#comercial").html('<option value="999">Seleccionar Comercial</option>');
            $.each(dataResult.data, function () {
                $("#comercial").append($("<option/>").val(this[1]).text(this[1]));
            });
        }
    });

    //<!-- Add vendas -->
    $('#addForm').on('submit', function () {
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/queries.php",
        });
    });
});
