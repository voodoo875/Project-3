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
                            $token = base64_encode("SB-Mid-server-YBqQm7EU81Mj1zeehWhHeFdC" . ":");
                            $url = "https://api.sandbox.midtrans.com/v2/" . $data->id_pesan . "/status";
                            $header = array(
                                'Accept:application/json',
                                'Content-Type:application/json',
                                'Authorization:Basic ' . $token
                            );
                            $verb = 'GET';
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $verb);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, null);
                            curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                            $result = curl_exec($ch);
                            $hasil = json_decode($result, true);

                            if ($hasil['status_code'] == 200) {
                                $status = "Sudah Dibayar";
                            } else if ($hasil['status_code'] == 201) {
                                $status = "Belum Dibayar";
                            } else if ($hasil['status_code'] == 404) {
                                $status = "Tagihan Belum Dibuat";
                            }
                        ?>
                            <tr class="text-center">
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $data->nama_wisata; ?></td>
                                <td><?= $data->total; ?></td>
                                <td><a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/<?= $data->snap; ?>" target="_blank" class="btn btn-primary"
                                >Bayar</a></td>
                                <td><?= $status; ?></td>
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