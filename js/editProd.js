var id = localStorage.getItem("id");
$("#prod_id").val(id);

$(document).ready(function () {
    $.ajax({
        url: "../php/queries.php",
        type: "post",
        data: {
            id: id,
            op: 'fetchProdS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);

            $("#cli").val(dataResult.data[0][5]);
            $("#tipo").val(dataResult.data[0][1]);
            $("#marca").val(dataResult.data[0][2]);
            $("#modelo").val(dataResult.data[0][3]);
            $("#num_serie").val(dataResult.data[0][4]);
            var cli_id = dataResult.data[0][6]

            //Fetch Client
            $.ajax({
                url: "../php/copia.php",
                type: "POST",
                data: {
                    op: 'fetchCli'
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    $("#cli").html("");
                    $("#cli").html('<option value="0">Seleccionar Cliente</option>');
                    $.each(dataResult.data, function () {
                        if (this[0] == cli_id) {
                            $("#cli").append($("<option/>").val(this[0]).text(this[1]).prop("selected", "selected"));
                        } else $("#cli").append($("<option/>").val(this[0]).text(this[1]));
                    });
                }
            });
        }
    });
});

$("#addForm").on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
    });
});