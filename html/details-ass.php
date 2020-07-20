<?php include_once '../php/session.php'?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>sigest | Detalhes da Assistência</title>
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
                        <h1>Detalhes da Assistência Técnica</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../index.php">Início</a></li>
                            <li class="breadcrumb-item"><a href="assistencias.php">Lista de Assistências</a></li>
                            <li class="breadcrumb-item active">Detalhes</li>
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
                    <form method="post" id="addForm" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Id</label>
                                <div class="col-sm-10">
                                    <input type="text" id="id" name="id" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Cliente</label>
                                <div class="col-sm-10">
                                    <input type="text" id="cli" name="cliente_id" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Produto</label>
                                <div class="col-sm-10">
                                    <input type="text" id="prod" name="produto_id" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Data Pedido</label>
                                <div class="col-sm-10">
                                    <input type="text" id="data_p" name="data_p" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Motivo</label>
                                <div class="col-sm-10">
                                    <input type="text" id="motivo" name="motivo" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Local</label>
                                <div class="col-sm-10">
                                    <input type="text" id="local" name="local" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Técnico</label>
                                <div class="col-sm-10">
                                    <input type="text" id="tecnico" name="tecnico" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Material Entregue</label>
                                <div class="col-sm-10">
                                    <input type="text" id="entregue" name="entregue" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Problema</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="problema" id="problema" rows="8"
                                              readonly></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Data Intervenção</label>
                                <div class="col-sm-10">
                                    <input type="text" id="data_i" name="data_i" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Resolucao do Problema</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="resolucao" id="resolucao" rows="8"
                                              readonly></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Material Usado</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="material" id="material" rows="5"
                                              readonly></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Tempo</label>
                                <div class="col-sm-10">
                                    <input type="number" id="tempo" name="tempo" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Valor</label>
                                <div class="col-sm-10">
                                    <input type="number" id="valor" name="valor" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Facturado</label>
                                <div class="col-sm-10">
                                    <input type="text" id="facturado" name="facturado" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Número de Factura</label>
                                <div class="col-sm-10">
                                    <input type="number" id="factura" name="factura" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="noprint">
                            <div class="card-footer">
                                <a href="assistencias.php">
                                    <button type="button" class="btn btn-default">Cancelar</button>
                                </a>
                                <a href="details-ass-print.php" id="print" target="_blank"
                                   class="btn btn-info float-right mr-3 fa fa-print">Imprimir</a>
                            </div>
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

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/r-2.2.5/datatables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
<!-- page script -->
<script src="../js/details-ass.js"></script>
</body>
</html>
