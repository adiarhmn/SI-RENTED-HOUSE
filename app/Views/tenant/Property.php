<?= $this->extend('layouts/TenantLayouts'); ?>
<?= $this->section('content'); ?>
<div class="pagetitle">
    <h1>Cari Kost</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Kost</li>
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
                    </div>
                    <!-- Default Table -->
                    <div style="overflow-x: auto;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail Properti</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($DataProperties as $index => $item) : ?>
                                    <tr>
                                        <th scope="row"><?= $index + 1; ?></th>
                                        <td><?= $item['name_property']; ?></td>
                                        <td><?= MoneyFormatID($item['price_property']); ?></td>
                                        <td><?= $item['status_property']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#DetailModal<?= $index; ?>">
                                                Detail Properti
                                            </button>

                                            <!-- Detail Modal -->
                                            <div class="modal fade" id="DetailModal<?= $index; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Properti : <?= $item['name_property']; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php if (sizeof($item['detail']) != 0) : ?>
                                                                <?php foreach ($item['detail'] as $detail) : ?>
                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-4 d-flex justify-content-center">
                                                                            <img src="<?= base_url($detail['image_detail']); ?>" alt="<?= $detail['description_detail']; ?>" class="img-thumbnail" style="width: 150px;">
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <p><?= $detail['description_detail']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($item['status_property'] == "Tersedia") : ?>
                                                <!-- Proses Sewa -->
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#SewaModal<?= $index; ?>">
                                                    Sewa
                                                </button>
                                            <?php else : ?>
                                                <button class="btn btn-danger btn-sm" disabled>
                                                    Disewa
                                                </button>
                                            <?php endif; ?>

                                            <!-- Sewa Modal -->
                                            <div class="modal fade" id="SewaModal<?= $index; ?>" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <form action="<?= base_url('rent'); ?>" method="POST" class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Proses Sewa Properti</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_property" value="<?= $item['id_property']; ?>">
                                                            <input type="hidden" name="id_tenant" value="<?= $DataTenant['id_tenant']; ?>">
                                                            <!-- Teman -->
                                                            <div class="mb-3">
                                                                <label for="teman" class="form-label">Total Bersama Teman</label>
                                                                <input type="number" value="0" min="0" class="form-control" id="teman" name="total_tenant">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Sewa</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Default Table Example -->
                </div>


            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>