<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <div class="container py-5">
        <div class="row">
            <div class="md-col-6 mx-auto ">
                <div class="card px-3">
                    <h3 class="text-center mt-3 ">Login</h3>
                    <?php if (session()->getFlashdata('success')) { ?>
                        <div class="alert alert-success " role="alert">
                            <div>
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        </div>
                    <?php
                    }
                    if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger" role="alert">
                            <div>
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="card-body">
                        <?php $validation = \Config\Services::validation() ?>
                        <form action="<?= base_url('login/proses'); ?>" method="post">
                            <?= csrf_field() ?>
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
                                <button type="submit" class="btn btn-primary mt-3">Login</button>
                                <a href="<?= base_url('login/register'); ?>" class="btn btn-outline-success mt-3">Register</a>
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