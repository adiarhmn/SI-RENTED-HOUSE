<?= $this->extend('layouts/TenantLayouts'); ?>
<?= $this->section('content'); ?>
<div class="pagetitle">
    <h1>My Sewa</h1>
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
                        <h5 class="card-title">Daftar Riwayat Penyewaan</h5>
                    </div>
                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Teman</th>
                                <th scope="col">Mulai / Selesai</th>
                                <th scope="col">Properti</th>
                                <th scope="col">Status Sewa</th>
                                <th scope="col">Status Pembayaran</th>
                                <th scope="col">Riwayat Pembayaran</th>
                                <th scope="col">Bayar</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 14px;">
                            <?php foreach ($DataRents as $index => $item) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <td>
                                        <div><?= $item['total_tenant'] - 1; ?> Teman</div>
                                    </td>
                                    <td><?= $item['date_start']; ?> / <?= $item['date_end'] ?? "0"; ?></td>
                                    <td><?= $item['name_property']; ?></td>
                                    <td><?= $item['status_rent']; ?></td>
                                    <td>
                                        <?php if ($item['status_rent'] != 'SELESAI') : ?>
                                            <?php if (DistanceDays($item['total_days'], $item['date_start'])) : ?>
                                                <span class="badge bg-success">Lunas</span>
                                            <?php else : ?>
                                                <span class="badge bg-danger">Belum Bayar / Nunggak</span>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <span class="badge bg-secondary">SELESAI</span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <!-- Menampilkan Semua Riwayat Pembayaran dengan Modal -->
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#PembayaranModal<?= $index; ?>">
                                            Riwayat Pembayaran
                                        </button>
                                        <!-- Pembayaran Modal -->
                                        <div class="modal fade" id="PembayaranModal<?= $index; ?>" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Riwayat Pembayaran</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Jumlah Pembayaran</th>
                                                                    <th scope="col">Status Pembayaran</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($item['payment'] as $index => $payment_item) : ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $index + 1; ?></th>
                                                                        <td><?= MoneyFormatID($payment_item['total_payment']); ?></td>
                                                                        <td>
                                                                            <?php if ($payment_item['payment_status'] == 'Success') : ?>
                                                                                <span class="badge bg-success">Disetujui</span>
                                                                            <?php else : ?>
                                                                                <span class="badge bg-danger">Belum Disetujui</span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if ($item['status_rent'] != 'SELESAI') : ?>
                                            <?php if (!DistanceDays($item['total_days'], $item['date_start'])) : ?>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#BayarModal<?= $index; ?>">
                                                    BAYAR
                                                </button>
                                                <!-- Bayar Modal -->
                                                <div class="modal fade" id="BayarModal<?= $index; ?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <form action="<?= base_url('/payment'); ?>" class="modal-content" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Tambah Pembayaran</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_rent" value="<?= $item['id_rent']; ?>">
                                                                <!-- Input Image -->
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Bukti Pembayaran</label>
                                                                    <input type="file" class="form-control" id="image" name="evidence_payment" required>
                                                                </div>
                                                                <!-- Method Payment -->
                                                                <div class="mb-3">
                                                                    <label for="method" class="form-label">Metode Pembayaran</label>
                                                                    <select class="form-select" id="method" name="method_payment" required>
                                                                        <option value="Transfer">Transfer</option>
                                                                        <option value="Cash">Cash</option>
                                                                    </select>
                                                                </div>
                                                                <!-- Input Total Pembayaran -->
                                                                <div class="mb-3">
                                                                    <label for="total" class="form-label">Total Pembayaran</label>
                                                                    <input type="text" class="form-control" id="total" value="<?= MoneyFormatID($item['priceper_month']); ?>" disabled>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Bayar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <button class="btn btn-info btn-sm" disabled>
                                                    NANTI
                                                </button>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <button class="btn btn-secondary btn-sm" disabled>
                                                SELESAI
                                            </button>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>