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

                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "copia.php") |
                (basename($_SERVER['PHP_SELF']) == "addCopia.php") |
                (basename($_SERVER['PHP_SELF']) == "addContagem.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link
                    <?= (basename($_SERVER['PHP_SELF']) == "copia.php") |
                    (basename($_SERVER['PHP_SELF']) == "addCopia.php") |
                    (basename($_SERVER['PHP_SELF']) == "addContagem.php")
                        ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-print"></i>
                        <p>Contratos de Cópia
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/sigest/html/copia.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "copia.php") ? "active" : ""; ?>">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Listar Contratos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addCopia.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addCopia.php") ? "active" : ""; ?>">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Novo Contrato</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addContagem.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addContagem.php") ? "active" : ""; ?>">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Nova Contagem</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "sw.php") |
                (basename($_SERVER['PHP_SELF']) == "addSw.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link
                    <?= (basename($_SERVER['PHP_SELF']) == "sw.php") |
                    (basename($_SERVER['PHP_SELF']) == "addSw.php")
                        ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-cutlery"></i>
                        <p>Contratos de Software
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview menu-open">
                        <li class="nav-item">
                            <a href="/sigest/html/sw.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "sw.php") ? "active" : ""; ?>">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Listar Contratos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addSw.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addSw.php") ? "active" : ""; ?>">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Novo Contrato</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "assistencias.php") |
                (basename($_SERVER['PHP_SELF']) == "addAssist.php") |
                (basename($_SERVER['PHP_SELF']) == "penAss.php") |
                (basename($_SERVER['PHP_SELF']) == "calAss.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link
                    <?= (basename($_SERVER['PHP_SELF']) == "assistencias.php") |
                    (basename($_SERVER['PHP_SELF']) == "addAssist.php") |
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
                            <a href="/sigest/html/assistencias.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "assistencias.php") ? "active" : ""; ?>">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Listar Assistências</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/penAss.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "penAss.php") ? "active" : ""; ?>">
                                <i class="nav-icon fa fa-history"></i>
                                <p>Assistências Pendentes</p>
                                <span class="badge badge-danger right" id="assPen"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addAssist.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addAssist.php") ? "active" : ""; ?>">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Nova Assistência</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "visitas.php") |
                (basename($_SERVER['PHP_SELF']) == "addVisita.php") |
                (basename($_SERVER['PHP_SELF']) == "calVis.php") |
                (basename($_SERVER['PHP_SELF']) == "penVis.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link
                    <?= (basename($_SERVER['PHP_SELF']) == "visitas.php") |
                    (basename($_SERVER['PHP_SELF']) == "addVisita.php") |
                    (basename($_SERVER['PHP_SELF']) == "calVis.php") |
                    (basename($_SERVER['PHP_SELF']) == "penVis.php")
                        ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Visitas
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview menu-open">
                        <li class="nav-item">
                            <a href="/sigest/html/calVis.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "calVis.php") ? "active" : ""; ?>">
                                <i class="fa fa-calendar nav-icon"></i>
                                <p>Calendário de Visitas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/visitas.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "visitas.php") ? "active" : ""; ?>">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Listar Visitas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/penVis.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "penVis.php") ? "active" : ""; ?>">
                                <i class="nav-icon fa fa-history"></i>
                                <p>Visitas em Atraso</p>
                                <span class="badge badge-danger right" id="visPen"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addVisita.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addVisita.php") ? "active" : ""; ?>">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Nova Visita</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "cobrancas.php") |
                (basename($_SERVER['PHP_SELF']) == "addCob.php") |
                (basename($_SERVER['PHP_SELF']) == "calCob.php") |
                (basename($_SERVER['PHP_SELF']) == "penCob.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link
                    <?= (basename($_SERVER['PHP_SELF']) == "cobrancas.php") |
                    (basename($_SERVER['PHP_SELF']) == "addCob.php") |
                    (basename($_SERVER['PHP_SELF']) == "calCob.php") |
                    (basename($_SERVER['PHP_SELF']) == "penCob.php")
                        ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-dollar"></i>
                        <p>Cobranças
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview menu-open">
                        <li class="nav-item">
                            <a href="/sigest/html/calCob.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "calCob.php") ? "active" : ""; ?>">
                                <i class="fa fa-calendar nav-icon"></i>
                                <p>Calendário de Cobranças</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/cobrancas.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "cobrancas.php") ? "active" : ""; ?>">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Listar Cobranças</p>
                            </a>
                        </li>
                        <!--<li class="nav-item">
                            <a href="/sigest/html/penCob.php"
                               class="nav-link <?/*= (basename($_SERVER['PHP_SELF']) == "penCob.php") ? "active" : ""; */?>">
                                <i class="nav-icon fa fa-history"></i>
                                <p>Cobranças Pendentes</p>
                                <span class="badge badge-danger right" id="visPen"></span>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="/sigest/html/addCob.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addCob.php") ? "active" : ""; ?>">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Nova Cobrança</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "clientes.php") |
                (basename($_SERVER['PHP_SELF']) == "addCli.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link
                    <?= (basename($_SERVER['PHP_SELF']) == "clientes.php") |
                    (basename($_SERVER['PHP_SELF']) == "addCli.php")
                        ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-address-card-o"></i>
                        <p>Clientes
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/sigest/html/clientes.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "clientes.php") ? "active" : ""; ?>">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Lista de Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addCli.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addCli.php") ? "active" : ""; ?>">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Novo Cliente</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "produtos.php") |
                (basename($_SERVER['PHP_SELF']) == "addProduto.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link
                    <?= (basename($_SERVER['PHP_SELF']) == "produtos.php") |
                    (basename($_SERVER['PHP_SELF']) == "addProduto.php")
                        ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>Produtos
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/sigest/html/produtos.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "produtos.php") ? "active" : ""; ?>">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Lista de Produtos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addProduto.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addProduto.php") ? "active" : ""; ?>">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Novo Produto</p>
                            </a>
                        </li>
                    </ul>
                </li>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.2.0/main.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.2.0/locales/pt.js"></script>
<!-- SweetAlert2 -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="/sigest/js/adminlte.min.js"></script>
<!-- Local Script -->
<script type="text/javascript" src="/sigest/js/header.js"></script>