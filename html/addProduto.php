<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="Novo Produto" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" id="addForm" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">Novo Produto</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Cliente</label>
                        <div class="col-sm-10">
                            <input type="text" id="cliente" name="cliente" class="form-control">
                            <input type="hidden" id="cliente_id" name="cliente_id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Tipo</label>
                        <div class="col-sm-10">
                            <input type="text" id="tipo" name="tipo" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Marca</label>
                        <div class="col-sm-10">
                            <input type="text" id="marca" name="marca" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Modelo</label>
                        <div class="col-sm-10">
                            <input type="text" id="modelo" name="modelo" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Número Série</label>
                        <div class="col-sm-10">
                            <input type="text" id="num_serie" name="num_serie" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="op" value="addProd">
                    <a href="produtos.php">
                        <button type="button" class="btn btn-default ">Cancelar</button>
                    </a>
                    <button type="submit" class="btn btn-success float-right">Confirmar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../js/addProd.js"></script>