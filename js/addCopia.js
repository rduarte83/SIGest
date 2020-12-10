$("#radioC").on('change', function () {
    var selC = $("input[name='radioC']:checked").val();
    if (selC === 'new') {
        $("#existC").hide();
        $("#newC").show();
    } else {
        $("#existC").show();
        $("#newC").hide();
    }
});

$("#radioP").on('change', function () {
    var selP = $("input[name='radioP']:checked").val();
    if (selP === 'new') {
        $("#existP").hide();
        $("#newP").show();
    } else {
        $("#existP").show();
        $("#newP").hide();
    }
});

$(document).ready(function () {
    $("#newC").hide();
    $("#newP").hide();

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
                    $("#cli").val(ui.item.value);
                    $("#c_id").val(ui.item.id);
                }
            });
        }
    });

    //Fetch Comercial
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchCom',
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#comercial").html('<option value="0">Seleccionar Comercial</option>');
            $.each(dataResult.data, function () {
                $("#comercial").append($("<option/>").val(this[0]).text(this[1]));
            });
        }
    });

    //Fetch Product
    $("#cli").on('change', function () {
        //Fetch Product
        $.ajax({
            url: "../php/copia.php",
            type: "POST",
            data: {
                op: 'fetchProdCli',
                cliente_id: $("#c_id").val()
            },
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                $("#prod").html("");
                $("#prod").html('<option value="0">Seleccionar Produto</option>');
                $.each(dataResult.data, function () {
                    console.log(this);
                    $("#prod").append($("<option/>").val(this[0]).text(this[1] + " " +
                        this[2] + " " + this[3] + " " + this[4]));
                });
            }
        });
    });
});

//<!-- Add copia -->
$('#addForm').on('submit', function (e) {

    var selC = $("input[name='radioC']:checked").val();
    var selP = $("input[name='radioP']:checked").val();

    if (selC === 'new') {
        $('#op').val("addCopiaNC");

        console.log( $('#op').val() );

        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/copia.php"
        });
    } else if (selP === 'new') {
        $('#op').val("addCopiaNP");
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/copia.php"
        });
    } else {
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/copia.php",
        });
    }
});