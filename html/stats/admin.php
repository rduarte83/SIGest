<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Início</a></li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-bold text-uppercase">Comerciais</div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <label class="col-form-label">Seleccionar Mês</label class="col-form-label">
                                    <select class="custom-select form-control" id="periodoMC" name="periodo" required>
                                    </select>
                                </div>
                                <div class="card-body">
                                    <table id="tableC" class="table table-bordered table-hover">
                                        <thead>
                                        <th>Comercial</th>
                                        <th>Contactos</th>
                                        <th>Entregas</th>
                                        <th>Clientes</th>
                                        <th>Eventos</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header text-bold text-uppercase">Eventos Pendentes</div>
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="col-form-label">Seleccionar
                                                Comercial</label class="col-form-label">
                                            <select class="custom-select form-control" id="periodoC" name="periodo"
                                                    required>
                                            </select>
                                        </div>
                                        <div class="card-body">
                                            <table id="tableCP" class="table table-bordered table-hover">
                                                <thead>
                                                <th>id</th>
                                                <th>Comercial</th>
                                                <th>Data</th>
                                                <th>Cliente</th>
                                                <th>Motivo</th>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header text-bold text-uppercase">Clientes sem Compras à mais de 2 meses</div>
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="col-form-label">Seleccionar
                                                Comercial</label class="col-form-label">
                                            <select class="custom-select form-control" id="periodoCompras"
                                                    name="periodo"
                                                    required>
                                            </select>
                                        </div>
                                        <div class="card-body">
                                            <div class="card">
                                                <table id="tableCompras" class="table table-bordered table-hover">
                                                    <thead>
                                                    <th>ID</th>
                                                    <th>Cliente</th>
                                                    <th>Comercial</th>
                                                    <th>Última Compra</th>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-bold text-uppercase">Contratos de Cópia a expirar em menos de 6 meses</div>
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
                        <div class="card-header text-bold text-uppercase">Contratos de Software a expirar em menos de 6 meses</div>
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
                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-bold text-uppercase">Técnicos</div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <label class="col-form-label">Seleccionar Mês</label>
                                    <select class="custom-select form-control" id="periodoMT" name="periodo" required>
                                    </select>
                                </div>
                                <div class="card-body">
                                    <table id="tableT" class="table table-bordered table-hover">
                                        <thead>
                                        <th>Técnico</th>
                                        <th>Assist HW</th>
                                        <th>Assist SW</th>
                                        <th>Assist HW Fact</th>
                                        <th>Assist SW Fact</th>
                                        <th>Manutenções</th>
                                        <th>Instalações Impressoras</th>
                                        <th>Instalações SW</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header text-bold text-uppercase">Assistências Pendentes</div>
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="col-form-label">Seleccionar
                                                Técnico</label class="col-form-label">
                                            <select class="custom-select form-control" id="periodoT" name="periodo"
                                                    required>
                                            </select>
                                        </div>
                                        <div class="card-body">
                                            <table id="tableTP" class="table table-bordered table-hover">
                                                <thead>
                                                <th>id</th>
                                                <th>Técnico</th>
                                                <th>Data</th>
                                                <th>Cliente</th>
                                                <th>Motivo</th>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                </div>
            </div>
        </div>
    </section>
</div>

<script src="js/stats/admin.js"></script>