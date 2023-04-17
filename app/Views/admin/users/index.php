<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="text-center">Lihat User Yang Terdaftar</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama User</th>
            <th scope="col">Email</th>
            <th scope="col">Tanggal Pendaftaran</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($users as $data) : ?>
            <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $data->nama_users; ?></td>
                <td><?= $data->email; ?></td>
                <td><?= $data->created_at; ?></td>
            </tr>

        <?php $no++;
        endforeach ?>
    </tbody>
</table>

<?= $this->endSection(); ?>