<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-0 py-0">
    <div class="row">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <?php foreach ($wisata as $data) : ?>
                    <div class="carousel-item active">
                        <img src="<?= base_url('foto/' . $data->foto); ?>" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="<?= $data->nama_wisata; ?>">
                    </div>
                <?php endforeach ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</div>

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-md-12 mb-5">
            <h3 class="text-center">Selamat Datang di Tick.id</h3>
        </div>
    </div>

    <div class="row">
        <h3 class="mx-5">Pilihan Wisata</h3>
        <div class="col d-flex justify-content-evenly flex-wrap">
            <?php foreach ($wisata as $data) : ?>
                <div class="card mt-4" style="width: 18rem;">
                    <img src="<?= base_url('foto/' . $data->foto); ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;" alt="<?= $data->nama_wisata; ?>">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $data->nama_wisata; ?></h5>
                        <p class="card-text text-center"><?= $data->deskripsi; ?></p>
                        <a href="#" class="btn btn-primary">Beli Tiket</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>