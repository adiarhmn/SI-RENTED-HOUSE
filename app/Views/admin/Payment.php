<?= $this->extend('layouts/AdminLayouts'); ?>
<?= $this->section('content'); ?>
<div class="pagetitle">
    <h1>Pembayaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<?= $this->include('components/_message'); ?>
<section class="section Pembayaran">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">Daftar Pembayaran</h5>
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
                                <th scope="col">Kos</th>
                                <th scope="col">Bukti Pembayaran</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($DataPayments as $index => $item) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <td><?= $item['name_tenant']; ?></td>
                                    <td><?= $item['name_property']; ?></td>
                                    <td><?= $item['evidence_payment']; ?></td>
                                    <td>
                                        <?php if ($item['payment_status'] == "Pending") : ?>
                                            <span class="badge bg-warning"><?= $item['payment_status']; ?></span>
                                        <?php elseif ($item['payment_status'] == "Success") : ?>
                                            <span class="badge bg-success"><?= $item['payment_status']; ?></span>
                                        <?php else : ?>
                                            <span class="badge bg-danger"><?= $item['payment_status']; ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <?php if ($item['payment_status'] == 'Success' || $item['payment_status'] == 'Cancel') : ?>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" disabled>
                                                Terima
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" disabled>
                                                Tolak
                                            </button>
                                        </td>
                                    <?php else : ?>
                                        <td class="d-flex gap-2">
                                            <form action="<?= base_url('/payment/process'); ?>" method="POST">
                                                <input type="hidden" name="id_payment" value="<?= $item['id_payment']; ?>">
                                                <input type="hidden" name="payment_status" value="Success">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    Terima
                                                </button>
                                            </form>
                                            <form action="<?= base_url('/payment/process'); ?>" method="POST">
                                                <input type="hidden" name="id_payment" value="<?= $item['id_payment']; ?>">
                                                <input type="hidden" name="payment_status" value="Cancel">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Tolak
                                                </button>
                                            </form>

                                        </td>
                                    <?php endif; ?>
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
                                <h5 class="modal-title">Tambah Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
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
                                <!-- Input Penyewa -->
                                <div class="mb-3">
                                    <label for="tenant" class="form-label">Data Sewa</label>
                                    <select class="form-select" id="tenant" name="id_rent" required>
                                        <option selected>Pilih Data Sewa</option>
                                        <?php foreach ($DataRents as $item) : ?>
                                            <option style="font-size: 12px;" total_price="<?= $item['priceper_month']; ?>" value="<?= $item['id_rent']; ?>"><?= $item['name_tenant'] . " - " . $item['name_property'] . " - [" . MoneyFormatID($item['priceper_month']) . "]"; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- Input Total Pembayaran -->
                                <div class="mb-3">
                                    <label for="total" class="form-label">Total Pembayaran</label>
                                    <input type="text" class="form-control" id="total" disabled>
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

<?= $this->section('content'); ?>
<!-- CODE HERE -->
<script>
    // Get Total Payment
    document.getElementById('tenant').addEventListener('change', function() {
        let total = this.options[this.selectedIndex].getAttribute('total_price');
        // Set the numeric value directly to the input
        document.getElementById('total').value = formatAsCurrency(total);
    });

    function formatAsCurrency(number) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
        }).format(number);
    }
</script>
<?= $this->endSection(); ?>