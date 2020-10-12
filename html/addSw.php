<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="Novo Produto" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" id="addForm" action="sw.php" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">Novo Contrato de Software</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Cliente</label>
                        <div class="col-sm-10">
                            <input type="text" id="cliente" name="cliente" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Software</label>
                        <div class="col-sm-10">
                            <select class="custom-select form-control" name="sw" id="sw">
                                <option value="Pix">Pix</option>
                                <option value="ZoneSoft">ZoneSoft</option>
                                <option value="Sage">Sage</option>
                                <option value="Kasperksy">Kasperksy</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Contrato</label>
                        <div class="col-sm-10">
                            <select class="custom-select form-control" name="contrato" id="contrato">
                                <option value="Aluguer">Aluguer</option>
                                <option value="Compra">Compra</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Valor</label>
                        <div class="col-sm-10">
                            <input type="text" id="valor" name="valor" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Periodicidade</label>
                        <div class="col-sm-10">
                            <select class="custom-select form-control" name="period" id="period">
                                <option value="Mensal">Mensal</option>
                                <option value="Trimestral">Trimestral</option>
                                <option value="Anual">Anual</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Data</label>
                        <div class="col-sm-10">
                            <input type="date" id="data" name="data" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Módulos</label>
                        <div class="col-sm-10">
                            <input type="text" id="modulos" name="modulos" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Postos Extra</label>
                        <div class="col-sm-10">
                            <input type="number" id="postos" name="postos" value="0" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="op" value="addSw">
                    <a href="sw.php">
                        <button type="button" class="btn btn-default ">Cancelar</button>
                    </a>
                    <button type="submit" class="btn btn-success float-right">Confirmar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../js/addSw.js"></script>