$(document).ready(function () {
    //Fetch Client
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchCli'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#cli").html("");
            $("#cli").html('<option value="0">Seleccionar Cliente</option>');
            $.each(dataResult.data, function () {
                $("#cli").append($("<option/>").val(this[0]).text(this[2]));
            });
        }
    });

    //<!-- Add product -->
    $('#addForm').on('submit', function () {
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/queries.php",
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 201) {
                    alert(dataResult);
                }
            }
        });
    });
});
