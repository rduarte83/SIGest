<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="Novo Produto" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" id="addForm" action="copia.php" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">Novo Contrato de Cópia</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Cliente</label>
                        <div class="col-sm-10">
                            <input type="text" id="cliente" name="cliente" class="form-control">
                            <input type="hidden" id="cliente_id" name="cliente_id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Equipamento</label>
                        <div class="col-sm-10">
                            <select class="custom-select form-control" id="equip" name="produto" required>
                                <option value="0">Seleccionar Equipamento</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Data de Início</label>
                        <div class="col-sm-10">
                            <input type="date" id="inicio" name="inicio" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Data de Fim</label>
                        <div class="col-sm-10">
                            <input type="date" id="fim" name="fim" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Tipo</label>
                        <div class="col-sm-10">
                            <select class="custom-select form-control" name="tipo" id="tipo" required>
                                <option value="mensal">Mensal</option>
                                <option value="trimestral">Trimestral</option>
                                <option value="anual">Anual</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Valor</label>
                        <div class="col-sm-10">
                            <input type="number" id="valor" step="0.01" name="valor" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Cópias Incluídas</label>
                        <div class="col-sm-10">
                            <input type="number" id="inc" name="inc" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Custo Preto</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.0001" id="preco_p" name="preco_p" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Custo Cor</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.0001" id="preco_c" name="preco_c" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Contagem Inicial Preto</label>
                        <div class="col-sm-10">
                            <input type="number" value="0" id="cont_p" name="cont_p" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Contagem Inicial Cor</label>
                        <div class="col-sm-10">
                            <input type="number" value="0" id="cont_c" name="cont_c" class="form-control"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="op" value="addCopia">
                    <a href="copia.php">
                        <button type="button" class="btn btn-default">Cancelar</button>
                    </a>
                    <button type="submit" class="btn btn-success float-right">Confirmar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../js/addCopia.js"></script>