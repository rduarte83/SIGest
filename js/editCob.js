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
            $("#cli").val(dataResult.data[0][1])
            $("#data").val(dataResult.data[0][2]);
            $("#mot").val(dataResult.data[0][3]);
            $("#descricao").val(dataResult.data[0][4]);
            $("#estado").val(dataResult.data[0][5]);
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