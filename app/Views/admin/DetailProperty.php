<?= $this->extend('layouts/AdminLayouts'); ?>
<?= $this->section('content'); ?>
<div class="pagetitle">
    <div class="d-flex align-items-center gap-2">
        <a class="" href="<?= base_url('/property'); ?>"><i class="bi bi-arrow-left-square-fill" style="font-size: 22px;"></i></a>
        <h1>Data Detail Properti : <?= $property['name_property']; ?> </h1>
    </div>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Data Detail <?= $property['name_property']; ?> </li>
        </ol>
    </nav>
</div>
<?= $this->include('components/_message'); ?>
<section class="section user">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Daftar Detail Properti : <?= $property['name_property']; ?></h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahModal">
                            + Tambah Data
                        </button>
                    </div>
                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th style="width: 600px;">Deskripsi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($DataDetailProperties as $index => $item) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <td>
                                        <?= $item['description_detail']; ?>
                                    </td>
                                    <td>
                                        <img src="<?= base_url($item['image_detail']); ?>" alt="<?= $item['description_detail']; ?>" class="img-thumbnail" style="width: 100px;">
                                    </td>
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
                                                <form action="<?= base_url('detail-property/' . $item['id_detail_property']); ?>" class="modal-content" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Property</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Input Image -->
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Gambar</label>
                                                            <input type="file" class="form-control" id="image" name="image_detail">
                                                        </div>
                                                        <!-- Input Description -->
                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" id="description" name="description_detail"><?= $item['description_detail']; ?></textarea>
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
                                                <form action="<?= base_url('detail-property/' . $item['id_detail_property']); ?>" class="modal-content" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Detail Property</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Yakin Hapus Data <span class="fw-bold">No.<?= $index + 1; ?></span>?</p>
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
                        <form class="modal-content" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Input Image -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="image" name="image_detail" required>
                                </div>
                                <!-- Input Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="description" name="description_detail" required></textarea>
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