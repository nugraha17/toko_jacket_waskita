<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-primary navbar-badge"><?= $pesanan_masuk_notif ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">Pesanan Masuk</span>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('admin/pesanan_masuk') ?>" class="dropdown-item">
                            <i class="fas fa-download"></i> <?= $pesanan_masuk_notif ?> Pesanan Masuk Belum Bayar
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->