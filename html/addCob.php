<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="Novo Produto" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" id="addForm" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">Nova Cobrança</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Estado</label>
                        <div class="col-sm-10">
                            <select name="estado" id="estado" class="form-control">
                                <option value="Resolvido">Resolvido</option>
                                <option value="Pendente">Pendente</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Cliente</label>
                        <div class="col-sm-10">
                            <input type="text" id="cli" name="cliente_id" class="form-control">
                            <input type="hidden" id="c_id" name="c_id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Data</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" id="data" name="data" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Motivo</label>
                        <div class="col-sm-10">
                            <select class="custom-select form-control" name="motivo" id="mot" required>
                                <option value="0">Seleccionar Motivo</option>
                                <option value="Cobrança">Cobrança</option>
                                <option value="Acompanhamento">Acompanhamento</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Descrição</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="descricao" id="descricao" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="form-group row new">
                        <label class="col-form-label col-sm-2">Nova Data</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" id="dataNew" name="dataNew" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="op" value="addCob">
                    <a href="cobrancas.php">
                        <button type="button" class="btn btn-default ">Cancelar</button>
                    </a>
                    <button type="submit" class="btn btn-success float-right">Confirmar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../js/addCob.js"></script>