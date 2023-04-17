<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-3"></div>
<div class="row">
    <div class="col-md-8 mx-auto">
        <h4>History Pembelian</h4>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="align-baseline">
                            <th scope="col">No.</th>
                            <th scope="col">Wisata</th>
                            <th scope="col">Tiket Anak-anak</th>
                            <th scope="col">Tiket Dewasa</th>
                            <th scope="col">Tanggal Keberangkatan</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($pesan as $data) :
                        ?>
                            <tr class=" align-baseline">
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $data->nama_wisata; ?></td>
                                <td><?= $data->qty_anak; ?></td>
                                <td><?= $data->qty_dewasa; ?></td>
                                <td><?= $data->tgl_datang; ?></td>
                                <td>Rp. <?= number_format($data->total, 0, ',', '.'); ?></td>
                            </tr>

                        <?php $no++;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>