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
});

//Fetch Product
$("#cli").on('change', function () {
    //Fetch Product
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchProdCli',
            cliente_id: $("#cli").val()
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult);
            $("#prod").html('<option value="0">Seleccionar Produto</option>');
            $.each(dataResult.data, function () {
                console.log(this);
                $("#prod").append($("<option/>").val(this[0]).text(this[1] + " " + this[2] + " " + this[3]));
            });
        }
    });
});

//<!-- Add assist -->
$('#addForm').on('submit', function (e) {
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
        success: function (dataResult) {

            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});




