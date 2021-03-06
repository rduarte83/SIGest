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

$(document).ready(function () {
    $("#newC").hide();

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

                    $.ajax({
                        url: "../php/queries.php",
                        type: "POST",
                        data: {
                            op: 'fetchProdCli',
                            cliente_id: $("#c_id").val()
                        },
                        success: function (dataResult) {
                            var dataResult = JSON.parse(dataResult);

                            $("#prod").html('<option value="0">Seleccionar Produto</option>');
                            $.each(dataResult.data, function () {
                                $("#prod").append($("<option/>").val(this[0]).text(this[1] + " " + this[2] + " " + this[3]));
                            });
                        }
                    });
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

    //Fetch Tecnicos
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchTec',
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#tecnico").html('<option value="0">Seleccionar Técnico</option>');
            $.each(dataResult.data, function () {
                $("#tecnico").append($("<option/>").val(this[0]).text(this[1]));
            });

            $("#tecnico_prox").html('<option value="0">Seleccionar Técnico</option>');
            $.each(dataResult.data, function () {
                $("#tecnico_prox").append($("<option/>").val(this[0]).text(this[1]));
            });
        }
    });

    //Fetch Motivo
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchMot'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#mot").html("");
            $("#mot").html('<option value="0">Seleccionar Motivo</option>');
            $.each(dataResult.data, function () {
                $("#mot").append($("<option/>").val(this[0]).text(this[1]));
            });

            $("#mot_prox").html("");
            $("#mot_prox").html('<option value="0">Seleccionar Motivo</option>');
            $.each(dataResult.data, function () {
                $("#mot_prox").append($("<option/>").val(this[0]).text(this[1]));
            });
        }
    });
});

//<!-- Add visit -->
$('#addForm').on('submit', function (e) {
    var selC = $("input[name='radioC']:checked").val();

    if (selC === 'new') {
        $('#op').val("addVisNC");

        console.log($('#op').val());

        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/queries.php",
        });
    } else {
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/queries.php",
        });
    }
});


