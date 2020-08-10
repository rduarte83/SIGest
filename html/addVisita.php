<?php include_once '../php/session.php'?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGest | Nova Visita</title>
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
                        <h1>Nova Visita</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../index.php">Início</a></li>
                            <li class="breadcrumb-item active">Nova Visita</li>
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
                    <form action="visitas.php" method="post" id="addForm" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Cliente</label>
                                <div class="col-sm-10">
                                    <input type="text" id="cli" name="cliente_id" class="form-control">
                                    <input type="hidden" id="c_id" name="c_id" class="form-control">
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
                                <label class="col-form-label col-sm-2">Última Visita</label>
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
                                <label class="col-form-label col-sm-2">Vendedor</label>
                                <div class="col-sm-10">
                                    <input type="text" id="vendedor" name="vendedor" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Técnico</label>
                                <div class="col-sm-10">
                                    <select name="tecnico" id="tecnico" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Próxima Visita</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" id="prox_vis" name="prox_vis" class="form-control" required>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="op" value="addVis">
                            <a href="../index.php">
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

<script src="../js/addVis.js"></script>

</body>
</html>
