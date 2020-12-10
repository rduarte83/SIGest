<div class="modal fade" id="new" tabindex="-1"  role="dialog" aria-labelledby="Novo RMA" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" id="addForm" action="rmas.php" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">Novo RMA</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Data Envio</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" id="data_e" name="data_e" class="form-control" required>
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
                        <label class="col-form-label col-sm-2">Produto</label>
                        <div class="col-sm-10">
                            <input type="text" id="produto" name="produto" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Fornecedor</label>
                        <div class="col-sm-10">
                            <input type="text" id="fornecedor" name="fornecedor" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Núm. Série</label>
                        <div class="col-sm-10">
                            <input type="text" id="num_serie" name="num_serie" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Motivo</label>
                        <div class="col-sm-10">
                            <input type="text" id="motivo" name="motivo" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Núm. Factura</label>
                        <div class="col-sm-10">
                            <input type="text" id="num_factura" name="num_factura" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Data Factura</label>
                        <div class="col-sm-10">
                            <input type="date" id="data_factura" name="data_factura" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Resolução</label>
                        <div class="col-sm-10">
                            <input type="text" id="resolucao" name="resolucao" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Observações</label>
                        <div class="col-sm-10">
                            <input type="text" id="obs" name="obs" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="op" value="addRMA">
                    <a href="RMAs.php">
                        <button type="button" class="btn btn-default ">Cancelar</button>
                    </a>
                    <button type="submit" class="btn btn-success float-right">Confirmar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../js/addRMA.js"></script>