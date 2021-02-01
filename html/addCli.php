<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="Novo Produto" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" id="addForm" enctype="multipart/form-data" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold">Novo Cliente</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIF</label>
                        <div class="col-sm-10">
                            <input type="number" id="nif" name="nif" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Id</label>
                        <div class="col-sm-10">
                            <input type="number" id="id" name="id" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" id="cliente" name="cliente" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Morada</label>
                        <div class="col-sm-10">
                            <input type="text" id="morada" name="morada" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Cód. Postal</label>
                        <div class="col-sm-10">
                            <input type="text" id="zona" name="zona" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Responsável</label>
                        <div class="col-sm-10">
                            <input type="text" id="responsavel" name="responsavel" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Contacto</label>
                        <div class="col-sm-10">
                            <input type="tel" id="contacto" name="contacto" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Comercial</label>
                        <div class="col-sm-10">
                            <?php
                            if ($_SESSION["role"] != "comercial") {
                                ?>
                                <select name="comercial" id="comercial" class="form-control">
                                </select>
                                <?php
                            } else {
                                ?>
                                <input type="text" value="<?php echo $_SESSION['username'] ?>" id="comercial"
                                       name="comercial"
                                       class="form-control" readonly>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="op" value="addCli">
                    <a href="clientes.php">
                        <button type="button" class="btn btn-default ">Cancelar</button>
                    </a>
                    <button type="submit" class="btn btn-success float-right">Confirmar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../js/addCli.js"></script>
