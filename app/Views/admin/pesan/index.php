<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="text-center">Lihat Order Yang Berlangsung</h3>

<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">No.</th>
            <th scope="col">Wisata</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>

        </tr>
    </thead>
    <tbody>

        <?php $no = 1;
        foreach ($pesan as $data) :
        ?>
            <tr class="text-center align-baseline">
                <th scope="row"><?= $no; ?></th>
                <td><?= $data->nama_wisata; ?></td>
                <td>Rp. <?= number_format($data->total, 0, ',', '.'); ?></td>
                <td><?= $data->status; ?></td>
            </tr>

        <?php $no++;
        endforeach ?>
    </tbody>
</table>

<?= $this->endSection(); ?>