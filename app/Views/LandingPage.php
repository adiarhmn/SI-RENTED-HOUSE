<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - FlexStart Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>assets/flexstart/img/favicon.png" rel="icon">
    <link href="<?= base_url(); ?>assets/flexstart/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/flexstart/vndr_flexstart/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/flexstart/vndr_flexstart/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/flexstart/vndr_flexstart/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/flexstart/vndr_flexstart/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/flexstart/vndr_flexstart/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url(); ?>assets/flexstart/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="#" class="logo d-flex align-items-center me-auto">
                <img style="margin-bottom: 5px;" src="<?= base_url(); ?>assets/img/logo.png" alt="">
                <h1 class="sitename">ADI - SEWAKOS</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Beranda<br></a></li>
                    <li><a href="<?= base_url(((session('role') == 'penyewa' ? "penyewa/" : "")) . 'property'); ?>">Sewa</a></li>
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="#penawaran">Penawaran</a></li>
                    <li><a href="#contact">Kontak Kami</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>


            <?php if (session('id_user')) : ?>
                <a class="btn-getstarted flex-md-shrink-0" href="<?= base_url(mainDashboard()); ?>">My Dashboard</a>
            <?php else : ?>
                <a class="btn-getstarted flex-md-shrink-0" href="<?= base_url('login'); ?>">Login</a>
            <?php endif; ?>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Sistem Penyewaan Kos Terpecaya</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Solusi Cepat dan Mudah untuk Menemukan Tempat Tinggal Ideal</p>
                        <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                            <a href="<?= base_url(((session('role') == 'penyewa' ? "penyewa/" : "")) . 'property'); ?>" class="btn-get-started">Mulai Cari <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <div style="width: 570px; height: 350px; object-fit: cover; overflow: hidden; border-radius: 20px;" class="animated">
                            <img style="width: 100%; height: 100%; object-fit: cover; object-position: center;" src="<?= base_url(); ?>assets/img/interior-06.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="tentang" class="about section">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>APA ITU ADI-SEWAKOS ?</h3>
                            <h2><?= $slogan; ?></h2>
                            <p><?= $about; ?></p>
                            <div class="text-center text-lg-start">
                                <a href="#penawaran" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Lainnya</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <div style="width: 570px; height: 360px; object-fit: cover; overflow: hidden; border-radius: 20px;" class="animated">
                            <img style="width: 100%; height: 100%; object-fit: cover; object-position: center;" src="<?= base_url(); ?>assets/img/interior-08.avif" alt="">
                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /About Section -->

        <!-- Values Section -->
        <section id="values" class="values section">

            <!-- Section Title -->
            <div id="penawaran" class="container section-title" data-aos="fade-up">
                <h2>BENEFIT</h2>
                <p>Penawaran Kami<br></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="<?= base_url(); ?>assets/flexstart/img/values-1.png" class="img-fluid" alt="">
                            <h3>Harga Murah Dan Pembayaran Mudah</h3>
                            <p>INI DATA STATIS Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <img src="<?= base_url(); ?>assets/flexstart/img/values-2.png" class="img-fluid" alt="">
                            <h3>Keamanan dan Penjagaan</h3>
                            <p>INI DATA STATIS Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <img src="<?= base_url(); ?>assets/flexstart/img/values-3.png" class="img-fluid" alt="">
                            <h3>Manajemen Sewa Kos Mudah</h3>
                            <p>INI DATA STATIS Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
                        </div>
                    </div><!-- End Card Item -->

                </div>

            </div>

        </section><!-- /Values Section -->

        <section id="alt-features" class="alt-features section">

            <div class="container">

                <div class="row gy-5">

                    <div class="col-xl-7 d-flex order-2 order-xl-1" data-aos="fade-up" data-aos-delay="200">

                        <div class="row align-self-center gy-5">

                            <div class="col-md-12 icon-box">
                                <i class="bi bi-card-checklist"></i>
                                <div>
                                    <h4>Ullamco laboris nisi</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                                </div>
                            </div><!-- End Feature Item -->


                            <div class="col-md-12 icon-box">
                                <i class="bi bi-filter-circle"></i>
                                <div>
                                    <h4>Beatae veritatis</h4>
                                    <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                                </div>
                            </div><!-- End Feature Item -->


                            <div class="col-md-12 icon-box">
                                <i class="bi bi-patch-check"></i>
                                <div>
                                    <h4>Explicabo consectetur</h4>
                                    <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p>
                                </div>
                            </div><!-- End Feature Item -->

                        </div>

                    </div>

                    <div class="col-xl-5 d-flex align-items-center order-1 order-xl-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="<?= base_url(); ?>assets/flexstart/img/alt-features.png" class="img-fluid" alt="">
                    </div>

                </div>

            </div>

        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak</h2>
                <p>Kontak Kami</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-12">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-item d-flex align-items-center gap-4" data-aos="fade" data-aos-delay="200">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>
                                        <h3>Alamat</h3>
                                        <p><?= $address; ?></p>
                                    </div>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item d-flex align-items-center gap-4" data-aos="fade" data-aos-delay="300">
                                    <i class="bi bi-telephone"></i>
                                    <div>
                                        <h3>Call Us</h3>
                                        <p><?= $telp; ?></p>
                                    </div>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item d-flex align-items-center gap-4" data-aos="fade" data-aos-delay="400">
                                    <i class="bi bi-envelope"></i>
                                    <div>
                                        <h3>Email Us</h3>
                                        <p><?= $email; ?></p>
                                    </div>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item d-flex align-items-center gap-4" data-aos="fade" data-aos-delay="500">
                                    <i class="bi bi-clock"></i>
                                    <div>
                                        <h3>Open Hours</h3>
                                        <p>9:00AM - 05:00PM</p>
                                    </div>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-12">
                    <h4>Follow Media Sosial Kami</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links d-flex flex-column gap-2">
                        <div class="d-flex align-items-center">
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <span style="font-size: 17px;" class="text-primary">: <?= $facebook; ?></span>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <span style="font-size: 17px;" class="text-primary">: <?= $instagram; ?></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Adi</strong> <span>All Rights Reserved</span></p>
            <div>
                Designed by Adios
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>assets/flexstart/vndr_flexstart/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/flexstart/vndr_flexstart/php-email-form/validate.js"></script>
    <script src="<?= base_url(); ?>assets/flexstart/vndr_flexstart/aos/aos.js"></script>
    <script src="<?= base_url(); ?>assets/flexstart/vndr_flexstart/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>assets/flexstart/vndr_flexstart/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url(); ?>assets/flexstart/vndr_flexstart/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>assets/flexstart/vndr_flexstart/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>assets/flexstart/vndr_flexstart/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="<?= base_url(); ?>assets/flexstart/js/main.js"></script>

</body>

</html>