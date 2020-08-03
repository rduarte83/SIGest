var id = localStorage.getItem("id");

$(document).ready(function () {
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
        }
    });
});

$("#addForm").on('submit', function (e) {
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
    });
});