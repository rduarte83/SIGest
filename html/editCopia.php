<?php include_once '../php/session.php'?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGest | Editar Contrato de Cópia</title>
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
                        <h1>Editar Contrato</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/sigest/index.php">Início</a></li>
                            <li class="breadcrumb-item"><a href="copia.php">Contratos de Cópia</a></li>
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
                        <h3 class="card-title">Dados do Contrato</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="copia.php" id="addForm" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-10">
                                    <select class="custom-select form-control" name="estado" id="estado" required>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cliente</label>
                                <div class="col-sm-10">
                                    <select class="custom-select form-control" name="cliente_id" id="cli" required>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Equipamento</label>
                                <div class="col-sm-10">
                                    <select class="custom-select form-control" id="equip" name="produto" required>
                                        <option value="0">Seleccionar Equipamento</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Data de Início</label>
                                <div class="col-sm-10">
                                    <input type="date" id="inicio" name="inicio" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Data de Fim</label>
                                <div class="col-sm-10">
                                    <input type="date" id="fim" name="fim" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Tipo</label>
                                <div class="col-sm-10">
                                    <input type="text" id="tipo" name="tipo" class="form-control">
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
                                    <input type="number" id="inc" name="inc" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Custo Preto</label>
                                <div class="col-sm-10">
                                    <input type="number" step="0.0001" id="preco_p" name="preco_p" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Custo Cor</label>
                                <div class="col-sm-10">
                                    <input type="number" step="0.0001" id="preco_c" name="preco_c" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="op" value="editCopia">
                            <input type="hidden" name="id" id="id">
                            <a href="copia.php">
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

<script src="../js/editCopia.js"></script>
</body>
</html>
