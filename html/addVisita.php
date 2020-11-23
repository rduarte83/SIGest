<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="Novo Produto" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" id="addForm" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">Novo Evento</h5>
                </div>
                <div class="modal-body">
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
                            <input type="datetime-local" id="ult_vis" name="ult_vis" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Motivo</label>
                        <div class="col-sm-10">
                            <select class="custom-select form-control" name="motivo_id" id="mot" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Descrição</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="descricao" id="descricao" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Comercial</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $_SESSION['username'] ?>" id="vendedor" name="vendedor"
                                   class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Técnico</label>
                        <div class="col-sm-10">
                            <select name="tecnico" id="tecnico" class="form-control"></select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Próximo Evento</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" id="prox_vis" name="prox_vis" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Motivo Próx. Evento</label>
                        <div class="col-sm-10">
                            <select class="custom-select form-control" name="motivo_id_prox" id="mot_prox" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Descrição Próx. Evento</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="descricao_prox" id="descricao_prox"
                                      rows="8"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Técnico Próx. Evento</label>
                        <div class="col-sm-10">
                            <select name="tecnico" id="tecnico_prox" class="form-control"></select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="op" value="addVis">
                    <a href="calVis.php">
                        <button type="button" class="btn btn-default ">Cancelar</button>
                    </a>
                    <button type="submit" class="btn btn-success float-right">Confirmar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../js/addVis.js"></script>