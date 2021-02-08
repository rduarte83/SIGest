<div class="content-wrapper">
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
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-bold text-uppercase">Cobranças Pendentes</div>
                        <div class="card-body">
                            <table id="tableCobP" class="table table-bordered table-hover">
                                <thead>
                                <th>Cliente</th>
                                <th>Data</th>
                                <th>Motivo</th>
                                <th>Descrição</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-bold text-uppercase">RMAs Pendentes</div>
                        <div class="card-body">
                            <table id="tableRmaP" class="table table-bordered table-hover">
                                <thead>
                                <th>Cliente</th>
                                <th>Data</th>
                                <th>Motivo</th>
                                <th>Descrição</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-bold text-uppercase">Documentação Pendente</div>
                        <div class="card-body">
                            <table id="tableDoc" class="table table-bordered table-hover">
                                <thead>
                                <th>id</th>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Motivo</th>
                                <th>Descrição</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-bold text-uppercase">Contratos de Cópia a expirar em menos de 6
                            meses
                        </div>
                        <div class="card-body">
                            <table id="tableCopiaP" class="table table-bordered table-hover">
                                <thead>
                                <th>Início</th>
                                <th>Fim</th>
                                <th>Cliente</th>
                                <th>Produto</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-bold text-uppercase">Contratos de Software a expirar em menos de 6
                            meses
                        </div>
                        <div class="card-body">
                            <table id="tableSWP" class="table table-bordered table-hover">
                                <thead>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>SW</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<script src="js/stats/admin.js"></script>