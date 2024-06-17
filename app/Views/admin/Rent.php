<?= $this->extend('layouts/AdminLayouts'); ?>
<?= $this->section('content'); ?>
<div class="pagetitle">
    <h1>Sewa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Sewa</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<?= $this->include('components/_message'); ?>
<section class="section Sewa">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Daftar Data Penyewaan</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahModal">
                            + Tambah Data
                        </button>
                    </div>
                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Penyewa</th>
                                <th scope="col">Mulai / Selesai</th>
                                <th scope="col">Properti</th>
                                <th scope="col">Status Sewa</th>
                                <th scope="col">Status Pembayaran</th>
                                <th scope="col">Pembayaran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 14px;">
                            <?php foreach ($DataRents as $index => $item) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <td>
                                        <div><?= $item['name_tenant'] . " &"; ?></div>
                                        <div><?= $item['total_tenant'] - 1; ?> Teman</div>
                                    </td>
                                    <td><?= $item['date_start']; ?> / <?= $item['date_end'] ?? "0"; ?></td>
                                    <td><?= $item['name_property']; ?></td>
                                    <td><?= $item['status_rent']; ?></td>
                                    <td>
                                        <?php if (DistanceDays($item['total_days'], $item['date_start'])) : ?>
                                            <span class="badge bg-success">Lunas</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">Belum Bayar / Nunggak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('payment'); ?>" class="btn btn-success btn-sm">Riwayat Pembayaran</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#EditModal<?= $index; ?>">
                                            Berhentikan
                                        </button>
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
                                <h5 class="modal-title">Tambah Data Sewa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Penyewa -->
                                <div class="mb-3">
                                    <label for="penyewa" class="form-label">Penyewa</label>
                                    <select class="form-select" id="penyewa" name="id_tenant">
                                        <option selected>Pilih Penyewa</option>
                                        <?php foreach ($DataTenants as $item) : ?>
                                            <option value="<?= $item['id_tenant']; ?>"><?= $item['name_tenant']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Property -->
                                <div class="mb-3">
                                    <label for="property" class="form-label">Property</label>
                                    <select class="form-select" id="property" name="id_property">
                                        <option selected>Pilih Property</option>
                                        <?php foreach ($DataProperties as $item) : ?>
                                            <option value="<?= $item['id_property']; ?>"><?= $item['name_property']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Teman -->
                                <div class="mb-3">
                                    <label for="teman" class="form-label">Total Teman</label>
                                    <input type="number" value="0" min="0" class="form-control" id="teman" name="total_tenant">
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