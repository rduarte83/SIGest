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
        success: function () {
            window.location.href = "../html/doc.php";
        }
    });
});


