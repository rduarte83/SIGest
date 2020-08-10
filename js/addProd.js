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
            var search = new URLSearchParams(window.location.search);

            $("#cli").html("");
            $("#cli").html('<option value="0">Seleccionar Cliente</option>');
            $.each(dataResult.data, function () {
                if (search.has("cli")) {
                    var param = search.get("cli");
                    $("#cli").val(param);
                };
                $("#cli").append($("<option/>").val(this[0]).text(this[2]));
            });

        }
    });

    //<!-- Add product -->
    $('#addForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/queries.php",
            success: function (dataResult) {
                $.ajax({
                    type: "post",
                    url: "../php/queries.php",
                    data: {
                        op: "fetchLastProd",
                        cliente_id: $("#cli").val()
                    },
                    success: function (dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        var prod_id = dataResult.data[0][0];

                        var search = new URLSearchParams(window.location.search);
                        if (search.has("op")) {
                            var param = search.get("op");
                            if (param == "cal") window.location.href = "../html/addAssist.php?op=cal&cli="+$("#cli").val()+"&prod="+prod_id;
                            if (param == "ass") window.location.href = "../html/addAssist.php?op=ass&cli="+$("#cli").val()+"&prod="+prod_id;
                        } else window.location.href = "../html/produtos.php";

                    }
                });
                if (dataResult.statusCode == 201) {
                    alert(dataResult);
                }
            }
        });
    });
});
