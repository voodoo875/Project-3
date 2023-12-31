<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-3"></div>
<div class="row">
    <div class="col-md-6 mx-auto">
        <h4>Daftar Pembayaran Tiket Anda</h4>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Wisata</th>
                            <th scope="col">Total</th>
                            <th scope="col">Bayar</th>
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
                                <td><a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/<?= $data->snap; ?>" target="_blank" class="btn btn-primary">Bayar</a></td>

                                <?php
                                if ($data->status !== 'settlement') { ?>
                                    <td><a href="<?= base_url('wisata/cek/' . $data->id_pesan); ?>" class="btn btn-success">Verifikasi Jika Sudah Bayar</a></td>

                                <?php
                                }
                                ?>


                                <td><?= $data->status; ?></td>
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