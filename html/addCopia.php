<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="Novo Produto" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" id="addForm" action="copia.php" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">Novo Contrato de Cópia</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row" id="radioC">
                        <label class="col-form-label col-sm-2">Cliente</label>
                        <div class="form-check col-sm-2">
                            <input class="form-check-input" type="radio" name="radioC" value="exist" checked>
                            <label class="form-check-label">Existente</label>
                        </div>
                        <div class="form-check col-sm-2">
                            <input class="form-check-input" type="radio" name="radioC" value="new">
                            <label class="form-check-label">Novo</label>
                        </div>
                    </div>
                    <div class="card" id="newC">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIF</label>
                                <div class="col-sm-10">
                                    <input type="number" id="nif" name="nif" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Id Sage</label>
                                <div class="col-sm-10">
                                    <input type="number" id="id" name="id" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" id="cliente" name="cliente" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Morada</label>
                                <div class="col-sm-10">
                                    <input type="text" id="morada" name="morada" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cód. Postal</label>
                                <div class="col-sm-10">
                                    <input type="text" id="zona" name="zona" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Responsável</label>
                                <div class="col-sm-10">
                                    <input type="text" id="responsavel" name="responsavel" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Contacto</label>
                                <div class="col-sm-10">
                                    <input type="tel" id="contacto" name="contacto" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Comercial</label>
                                <div class="col-sm-10">
                                    <select name="comercial" id="comercial" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="existC">
                        <label class="col-sm-2 col-form-label">Cliente</label>
                        <div class="col-sm-10">
                            <input type="text" id="cli" name="cliente_id" class="form-control">
                            <input type="hidden" id="c_id" name="c_id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row" id="radioP">
                        <label class="col-form-label col-sm-2">Produto</label>
                        <div class="form-check col-sm-2">
                            <input class="form-check-input" type="radio" name="radioP" value="exist" checked>
                            <label class="form-check-label">Existente</label>
                        </div>
                        <div class="form-check col-sm-2">
                            <input class="form-check-input" type="radio" name="radioP" value="new">
                            <label class="form-check-label">Novo</label>
                        </div>
                    </div>
                    <div class="form-group row" id="existP">
                        <label class="col-form-label col-sm-2">Produto</label>
                        <div class="col-sm">
                            <select class="custom-select form-control" id="prod" name="produto_id" required>
                                <option value="0">Seleccionar Produto</option>
                            </select>
                        </div>
                    </div>
                    <div class="card" id="newP">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Tipo</label>
                                <div class="col-sm-10">
                                    <input type="text" id="tipo" name="tipo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Marca</label>
                                <div class="col-sm-10">
                                    <input type="text" id="marca" name="marca" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Modelo</label>
                                <div class="col-sm-10">
                                    <input type="text" id="modelo" name="modelo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Número Série</label>
                                <div class="col-sm-10">
                                    <input type="text" id="num_serie" name="num_serie" class="form-control">
                                </div>
                            </div>
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
                            <select class="custom-select form-control" name="tipoC" id="tipoC" required>
                                <option value="mensal">Mensal</option>
                                <option value="trimestral">Trimestral</option>
                                <option value="anual">Anual</option>
                                <option value="renting">Renting</option>
                                <option value="cliente">Cliente</option>
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
                <div class="card-footer">
                    <input type="hidden" id="op" name="op" value="addCopia">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success float-right">Confirmar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../js/addCopia.js"></script>