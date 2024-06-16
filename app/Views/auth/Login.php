<?= $this->extend('layouts/AuthLayouts'); ?>
<?= $this->section('content'); ?>
<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img style="width: 35px; min-height: 35px; margin-bottom: 5px;" src="<?= base_url(); ?>assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">ADI-SEWAKOS</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-2 fw-bold">LOGIN</h5>
                                    <p class="text-center small">Selamat Datang Di Sistem Sewa Kos</p>
                                </div>

                                <form action="<?= base_url('/login'); ?>" method="POST" class="row g-3 <?= (session('errors')) ? 'was-validated' : null; ?>" novalidate>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="username" class="form-control" placeholder="Username" id="yourUsername" required>
                                            <div class="invalid-feedback "><?= (session('errors')) ? session('errors.username') : null; ?></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" id="yourPassword" required>
                                        <div class="invalid-feedback"><?= (session('errors')) ? session('errors.password') : null; ?></div>
                                    </div>
                                    <div class="col-12 mt-5">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Belum Punya Akun? <a href="pages-register.html">Buat Akun</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->
<?= $this->endSection(); ?>