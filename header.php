<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/sigest/index.php" class="nav-link">Início</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <?php
        if ($_SESSION["role"] == "admin") {
            ?>
            <li class="nav-item">
                <a class="nav-link" id="dRep" href=#>Relatório Diário</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mRep" href=#>Relatório Mensal</a>
            </li>
            <?php
        }
        ?>
        <li class="nav-item">
            <a class="nav-link" href="/sigest/html/logout.php">Terminar Sessão</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/sigest/index.php" class="brand-link">
        <img src="/sigest/img/logo.png" alt="Logo" class="brand-image img-circle"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SIGest</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/sigest/img/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block"><?php echo ucfirst($_SESSION["username"]) ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/sigest/index.php"
                       class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "index.php") ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-tachometer"></i>
                        <p>Início</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/sigest/html/copia.php"
                       class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "copia.php") ? "active" : ""; ?>">
                        <i class="fa fa-print nav-icon"></i>
                        <p>Contratos de Cópia</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/sigest/html/sw.php"
                       class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "sw.php") ? "active" : ""; ?>">
                        <i class="fa fa-cutlery nav-icon"></i>
                        <p>Contratos de Software</p>
                    </a>
                </li>

                <li class="nav-item has-treeview
                    <?=
                (basename($_SERVER['PHP_SELF']) == "penAss.php") |
                (basename($_SERVER['PHP_SELF']) == "calAss.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link
                    <?=
                    (basename($_SERVER['PHP_SELF']) == "penAss.php") |
                    (basename($_SERVER['PHP_SELF']) == "calAss.php")
                        ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-wrench"></i>
                        <p>Assistências Técnicas
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview menu-open">
                        <li class="nav-item">
                            <a href="/sigest/html/calAss.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "calAss.php") ? "active" : ""; ?>">
                                <i class="fa fa-calendar nav-icon"></i>
                                <p>Calendário de Assistências</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/penAss.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "penAss.php") ? "active" : ""; ?>">
                                <i class="nav-icon fa fa-list"></i>
                                <p>Lista de Assistências</p>
                                <span class="badge badge-danger right" id="assPen"></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/sigest/html/horas.php"
                       class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "horas.php") ? "active" : ""; ?>">
                        <i class="fa fa-clock-o nav-icon"></i>
                        <p>Packs de Horas</p>
                    </a>
                </li>


                <?php
                if ($_SESSION["role"] == "comercial" || $_SESSION["role"] == "admin") {
                    ?>
                    <li class="nav-item has-treeview
                    <?=
                    (basename($_SERVER['PHP_SELF']) == "calVis.php") |
                    (basename($_SERVER['PHP_SELF']) == "visitas.php")
                        ? "menu-open" : ""; ?>">
                        <a href="#" class="nav-link
                    <?=
                        (basename($_SERVER['PHP_SELF']) == "calVis.php") |
                        (basename($_SERVER['PHP_SELF']) == "visitas.php")
                            ? "active" : ""; ?>">
                            <i class="nav-icon fa fa-user"></i>
                            <p>Eventos
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview menu-open">
                            <li class="nav-item">
                                <a href="/sigest/html/calVis.php"
                                   class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "calVis.php") ? "active" : ""; ?>">
                                    <i class="fa fa-calendar nav-icon"></i>
                                    <p>Calendário de Eventos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/sigest/html/visitas.php"
                                   class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "visitas.php") ? "active" : ""; ?>">
                                    <i class="nav-icon fa fa-list"></i>
                                    <p>Lista de Eventos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>

                <?php
                if ($_SESSION["role"] == "administrativo" || $_SESSION["role"] == "admin") {
                    ?>
                    <li class="nav-item">
                        <a href="/sigest/html/cobrancas.php"
                           class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "cobrancas.php") ? "active" : ""; ?>">
                            <i class="fa fa-eur nav-icon"></i>
                            <p>Cobranças</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/sigest/html/rmas.php"
                           class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "rmas.php") ? "active" : ""; ?>">
                            <i class="fa fa-ambulance nav-icon"></i>
                            <p>RMAs</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/sigest/html/doc.php"
                           class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "doc.php") ? "active" : ""; ?>">
                            <i class="fa fa-book nav-icon"></i>
                            <p>Documentação</p>
                        </a>
                    </li>
                    <?php ;
                }
                ?>

                <li class="nav-item">
                    <a href="/sigest/html/clientes.php"
                       class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "clientes.php") ? "active" : ""; ?>">
                        <i class="fa fa-address-card-o nav-icon"></i>
                        <p>Clientes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/sigest/html/produtos.php"
                       class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "produtos.php") ? "active" : ""; ?>">
                        <i class="fa fa-shopping-cart nav-icon"></i>
                        <p>Produtos</p>
                    </a>
                </li>

                <?php
                if ($_SESSION["role"] == "admin") {
                    ?>
                    <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "users.php") |
                    (basename($_SERVER['PHP_SELF']) == "auditoria.php") |
                    (basename($_SERVER['PHP_SELF']) == "addVendas.php")
                        ? "menu-open" : ""; ?>">
                        <a href="#" class="nav-link
                    <?= (basename($_SERVER['PHP_SELF']) == "users.php") |
                        (basename($_SERVER['PHP_SELF']) == "auditoria.php") |
                        (basename($_SERVER['PHP_SELF']) == "addVendas.php")
                            ? "active" : ""; ?>">
                            <i class="nav-icon fa fa-lock"></i>
                            <p>Administração
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/sigest/html/addVendas.php"
                                   class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addVendas.php") ? "active" : ""; ?>">
                                    <i class="fa fa-group nav-icon"></i>
                                    <p>Adicionar Vendas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/sigest/html/users.php"
                                   class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "users.php") ? "active" : ""; ?>">
                                    <i class="fa fa-group nav-icon"></i>
                                    <p>Utilizadores</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/sigest/html/auditoria.php"
                                   class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "auditoria.php") ? "active" : ""; ?>">
                                    <i class="fa fa-cogs nav-icon"></i>
                                    <p>Auditoria</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<!-- jQuery UI-->
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<!-- MomentJS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"
        integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg=="
        crossorigin="anonymous"></script>
<!-- DataTables -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/r-2.2.5/datatables.min.js"></script>
<!-- FullCalendar -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.3.2/main.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.3.2/locales/pt.js"></script>
<!-- SweetAlert2 -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Chart.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg=="
        crossorigin="anonymous"></script>
<!-- Chart.js labels plugin -->
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="/sigest/js/adminlte.min.js"></script>
<script src="/sigest/js/header.js"></script>