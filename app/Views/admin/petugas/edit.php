<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="text-center">Ubah data Admin</h3>

<form action="<?= base_url('admin/petugas/update'); ?>" method="post">
    <?= csrf_field(); ?>
    <input type="hidden" name="kode" value="<?= $cari->id_admin; ?>">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $cari->nama; ?>">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?= $cari->email; ?>">
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

<?= $this->endSection(); ?>