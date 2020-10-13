var cob_id = localStorage.getItem("cob_id")

$(document).ready(function () {
    $.ajax({
        url: "../php/queries.php",
        type: "post",
        data: {
            cob_id: cob_id,
            op: 'fetchCobS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);

            $("#id").val(dataResult.data[0][0]);
            $("#data").val(dataResult.data[0][2]);
            $("#mot").val(dataResult.data[0][3]);
            $("#descricao").val(dataResult.data[0][4]);
            $("#estado").val(dataResult.data[0][5]);
            var cli_id = dataResult.data[0][6];

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
                        if (this[0] == cli_id) {
                            $("#cli").append($("<option/>").val(this[0]).text(this[2]).prop("selected", "selected"));
                        } else $("#cli").append($("<option/>").val(this[0]).text(this[2]));
                    });
                }
            });
        }
    });
});

$("#addForm").on('submit', function (e) {
    e.preventDefault();
    $("#id").val(cob_id);
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
        success: function (dataResult) {
            var search = new URLSearchParams(window.location.search);
            if (search.has("op")) {
                var param = search.get("op");
                if (param == "cal") window.location.href = "../html/calCob.php";
            } else window.location.href = "../html/cobrancas.php";
        }
    });
});