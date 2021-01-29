$("#penmail").click(function () {
    $.ajax({
        url: "phpmailer/phpmailer.php",
        success: function (data) {
            alert('Email enviado');
        }
    });
});


