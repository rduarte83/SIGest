$(document).ready(function () {
    //Fetch Clientes - autocomplete
    $.ajax({
        type: 'post',
        url: '../php/queries.php',
        data: {
            op: 'fetchCliAuto',
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);

            $("#cliente").autocomplete({
                source: dataResult,
                minLength: 2,
                select: function (event, ui) {
                    $("#cliente").val(ui.item.value);
                    $("#cliente_id").val(ui.item.id);
                }
            });
        }
    });

    //<!-- Add horas -->
    $('#addForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/queries.php"
        });
    });
});
