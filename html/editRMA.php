<?php include_once '../php/session.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGest | Editar RMA</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/r-2.2.5/datatables.min.css"/>

    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include '../header.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar RMA</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../index.php">Início</a></li>
                            <li class="breadcrumb-item"><a href="rmas.php">Lista de RMAs</a></li>
                            <li class="breadcrumb-item active">Editar</li>
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
                        <h3 class="card-title">Dados do RMA</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="rmas.php" method="post" id="addForm" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body">
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
                                <label class="col-form-label col-sm-2">Data Envio</label>
                                <div class="col-sm-10">
                                    <input type="date" id="data_e" name="data_e" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Cliente</label>
                                <div class="col-sm-10">
                                    <input type="text" name="cliente" id="cli" class="form-control" readonly>
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
                                    <input type="text" id="num_f" name="num_f" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Data Factura</label>
                                <div class="col-sm-10">
                                    <input type="date" id="data_f" name="data_f" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Resolução</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="resolucao" name="resolucao" rows="8"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Observações</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="obs" name="obs" rows="8"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="op" value="editRMA">
                            <a href="cobrancas.php">
                                <button type="button" class="btn btn-default ">Cancelar</button>
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
<!-- ./wrapper -->

<script src="../js/editRma.js"></script>
</body>
</html>
