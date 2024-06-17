<?= $this->extend('layouts/TenantLayouts'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Profile</li>
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
                            <button class="nav-link <?= (session('active_tab')) ? '' : 'active'; ?>" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link <?= (session('active_tab')) ? 'active' : ''; ?>" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade <?= (session('active_tab')) ? '' : 'show active'; ?> profile-edit pt-3" id="profile-edit">

                            <!-- Profile Edit Form -->
                            <form method="POST">
                                <input type="hidden" name="id_user" value="<?= $DataUser['id_user']; ?>">
                                <div class="row mb-3">
                                    <label for="name_tenant" class="col-md-4 col-lg-3 col-form-label">Nama Panjang</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="name_tenant" type="text" class="form-control" id="name_tenant" value="<?= $DataTenant['name_tenant'] ?? ""; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="address" type="text" class="form-control" id="address" value="<?= $DataTenant['address'] ?? ""; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="telp" class="col-md-4 col-lg-3 col-form-label">Nomor Telephone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="telp" type="text" class="form-control" id="telp" value="<?= $DataTenant['telp'] ?? ""; ?>">
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

                        <div class="tab-pane fade <?= (session('active_tab')) ? 'show active' : ''; ?> pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form action="<?= base_url('penyewa/profile/change-password'); ?>" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control" id="currentPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label"></label>
                                    <div class="col-md-8 col-lg-9">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </div>

                            </form><!-- End Change Password Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection(); ?>