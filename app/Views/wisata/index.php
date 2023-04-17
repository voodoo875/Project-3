<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <h3 class="mx-5">Pilihan Wisata</h3>
    <div class="col d-flex justify-content-evenly flex-wrap">
        <?php foreach ($wisata as $data) : ?>
            <div class="card mt-4" style="width: 18rem;">
                <img src="<?= base_url('foto/' . $data->foto); ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;" alt="<?= $data->nama_wisata; ?>">
                <div class="card-body">
                    <h5 class="card-title text-center"><?= $data->nama_wisata; ?></h5>
                    <p class="card-text text-center"><?= $data->deskripsi; ?></p>
                    <p class="card-text text-center">Rp. <?= number_format($data->harga, 0, ',', '.'); ?> / Orang</p>
                    <a href="<?= base_url('wisata/pesan/' . $data->id_wisata); ?>" class="btn btn-primary">Beli Tiket</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection(); ?>