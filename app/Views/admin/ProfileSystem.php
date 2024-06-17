<?= $this->extend('layouts/AdminLayouts'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Profile System</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Profile System</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<?= $this->include('components/_message'); ?>
<section class="section profile">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile System</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                            <!-- Profile Edit Form -->
                            <form method="POST">
                                <!-- Slogan -->
                                <div class="row mb-3">
                                    <label for="slogan" class="col-md-4 col-lg-3 col-form-label">Slogan</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="hidden" value="slogan" name="profil[0][title]" value="slogan">
                                        <input name="profil[0][content]" type="text" class="form-control" id="slogan" value="<?= $DataProfile[0]["content"] ?? ""; ?>">
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="hidden" value="address" name="profil[1][title]" value="address">
                                        <input name="profil[1][content]" type="text" class="form-control" id="address" value="<?= $DataProfile[1]["content"] ?? ""; ?>">
                                    </div>
                                </div>

                                <!-- Tentang Sistem -->
                                <div class="row mb-3">
                                    <label for="about" class="col-md-4 col-lg-3 col-form-label">Tentang Sistem</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="hidden" value="about" name="profil[2][title]" value="about">
                                        <textarea name="profil[2][content]" class="form-control" id="about"><?= $DataProfile[2]["content"] ?? ""; ?></textarea>
                                    </div>
                                </div>

                                <!-- Nomor Telephone -->
                                <div class="row mb-3">
                                    <label for="telp" class="col-md-4 col-lg-3 col-form-label">Nomor Telephone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="hidden" value="telp" name="profil[3][title]" value="telp">
                                        <input name="profil[3][content]" type="text" class="form-control" id="telp" value="<?= $DataProfile[3]["content"] ?? ""; ?>">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="hidden" value="email" name="profil[4][title]" value="email">
                                        <input name="profil[4][content]" type="email" class="form-control" id="email" value="<?= $DataProfile[4]["content"] ?? ""; ?>">
                                    </div>
                                </div>

                                <!-- Instagram Link -->
                                <div class="row mb-3">
                                    <label for="instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Link</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="hidden" value="instagram" name="profil[5][title]" value="instagram">
                                        <input name="profil[5][content]" type="text" class="form-control" id="instagram" value="<?= $DataProfile[5]["content"] ?? ""; ?>">
                                    </div>
                                </div>

                                <!-- Facebook Link -->
                                <div class="row mb-3">
                                    <label for="facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Link</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="hidden" value="facebook" name="profil[6][title]" value="facebook">
                                        <input name="profil[6][content]" type="text" class="form-control" id="facebook" value="<?= $DataProfile[6]["content"] ?? ""; ?>">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label"></label>
                                    <div class="col-md-8 col-lg-9">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                                <div class="text-center">
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>
                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection(); ?>