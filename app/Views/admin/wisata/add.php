<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="text-center">Tambah Wisata</h3>

<form action="<?= base_url('admin/wisata/save'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <?php $validation = \Config\Services::validation(); ?>

    <div class="mb-3">
        <label>Nama Wisata</label>
        <input type="text" name="nama" class="form-control">
        <small class="text-danger"><?= $validation->getError('nama'); ?></small>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <input type="text" name="des" class="form-control">
        <small class="text-danger"><?= $validation->getError('des'); ?></small>
    </div>
    <div class="mb-3">
        <label>Foto Wisata</label>
        <input type="file" name="foto" class="form-control">
        <small class="text-danger"><?= $validation->getError('foto'); ?></small>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="text" name="harga" class="form-control">
        <small class="text-danger"><?= $validation->getError('harga'); ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

<?= $this->endSection(); ?>