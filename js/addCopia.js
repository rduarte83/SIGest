$(document).ready(function () {
    //Fetch Client
    $.ajax({
        url: "../php/copia.php",
        type: "POST",
        data: {
            op: 'fetchCli'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);
            $("#cli").html("");
            $("#cli").html('<option value="0">Seleccionar Cliente</option>');
            $.each(dataResult.data, function () {
                $("#cli").append($("<option/>").val(this[0]).text(this[1]));
            });
        }
    });
});

//<!-- Add visit -->
$('#addForm').on('submit', function () {
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/copia.php",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});