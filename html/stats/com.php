<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <label class="col-form-label">Seleccionar Mês</label>
                            <select class="custom-select form-control" id="periodo" name="periodo" required>
                            </select>
                        </div>
                        <div class="card-body">

                            <table id="tableStats" class="table table-bordered table-hover">
                                <thead>
                                <th>Novos Contactos</th>
                                <th>Num Vendas</th>
                                <th>Novos Clientes</th>
                                <th>Eventos Pendentes</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <!-- Insert Content Here -->
                            <canvas id="chart"></canvas>
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <b>Eventos Pendentes</b>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                <th>Id</th>
                                <th>Cliente</th>
                                <th>Ultima Visita</th>
                                <th>Motivo</th>
                                <th>Comercial</th>
                                <th>Descrição</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">

                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="js/stats/com.js"></script>
<script src="js/penVis.js"></script>