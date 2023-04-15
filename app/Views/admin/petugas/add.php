<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="text-center">Tambah Petugas</h3>

<form action="<?= base_url('admin/petugas/save'); ?>" method="post">
    <?= csrf_field(); ?>
    <?php $validation = \Config\Services::validation(); ?>

    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>">
        <small class="text-danger"><?= $validation->getError('nama'); ?></small>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>">
        <small class="text-danger"><?= $validation->getError('email'); ?></small>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>">
        <small class="text-danger"><?= $validation->getError('password'); ?></small>
    </div>
    <div class="mb-3">
        <label>Masukkan Password Kembali</label>
        <input type="password" name="uppassword" class="form-control" value="<?= set_value('uppassword'); ?>">
        <small class="text-danger"><?= $validation->getError('uppassword'); ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

<?= $this->endSection(); ?>