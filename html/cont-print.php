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
                        Email: geral@segimprima.pt
                    </div>
                </div>
                <div class="col-6">
                    <div class="row"><br></div>
                    <div class="row">
                        <div class="col-sm-4 text-bold"><h2>Contrato Nº:</h2></div>
                        <div class="col-sm-8"><h2 id="id"></h2></div>
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
                        <div class="col-sm-4 text-bold">Contacto:</div>
                        <div class="col-sm-8" id="contacto"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 text-bold">Email:</div>
                        <div class="col-sm-10" id="email"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 text-bold">NIF:</div>
                        <div class="col-sm-10" id="nif"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="col-sm-4 text-bold">Produto</div>
                    <div class="col-sm-8" id="prod"></div>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-4 text-bold">Num Série</div>
                    <div class="col-sm-8" id="num_serie"></div>
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
                    <div class="col-sm-4 text-bold">Última Visita</div>
                    <div class="col-sm-8" id="ult_vis"></div>
                </div>
                <div class="col-sm-4">
                    <div class="col-sm-4 text-bold">Próxima Visita</div>
                    <div class="col-sm-8" id="prox_vis"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-header text-bold">Descrição</div>
        <div class="card-body" id="descricao"></div>
    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- page script -->
<script src="../js/details-copia-print.js"></script>
</body>
</html>
