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

            $("#cli").autocomplete({
                source: dataResult,
                minLength: 2,
                select: function (event, ui) {
                    $("#cli").val(ui.item.id);
                    $("#c_id").val(ui.item.id);
                }
            });
        }
    });
});

//<!-- Add RMA -->
$('#addForm').on('submit', function (e) {
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
    });
});


