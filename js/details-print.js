$(document).ready(function () {
    var id = localStorage.getItem('id')
    var cliente = localStorage.getItem('cliente')
    var morada = localStorage.getItem('zona')
    var produto = localStorage.getItem('produto')
    var ult_vis = localStorage.getItem('ult_vis')
    var motivo = localStorage.getItem('motivo')
    var descricao = localStorage.getItem('descricao')
    var tecnico = localStorage.getItem('tecnico')
    var prox_vis = localStorage.getItem('prox_vis')
    var contacto = localStorage.getItem('contacto')
    var email = localStorage.getItem('email')

    $("#id").text(id);
    $("#cli").text(cliente);
    $("#morada").text(morada);
    $("#prod").text(produto);
    $("#ult_vis").text(ult_vis);
    $("#motivo").text(motivo);
    $("#descricao").text(descricao);
    $("#tecnico").text(tecnico);
    $("#prox_vis").text(prox_vis);
    $("#contacto").text(contacto);
    $("#email").text(email);
});

