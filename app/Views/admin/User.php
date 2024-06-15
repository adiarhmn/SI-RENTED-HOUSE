<?= $this->extend('layouts/AdminLayouts'); ?>
<?= $this->section('content'); ?>
<div class="pagetitle">
    <h1>Users</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Data Users</li>
        </ol>
    </nav>
</div>
<?= $this->include('components/_message'); ?>
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Daftar Data User</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahModal">
                            + Tambah Data
                        </button>
                    </div>
                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Role / Hak Akses</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($DataUsers as $index => $user) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <td><?= $user['username']; ?></td>
                                    <td><i>Password are Hidden</i></td>
                                    <td><?= $user['role']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#EditModal<?= $index; ?>">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#HapusModal<?= $index; ?>">
                                            Hapus
                                        </button>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="EditModal<?= $index; ?>" tabindex="-1">
                                            <div class="modal-dialog">
                                                <form action="<?= base_url('user/' . $user['id_user']); ?>" class="modal-content" method="POST">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Username</label>
                                                            <input value="<?= $user['username']; ?>" type="text" class="form-control" id="username" name="username" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="role" class="form-label">Role / Hak Akses</label>
                                                            <select class="form-select" id="role" name="role" required>
                                                                <option selected disabled>Pilih Role / Hak Akses</option>
                                                                <option <?= ($user['role'] == 'admin') ? 'selected' : null; ?> value="admin">Admin</option>
                                                                <option <?= ($user['role'] == 'penyewa') ? 'selected' : null; ?> value="penyewa">Penyewa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                        <!-- Modal Hapus -->
                                        <div class="modal fade text-start" id="HapusModal<?= $index; ?>" tabindex="-1">
                                            <div class="modal-dialog">
                                                <form action="<?= base_url('user/' . $user['id_user']); ?>" class="modal-content" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Yakin Hapus <span class="fw-bold"><?= $user['username']; ?></span>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>

                <!-- Tambah Modal -->
                <div class="modal fade" id="TambahModal" tabindex="-1">
                    <div class="modal-dialog">
                        <form class="modal-content" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role / Hak Akses</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option selected disabled>Pilih Role / Hak Akses</option>
                                        <option value="admin">Admin</option>
                                        <option value="penyewa">Penyewa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div><!-- End Tambah Modal-->
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>