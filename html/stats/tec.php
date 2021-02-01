<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <label class="col-form-label col-sm-2">Seleccionar Mês</label>
                            <select class="custom-select form-control" id="periodo" name="periodo" required>
                            </select>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                <th>Assist HW</th>
                                <th>Assist SW</th>
                                <th>Assist HW Fact</th>
                                <th>Assist SW Fact</th>
                                <th>Manutenções</th>
                                <th>Instalações Imp</th>
                                <th>Instalações SW</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="chartT"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="js/stats/tec.js"></script>