<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="text-center">Halaman kelola Petugas</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Proses</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($petugas as $p) : ?>
            <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $p->nama; ?></td>
                <td><?= $p->email; ?></td>
                <td>
                    <a href=" <?= base_url('admin/petugas/edit/' . $p->id_admin); ?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="<?= base_url('admin/petugas/delete/' . $p->id_admin); ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>

        <?php $no++;
        endforeach ?>
    </tbody>
</table>

<div class="d-grid">
    <a href="<?= base_url('admin/petugas/add'); ?>" class="btn btn-sm btn-primary">+ Add</a>
</div>

<?= $this->endSection(); ?>