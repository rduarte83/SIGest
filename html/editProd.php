<?php include_once '../php/session.php'?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGest | Editar Produto</title>
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
                        <h1>Editar Produto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../index.php">Início</a></li>
                            <li class="breadcrumb-item active">Editar Produto</li>
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
                        <h3 class="card-title">Dados do Produto</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" id="addForm" action="produtos.php" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Cliente</label>
                                <div class="col-sm-10">
                                    <input type="text" id="cli" name="cliente_id" readonly class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Tipo</label>
                                <div class="col-sm-10">
                                    <input type="text" id="tipo" name="tipo" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Marca</label>
                                <div class="col-sm-10">
                                    <input type="text" id="marca" name="marca" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Modelo</label>
                                <div class="col-sm-10">
                                    <input type="text" id="modelo" name="modelo" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Número Série</label>
                                <div class="col-sm-10">
                                    <input type="text" id="num_serie" name="num_serie" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="op" value="editProd">
                            <a href="produtos.php">
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

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<script src="../js/editProd.js"></script>
</body>
</html>
