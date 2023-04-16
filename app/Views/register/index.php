<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="md-col-6 mx-auto">
                <div class="card ">
                    <h3 class="text-center mt-3">Buat Akun Baru</h3>
                    <div class="card-body">
                        <?php $validation = \Config\Services::validation() ?>
                        <form action="<?= base_url('login/save'); ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>">
                                <small class="text-danger"><?= $validation->getError('nama'); ?></small>
                            </div>
                            <div class="mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="kelamin" class="form-select">
                                    <option value=""></option>
                                    <option value="laki-laki">Laki - laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                <small class="text-danger"><?= $validation->getError('kelamin'); ?></small>
                            </div>
                            <div class="mb-3">
                                <label>Nomor Telepon</label>
                                <input type="number" name="telepon" class="form-control" value="<?= set_value('telepon'); ?>">
                                <small class="text-danger"><?= $validation->getError('telepon'); ?></small>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>">
                                <small class="text-danger"><?= $validation->getError('email'); ?></small>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>">
                                <small class="text-danger"><?= $validation->getError('password'); ?></small>
                            </div>
                            <div class="d-grid d-md-block">
                                <button type="submit" class="btn btn-primary mt-3">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>