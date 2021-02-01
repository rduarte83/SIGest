$("#dRep").click(function () {
    $.ajax({
        url: "phpmailer/dRep.php",
        success: function () {
            alert("Relatório Diário enviado com sucesso!")
        }
    });
});

$("#mRep").click(function () {
    $.ajax({
        url: "phpmailer/mRep.php",
        success: function () {
            alert("Relatório Mensal enviado com sucesso!")
        }
    });
});