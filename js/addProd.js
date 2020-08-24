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

            $("#cliente").autocomplete({
                source: dataResult,
                minLength: 2,
                select: function (event, ui) {
                    $("#cliente").val(ui.item.value);
                    $("#cliente_id").val(ui.item.id);
                }
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
                        cliente_id: $("#cliente_id").val()
                    },
                    success: function (dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        console.log(dataResult);
                        var prod_id = dataResult.data[0][0];

                        var search = new URLSearchParams(window.location.search);
                        if (search.has("op")) {
                            var param = search.get("op");
                            if (param == "cal") window.location.href = "../html/addAssist.php?op=cal&cli=" + $("#cliente_id").val() + "&prod=" + prod_id;
                            if (param == "ass") window.location.href = "../html/addAssist.php?op=ass&cli=" + $("#cliente_id").val() + "&prod=" + prod_id;
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
