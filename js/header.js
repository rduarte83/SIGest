$("#penmail").click(function () {
    $.ajax({
        url: "phpmailer/index.php",
        success: function () {
            alert("Email enviado com sucesso!")
        }
    });
});
