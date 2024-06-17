<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ADI-SEWAKOS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>assets/img/favicon.png" rel="icon">
    <link href="<?= base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/vndr/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vndr/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vndr/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vndr/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vndr/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vndr/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vndr/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="<?= base_url(); ?>assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">ADI-SEWAKOS</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= session('username') ?? "ADMIN" ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('/logout'); ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('penyewa/dashboard'); ?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?= base_url('penyewa/profile'); ?>">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                </a>
            </li>
            <li class="nav-heading">Sewa Kost</li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('rent'); ?>">
                    <i class="bi bi-file-person"></i>
                    <span>My Sewa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?= base_url('penyewa/property'); ?>">
                    <i class="bi bi-blockquote-right"></i>
                    <span>Cari Kost</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main" style="min-height: 80vh;">
        <?= $this->renderSection('content'); ?>
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Adi Aulia Rahman</span></strong>. Template NiceAdmin
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>assets/vndr/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>assets/vndr/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/vndr/chart.js/chart.umd.js"></script>
    <script src="<?= base_url(); ?>assets/vndr/echarts/echarts.min.js"></script>
    <script src="<?= base_url(); ?>assets/vndr/quill/quill.js"></script>
    <script src="<?= base_url(); ?>assets/vndr/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url(); ?>assets/vndr/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url(); ?>assets/vndr/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>assets/js/main.js"></script>

    <?= $this->renderSection('script'); ?>

</body>

</html>