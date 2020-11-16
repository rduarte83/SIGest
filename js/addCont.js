$(document).ready(function () {
    //Fetch Contracto
    $.ajax({
        url: "../php/copia.php",
        type: "POST",
        data: {
            op: 'fetchContrato'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#contrato").html("");
            $("#contrato").html('<option value="0">Seleccionar Contrato</option>');
            $.each(dataResult.data, function () {
                $("#contrato").append($("<option/>").val(this[0]).text(this[1] + " - " +
                    this[2] + " " + this[3] + " " + this[4]));
            });
        }
    });
});

$("#fact").on('click', function () {
    if ($("#fact").prop("checked"))
        $("#op").val("addContFact");
    else $("#op").val("addCont");
});

$('#addFormC').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/copia.php",
        success: function (dataResult) {
            if ($("#op").val() == "addCont") window.location.href = "copia.php";
            else {
                var dataResult = JSON.parse(dataResult);
                console.log(dataResult);
                var contrato_id = $("#contrato option:selected").val()
                var cont_p = $("#contP").val();
                var cont_c = $("#contC").val();
                var ult_p = dataResult.data[0][0];
                var ult_c = dataResult.data[0][1];
                var valor = dataResult.data[0][2];
                var inc = dataResult.data[0][3];
                var preco_p = dataResult.data[0][4];
                var preco_c = dataResult.data[0][5];
                var total_p = (cont_p - ult_p - inc) * preco_p;
                var total_c = (cont_c - ult_c) * preco_c;
                var total = Number(total_p) + Number(total_c);
                if (total<0) total = 0;
                console.log("Total: " + total);

                Swal.fire({
                    position: 'top',
                    title: 'Valor a Facturar',
                    text: total + " €",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: 'Imprimir',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then(function (result) {
                    if (result.value) window.location = "../html/cont-print.php.php";
                    else window.location = "../html/copia.php";
                });

                $.ajax({
                    url: "../php/copia.php",
                    type: "post",
                    data: {
                        op: 'addTotal',
                        contrato_id: contrato_id,
                        total: total
                    },
                    success: function (dataResult) {
                        if (dataResult.statusCode == 201) {
                            alert(dataResult);
                        }
                    }
                });
                if (dataResult.statusCode == 201) {
                    alert(dataResult);
                }
            }
        }
    });
});
