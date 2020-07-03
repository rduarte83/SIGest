<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGest | Detalhes</title>
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

    <link rel="stylesheet" href="../css/style.css">
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
                        <h1>Detalhes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/SIGest/index.php">Início</a></li>
                            <li class="breadcrumb-item"><a href="/SIGest/php/visitas.php">Listar Visitas</a></li>
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
                        <h3 class="card-title">Dados da Visita</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" id="addForm" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Id</label>
                                <div class="col-sm-10">
                                    <input type="name" id="id" name="id" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Cliente</label>
                                <div class="col-sm-10">
                                    <input type="name" id="cli" name="cliente_id" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Produto</label>
                                <div class="col-sm-10">
                                    <input type="name" id="prod" name="produto_id" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Última Visita</label>
                                <div class="col-sm-10">
                                    <input type="date" id="ult_vis" name="ult_vis" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Motivo</label>
                                <div class="col-sm-10">
                                    <input type="text" id="motivo" name="motivo" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Descrição</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="descricao" id="descricao" rows="8"
                                              readonly></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Técnico</label>
                                <div class="col-sm-10">
                                    <input type="text" id="tecnico" name="tecnico" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Próxima Visita</label>
                                <div class="col-sm-10">
                                    <input type="date" id="prox_vis" name="prox_vis" class="form-control" readonly>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="noprint">
                            <div class="card-footer">
                                <input type="hidden" name="op" value="addVis">
                                <a href="../index.php">
                                    <button type="button" class="btn btn-default">Cancelar</button>
                                </a>
                                <button type="submit" class="btn btn-success float-right">Confirmar</button>
                                <button type="button" class="btn btn-info float-right mr-3 fa fa-print"
                                        onclick="javascript:window.print()"> Imprimir
                                </button>
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
<script src="../js/details.js"></script>
</body>
</html>
