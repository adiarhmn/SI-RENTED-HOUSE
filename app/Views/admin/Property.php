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
<?= $this->include('components/_message'); ?>
<?= $this->include('components/_TableProperty'); ?>
<?= $this->endSection(); ?>