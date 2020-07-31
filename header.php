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
                    <a href="/sigest/index.php" class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "index.php") ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-tachometer"></i>
                        <p>Início</p>
                    </a>
                </li>

                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "addCliente.php") |
                (basename($_SERVER['PHP_SELF']) == "addProduto.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>Novo
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/sigest/html/addCliente.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addCliente.php") ? "active" : ""; ?>">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Cliente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addProduto.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addProduto.php") ? "active" : ""; ?>">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Produto</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "copia.php") |
                (basename($_SERVER['PHP_SELF']) == "addCopia.php") |
                (basename($_SERVER['PHP_SELF']) == "addContagem.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-print"></i>
                        <p>Contratos de Cópia
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/sigest/html/copia.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "copia.php") ? "active" : ""; ?>">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Listar Contratos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addCopia.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addCopia.php") ? "active" : ""; ?>">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Novo Contrato</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addContagem.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addContagem.php") ? "active" : ""; ?>">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Nova Contagem</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "sw.php") |
                (basename($_SERVER['PHP_SELF']) == "addSw.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-usd"></i>
                        <p>Contratos de Software
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview menu-open">
                        <li class="nav-item">
                            <a href="/sigest/html/sw.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "sw.php") ? "active" : ""; ?>">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Listar Contratos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addSw.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addSw.php") ? "active" : ""; ?>">
                                <i class="fa fa-circle nav-icon"></i>
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
                    <a href="#" class="nav-link">
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
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Listar Assistências</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/penAss.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "penAss.php") ? "active" : ""; ?>">
                                <i class="nav-icon fa fa-circle"></i>
                                <p>Assistências Pendentes</p>
                                <span class="badge badge-danger right" id="assPen"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addAssist.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addAssist.php") ? "active" : ""; ?>">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Nova Assistência</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "visitas.php") |
                        (basename($_SERVER['PHP_SELF']) == "addVisita.php") |
                        (basename($_SERVER['PHP_SELF']) == "calVis.php") |
                        (basename($_SERVER['PHP_SELF']) == "pendentes.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Visitas a Clientes
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
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Listar Visitas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/pendentes.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "pendentes.php") ? "active" : ""; ?>">
                                <i class="nav-icon fa fa-circle"></i>
                                <p>Visitas Pendentes</p>
                                <span class="badge badge-danger right" id="visPen"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/addVisita.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "addVisita.php") ? "active" : ""; ?>">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Nova Visita</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview
                    <?= (basename($_SERVER['PHP_SELF']) == "clientes.php") |
                (basename($_SERVER['PHP_SELF']) == "produtos.php")
                    ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-table"></i>
                        <p>Listas
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/sigest/html/clientes.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "clientes.php") ? "active" : ""; ?>">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sigest/html/produtos.php"
                               class="nav-link <?= (basename($_SERVER['PHP_SELF']) == "produtos.php") ? "active" : ""; ?>">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Produtos</p>
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
<script src="/sigest/plugins/jquery/jquery.min.js"></script>

<script src="/sigest/js/header.js"></script>