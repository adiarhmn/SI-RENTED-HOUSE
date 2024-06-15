<?= $this->extend('layouts/AdminLayouts'); ?>
<?= $this->section('content'); ?>
<div class="pagetitle">
    <h1>Properti</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Properti</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section properti">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Daftar Data Properti</h5>
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
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($DataProperties as $index => $item) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <td><?= $item['name_property']; ?></td>
                                    <td><?= $item['price_property']; ?></td>
                                    <td><?= $item['status_property']; ?></td>
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
                                                <form action="<?= base_url('property/' . $item['id_property']); ?>" class="modal-content" method="POST">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Property</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

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
                                                <form action="<?= base_url('property/' . $item['id_property']); ?>" class="modal-content" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Property</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Yakin Hapus <span class="fw-bold"><?= $item['name_property']; ?></span>?</p>
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
                                <h5 class="modal-title">Tambah Property</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name_property" class="form-label">Nama Properti</label>
                                    <input type="text" class="form-control" id="name_property" name="name_property">
                                </div>
                                <div class="mb-3">
                                    <label for="price_property" class="form-label">Harga Properti</label>
                                    <input type="number" class="form-control" id="price_property" name="price_property">
                                </div>
                                <div class="mb-3">
                                    <label for="status_property" class="form-label">Status Properti</label>
                                    <select class="form-select" id="status_property" name="status_property">
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
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