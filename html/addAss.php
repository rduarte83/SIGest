<div class="no-print">
    <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="Novo Produto" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form action="calAss.php" method="post" id="addForm" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-bold">Nova Assistência</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2">Cliente</label>
                            <div class="col-sm">
                                <input type="text" id="cli" name="cliente_id" class="form-control">
                                <input type="hidden" id="c_id" name="c_id" class="form-control">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2">Produto</label>
                            <div class="col-sm">
                                <select class="custom-select form-control" id="prod" name="produto_id" required>
                                    <option value="0">Seleccionar Produto</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2">Data do Pedido</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" id="data_p" name="data_p" class="form-control"
                                       required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2">Motivo</label>
                            <div class="col-sm-10">
                                <select class="custom-select form-control" name="motivo" id="mot" required>
                                    <option value="0">Seleccionar Motivo</option>
                                    <option value="Manutenção">Manutenção</option>
                                    <option value="Assistência de Hardware">Assistência de Hardware</option>
                                    <option value="Assistência de Software">Assistência de Software</option>
                                    <option value="Instalação de Impressora a Contrato">Instalação de Impressora a
                                        Contrato
                                    </option>
                                    <option value="Instalação de Software">Instalação de Software</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2">Local</label>
                            <div class="col-sm-10">
                                <select class="custom-select form-control" name="local" id="local" required>
                                    <option value="0">Seleccionar Local</option>
                                    <option value="Cliente">Cliente</option>
                                    <option value="Loja 1">Loja 1</option>
                                    <option value="Loja 2">Loja 2</option>
                                    <option value="Loja 3">Loja 3</option>
                                    <option value="Assistência Remota">Assistência Remota</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2">Técnico</label>
                            <div class="col-sm-10">
                                <select name="tecnico" id="tecnico" class="form-control" required></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2">Material Entregue</label>
                            <div class="col-sm-10">
                                        <textarea class="form-control" name="entregue" id="entregue"
                                                  rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2">Problema</label>
                            <div class="col-sm-10">
                                    <textarea class="form-control" name="problema" id="problema" rows="8"
                                              required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2">Observações</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="obs" id="obs" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2">Data da Intervenção</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" id="data_i" name="data_i" class="form-control"
                                       required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2">Prioridade</label>
                            <div class="col-sm-10">
                                <select class="custom-select form-control" name="prio" id="prio" required>
                                    <option value="0">Seleccionar Prioridade</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Baixa">Baixa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="op" value="addAss">
                        <a href="calAss.php">
                            <button type="button" class="btn btn-default ">Cancelar</button>
                        </a>
                        <button type="submit" class="btn btn-success float-right">Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="print">
    <div class="wrapper">
        <!-- Main content -->
        <div class="card-body">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <img class="w-75" style="filter: grayscale(100%)" src="../img/logo.png" alt="logo">
                        <div>
                            Rua Eng. José Bastos Xavier nº33<br>
                            3750-144 Águeda<br>
                            NIF: 508 726 655<br>
                            Telefone: 234 077 051<br>
                            Email: tecnica@segimprima.pt
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row"></div>
                        <div class="row">
                            <div class="col-sm-8 text-bold"><h2>Assistência Nº:</h2></div>
                            <div class="col-sm-4"><h2 id="id-p"></h2></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-bold">Cliente:</div>
                            <div class="col-sm-8" id="cli-p"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-bold">Morada:</div>
                            <div class="col-sm-8" id="morada-p"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-bold">Cód. Postal:</div>
                            <div class="col-sm-8" id="zona-p"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-bold">Responsável:</div>
                            <div class="col-sm-8" id="resp-p"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-bold">Contacto:</div>
                            <div class="col-sm-8" id="contacto-p"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-bold">Data do Pedido:</div>
                            <div class="col-sm-8" id="data_p-p"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-bold">Local:</div>
                            <div class="col-sm-8" id="local-p"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="col-sm-4 text-bold">Motivo</div>
                        <div class="col-sm-8" id="motivo-p"></div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-4 text-bold">Produto</div>
                        <div class="col-sm-8" id="prod-p"></div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-4 text-bold">Técnico</div>
                        <div class="col-sm-8" id="tecnico-p"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4 text-bold">Descrição do Problema</div>
                        <div class="col-sm-8" id="problema-p"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-bold">Observações</div>
                    <textarea style="resize: none" class="form-control" name="obs" id="obs-p"
                              rows="2"></textarea>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4 text-bold">Material Entregue</div>
                        <div class="col-sm-8" id="entregue-p"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-bold">Resolução do Problema</div>
                    <textarea style="resize: none" class="form-control" name="resolucao" id="resolucao-p"
                              rows="5"></textarea>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-bold">Material Usado</div>
                    <textarea style="resize: none" class="form-control" name="valor" id="material-p"
                              rows="2"></textarea>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="col-sm text-bold">Data Intervenção</div>
                        <div class="form-control" name="data_i" id="data_i-p"></div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-4 text-bold">Tempo</div>
                        <textarea style="resize: none" class="form-control" name="tempo" id="tempo-p"
                                  rows="1"></textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-4 text-bold">Valor</div>
                        <textarea style="resize: none" class="form-control" name="valor" id="valor-p"
                                  rows="1"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="col-sm text-bold">Assinatura do Técnico</div>
                        <textarea style="resize: none" class="form-control" rows="1"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <div class="col-sm text-bold">Assinatura do Cliente</div>
                        <textarea style="resize: none" class="form-control" rows="1"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/addAss.js"></script>