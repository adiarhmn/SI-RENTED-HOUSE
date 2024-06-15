<?= $this->extend('layouts/AdminLayouts'); ?>
<?= $this->section('content'); ?>
<div class="pagetitle">
    <h1>Penyewa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Data Penyewa</li>
        </ol>
    </nav>
</div>
<?= $this->include('components/_message'); ?>
<section class="section tenant">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Daftar Data Penyewa</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahModal">
                            + Tambah Data
                        </button>
                    </div>
                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Telephone</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($DataTenants as $index => $item) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <td><?= $item['name_tenant']; ?></td>
                                    <td><?= $item['address']; ?></td>
                                    <td><?= $item['telp']; ?></td>
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
                                                <form action="<?= base_url('tenant/' . $item['id_tenant']); ?>" class="modal-content" method="POST">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="name_tenant" class="form-label">Nama Penyewa</label>
                                                            <input value="<?= $item['name_tenant']; ?>" type="text" class="form-control" id="name_tenant" name="name_tenant" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="telp" class="form-label">No Telephone</label>
                                                            <input value="<?= $item['telp']; ?>" type="text" class="form-control" id="telp" name="telp" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Alamat</label>
                                                            <textarea class="form-control" id="address" name="address" required><?= $item['address']; ?></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="id_user" class="form-label">Penyewa</label>
                                                            <select class="form-select" id="id_user" name="id_user" required>
                                                                <option selected disabled>Pilih Penyewa</option>
                                                                <?php foreach ($DataUsers as $user) : ?>
                                                                    <option <?= ($item['id_user'] == $user['id_user']) ? 'selected' : null; ?> value="<?= $user['id_user']; ?>"><?= $user['username']; ?></option>
                                                                <?php endforeach ?>
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
                                                <form action="<?= base_url('tenant/' . $item['id_tenant']); ?>" class="modal-content" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Yakin Hapus <span class="fw-bold"><?= $item['name_tenant']; ?></span>?</p>
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
                                <h5 class="modal-title">Tambah Tenant</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name_tenant" class="form-label">Nama Penyewa</label>
                                    <input type="text" class="form-control" id="name_tenant" name="name_tenant" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telp" class="form-label">No Telephone</label>
                                    <input type="text" class="form-control" id="telp" name="telp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="address" name="address" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="id_user" class="form-label">Penyewa</label>
                                    <select class="form-select" id="id_user" name="id_user" required>
                                        <option selected disabled>Pilih Penyewa</option>
                                        <?php foreach ($DataUsers as $user) : ?>
                                            <option value="<?= $user['id_user']; ?>"><?= $user['username']; ?></option>
                                        <?php endforeach ?>
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