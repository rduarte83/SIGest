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

    $(".new").hide();
});

//<!-- Add cob -->
$('#addForm').on('submit', function (e) {
    e.preventDefault();
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

$("#estado").on('change', function () {
    console.log($("#estado").val());

    if ($("#estado").val() == 'Pendente') {
        $(".new").show();
    }
    if ($("#estado").val() == 'Resolvido') {
        $(".new").hide();
    }
});


