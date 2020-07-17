<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>sigest | Adicionar Assistência Técnica</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                        <h1>Nova Assistência Técnica</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../index.php">Início</a></li>
                            <li class="breadcrumb-item active">Adicionar Assistência Técnica</li>
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
                                <label class="col-form-label col-sm-2">Cliente</label>
                                <div class="col-sm-10">
                                    <select class="custom-select form-control" id="cli" name="cliente_id" required>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Produto</label>
                                <div class="col-sm-10">
                                    <select class="custom-select form-control" id="prod" name="produto_id" required>
                                        <option value="0">Seleccionar Produto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Data do Pedido</label>
                                <div class="col-sm-10">
                                    <input type="date" id="data_p" name="data_p" class="form-control" required>
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
                                <label class="col-form-label col-sm-2">Problema</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="problema" id="problema" rows="8"
                                              required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Técnico</label>
                                <div class="col-sm-10">
                                    <input type="text" id="tecnico" name="tecnico" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="op" value="addAss">
                            <a href="../index.php">
                                <button type="button" class="btn btn-default ">Cancelar</button>
                            </a>
                            <button type="submit" class="btn btn-success float-right">Confirmar</button>
                            <a href="details-print.php" id="print" target="_blank"
                               class="btn btn-info float-right mr-3 fa fa-print">Imprimir</a>
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
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<script src="../js/addAss.js"></script>
</body>
</html>
