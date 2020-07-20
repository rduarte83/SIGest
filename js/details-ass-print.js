$(document).ready(function () {
    var id = localStorage.getItem('id');
    var cliente = localStorage.getItem('cliente');
    var produto = localStorage.getItem('produto');
    var data_p = localStorage.getItem('data_p');
    var motivo = localStorage.getItem('motivo');
    var local = localStorage.getItem('local');
    var tecnico = localStorage.getItem('tecnico');
    var entregue = localStorage.getItem('entregue');
    var problema = localStorage.getItem('problema');
    var data_i = localStorage.getItem('data_i');
    var resolucao = localStorage.getItem('resolucao');
    var material = localStorage.getItem('material');
    var tempo = localStorage.getItem('tempo');
    var valor = localStorage.getItem('valor');
    var facturado = localStorage.getItem('facturado');
    var factura = localStorage.getItem('factura');
    var morada = localStorage.getItem('morada');
    var zona = localStorage.getItem('zona');
    var responsavel = localStorage.getItem('responsavel');
    var contacto = localStorage.getItem('contacto');

    $('#id').text(id);
    $('#cli').text(cliente);
    $('#morada').text(morada);
    $('#zona').text(zona);
    $('#resp').text(responsavel);
    $('#contacto').text(contacto);
    $('#data_p').text(data_p);
    $('#local').text(local);

    $('#motivo').text(motivo);
    $('#prod').text(produto);
    $('#tecnico').text(tecnico);

    $('#entregue').text(entregue);

    $('#problema').text(problema);

    $('#material').text(material);

    $('#resolucao').text(resolucao);

    $('#data_i').text(data_i);
    $('#tempo').text(tempo);
    $('#valor').text(valor);
});

