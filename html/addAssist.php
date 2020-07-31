<?php include_once '../php/session.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGest | Nova Assistência Técnica</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- JQuery UI -->
    <link rel="stylesheet" href="../plugins/jquery-ui-1.12.1/jquery-ui.min.css">

    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="no-print">
    <div class="wrapper">
        <?php include '../header.php' ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Nova Assistência Técnica</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../index.php">Início</a></li>
                                <li class="breadcrumb-item active">Nova Assistência Técnica</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Dados da Assistência Técnica</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="assistencias.php" method="post" id="addForm" enctype="multipart/form-data"
                              class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Cliente</label>
                                    <a href="#" id="newCli" data-toggle="tooltip" title="Novo Cliente">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <div class="col-sm">
                                        <input type="text" id="cli" name="cliente_id" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Produto</label>
                                    <a href="#" id="newProd" data-toggle="tooltip" title="Novo Produto">
                                        <i class="fa fa-plus"></i>
                                    </a>
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
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="op" value="addAss">
                                <a href="../index.php">
                                    <button type="button" class="btn btn-default ">Cancelar</button>
                                </a>
                                <a href="#">
                                    <button type="button" id="t" class="btn btn-default ">Teste</button>
                                </a>
                                <button type="submit" class="btn btn-success float-right">Confirmar</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                    <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include '../footer.php' ?>
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
                            Rua Comandante Pinho e Freitas nº337<br>
                            3750-127 Águeda<br>
                            NIF: 508 726 655<br>
                            Tlf: 234 077 051<br>
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
                            <div class="col-sm-4 text-bold">Zona:</div>
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
                        <textarea style="resize: none" class="form-control" name="data_i" id="data_i-p"
                                  rows="1"></textarea>
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
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI-->
<script src="../plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
<!-- MomentJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<script src="../js/addAss.js"></script>
</body>
</html>
