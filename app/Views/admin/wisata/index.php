<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="text-center">Halaman kelola Wisata</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Wisata</th>
            <th scope="col">Harga</th>
            <th scope="col">Proses</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($wisata as $w) : ?>
            <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $w->nama_wisata; ?></td>
                <td><?= $w->harga; ?></td>
                <td><img src="<?= base_url('foto/' . $w->foto); ?>" style="width: 150px; height:100px;" alt=""></td>
                <td>
                    <a href=" <?= base_url('admin/wisata/edit/' . $w->id_wisata); ?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="<?= base_url('admin/wisata/delete/' . $w->id_wisata); ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>

        <?php $no++;
        endforeach ?>
    </tbody>
</table>

<div class="d-grid">
    <a href="<?= base_url('admin/wisata/add'); ?>" class="btn btn-sm btn-primary">+ Add</a>
</div>

<?= $this->endSection(); ?>