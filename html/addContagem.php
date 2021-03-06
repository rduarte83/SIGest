<div class="modal fade" id="newCount" tabindex="-1" role="dialog" aria-labelledby="Nova Contagem" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" id="addFormC" action="copia.php" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">Nova Contagem</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Contrato</label>
                        <div class="col-sm-10">
                            <select class="custom-select form-control" id="contrato" name="contrato_id"
                                    required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Data Contagem</label>
                        <div class="col-sm-10">
                            <input type="date" id="data" name="data_cont" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Contagem Preto</label>
                        <div class="col-sm-10">
                            <input type="number" id="contP" name="cont_p" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Contagem Cor</label>
                        <div class="col-sm-10">
                            <input type="number" id="contC" name="cont_c" class="form-control">
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="fact" name="fact" class="form-check-input">
                        <label class="form-check-label">Facturar</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="op" id="op" value="addCont">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success float-right">Confirmar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../js/addCont.js"></script>