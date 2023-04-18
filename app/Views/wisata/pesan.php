<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-3"></div>
<div class="row">
    <div class="col-md-3 mx-auto">
        <div class="card">
            <img src="<?= base_url('foto/' . $wisata->foto); ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;" alt="<?= $wisata->nama_wisata; ?>">
            <div class="card-body">
                <h5 class="card-title">Tujuan Wisata : <?= $wisata->nama_wisata; ?></h5>
                <p>Harga Tiket : <?= number_format($wisata->harga, 0, ',', '.'); ?></p>

                <?php $validation = \Config\Services::validation() ?>
                <form method="POST" action="<?= base_url('wisata/proses'); ?>">
                    <input type="hidden" name="harga" value="<?= $wisata->harga; ?>">
                    <input type="hidden" name="id" value="<?= $wisata->id_wisata; ?>">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label>Jumlah Pengunjung Anak-anak</label>
                        <input type="text" name="anak" class="form-control" value="<?= set_value('anak'); ?>">
                        <small class="text-danger"><?= $validation->getError('anak'); ?></small>
                    </div>
                    <div class="mb-3">
                        <label>Jumlah Pengunjung Dewasa</label>
                        <input type="text" name="dewasa" class="form-control" value="<?= set_value('dewasa'); ?>">
                        <small class="text-danger"><?= $validation->getError('dewasa'); ?></small>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Keberangkatan</label>
                        <input type="date" name="tanggal_berangkat" class="form-control">
                        <small class="text-danger"><?= $validation->getError('tanggal_berangkat'); ?></small>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Kedatangan</label>
                        <input type="date" name="tanggal" class="form-control">
                        <small class="text-danger"><?= $validation->getError('tanggal'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>