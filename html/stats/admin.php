<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Estatísticas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                        <li class="breadcrumb-item active">Estatísticas</li>
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
                        <div class="card-header text-bold">Comerciais</div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <label class="col-form-label">Seleccionar Mês</label class="col-form-label">
                                    <select class="custom-select form-control" id="periodoC" name="periodo" required>
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
                                <div class="card-header text-bold">Eventos Pendentes</div>
                                <div class="card-body">
                                    <table id="tableCP" class="table table-bordered table-hover">
                                        <thead>
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
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-bold">Técnicos</div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <label class="col-form-label">Seleccionar Mês</label>
                                    <select class="custom-select form-control" id="periodoT" name="periodo" required>
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
                                <div class="card-header text-bold">Assistências Pendentes</div>
                                <div class="card-body">
                                    <table id="tableTP" class="table table-bordered table-hover">
                                        <thead>
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
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-bold">Cobranças Pendentes</div>
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
                        <div class="card-header text-bold">RMAs Pendentes</div>
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