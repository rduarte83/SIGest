<?php include_once '../php/session.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGest | Detalhes da Assistência</title>
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
                            <h1>Detalhes da Assistência Técnica</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../index.php">Início</a></li>
                                <li class="breadcrumb-item"><a href="penAss.php">Lista de Assistências</a></li>
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
                                    <label class="col-sm-2 col-form-label">Cliente</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select form-control" name="cliente_id" id="cli" readonly>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Produto</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select form-control" id="prod" name="produto" readonly>
                                        </select>
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
                                        <select class="custom-select form-control" id="tecnico" name="tecnico" readonly>
                                        </select>
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
                                    <label class="col-form-label col-sm-2">Observações</label>
                                    <div class="col-sm-10">
                                    <textarea class="form-control" name="obs" id="obs" rows="3"
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
                                    <label class="col-form-label col-sm-2">Estado</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="estado" name="estado" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Facturado</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="facturado" name="facturado" class="form-control"
                                               readonly>
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
                            <div class="card-footer">
                                <input type="hidden" name="op" value="editAss">
                                <a href="penAss.php">
                                    <button type="button" class="btn btn-default">Cancelar</button>
                                </a>
                                <a href="#" id="print" target="_blank"
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
                            <div class="col-sm-4 text-bold">Cód. Postal:</div>
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
                    <div class="col-sm-4 text-bold">Observações</div>
                    <textarea style="resize: none" class="form-control" name="obs" id="obs-p"
                              rows="2"></textarea>
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

<script src="../js/editAss.js"></script>
</body>
</html>
