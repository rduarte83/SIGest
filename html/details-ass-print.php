<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>sigest | Imprimir Detalhes</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="../css/print.css">

</head>
<body>
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
                        <div class="col-sm-4"><h2 id="id"></h2></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-bold">Cliente:</div>
                        <div class="col-sm-8" id="cli"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-bold">Morada:</div>
                        <div class="col-sm-8" id="morada"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-bold">Zona:</div>
                        <div class="col-sm-8" id="zona"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-bold">Responsável:</div>
                        <div class="col-sm-8" id="resp"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-bold">Contacto:</div>
                        <div class="col-sm-8" id="contacto"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-bold">Data do Pedido:</div>
                        <div class="col-sm-8" id="data_p"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-bold">Local:</div>
                        <div class="col-sm-8" id="local"></div>
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
                    <div class="col-sm-8" id="motivo"></div>
                </div>
                <div class="col-sm-4">
                    <div class="col-sm-4 text-bold">Produto</div>
                    <div class="col-sm-8" id="prod"></div>
                </div>
                <div class="col-sm-4">
                    <div class="col-sm-4 text-bold">Técnico</div>
                    <div class="col-sm-8" id="tecnico"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-4 text-bold">Descrição do Problema</div>
                    <div class="col-sm-8" id="problema"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-4 text-bold">Material Entregue</div>
                    <div class="col-sm-8" id="entregue"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 text-bold">Resolução do Problema</div>
                <textarea style="resize: none" class="form-control" name="resolucao" id="resolucao" rows="5"></textarea>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 text-bold">Material Usado</div>
                <textarea style="resize: none" class="form-control" name="valor" id="material" rows="2"></textarea>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="col-sm text-bold">Data Intervenção</div>
                    <textarea style="resize: none" class="form-control" name="data_i" id="data_i" rows="1"></textarea>
                </div>
                <div class="col-sm-4">
                    <div class="col-sm-4 text-bold">Tempo</div>
                    <textarea style="resize: none" class="form-control" name="tempo" id="tempo" rows="1"></textarea>
                </div>
                <div class="col-sm-4">
                    <div class="col-sm-4 text-bold">Valor</div>
                    <textarea style="resize: none" class="form-control" name="valor" id="valor" rows="1"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="col-sm text-bold">Assinatura Técnico</div>
                    <textarea style="resize: none" class="form-control" name="data_i" id="data_i" rows="1"></textarea>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm text-bold">Assinatura Cliente</div>
                    <textarea style="resize: none" class="form-control" name="data_i" id="data_i" rows="1"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- page script -->
<script src="../js/details-ass-print.js"></script>
</body>
</html>
