<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<h3 class="text-center">Lihat Order Yang Telah Sukses</h3>

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
        <?php
        $no = 1;
        $total = 0;

        foreach ($pesan as $data) :
            $total += $data->total;
        ?>
            <tr class="text-center align-baseline">
                <th scope="row"><?= $no; ?></th>
                <td><?= $data->nama_wisata; ?></td>
                <td>Rp. <?= number_format($data->total, 0, ',', '.'); ?></td>
                <td><?= $data->status; ?></td>
            </tr>
        <?php
            $no++;
        endforeach
        ?>
    </tbody>
</table>

<p>Total Keseluruhan : Rp. <?= number_format($total, 0, ',', '.'); ?></p>

<?= $this->endSection(); ?>