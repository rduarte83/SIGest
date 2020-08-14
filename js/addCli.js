$(document).ready(function () {
    //Fetch Comercial
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchCom',
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);
            if (dataResult.data.length == 1) {
                $("#comercial").attr("readonly", true);
                $("#comercial").append($("<option/>").val(dataResult.data[0][0]).text(dataResult.data[0][1]));
            } else {
                $("#comercial").html('<option value="999">Seleccionar Comercial</option>');
                $.each(dataResult.data, function () {
                    $("#comercial").append($("<option/>").val(this[1]).text(this[1]));
                });
            }
        }
    });

});

//<!-- Add user -->
$("#addForm").on('submit', function (e) {
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
                if (param == "cal") window.location.href = "../html/addAssist.php?op=cal&cli=" + $("#nif").val();
                if (param == "ass") window.location.href = "../html/addAssist.php?op=ass&cli=" + $("#nif").val();
            } else window.location.href = "../html/clientes.php";
        }
    });
});