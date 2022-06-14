<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aplikasi Perpus</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                   
                    <h4 class="auth-title">Masuk Aplikasi</h4>
                    <p class="auth-subtitle mb-5">Silakan Masukan Username dan Password anda.</p>

                    <?php

                    if ($this->session->flashdata('warning')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('warning');
                        echo '</div>';
                    }

                    if ($this->session->flashdata('success')) {
                        echo '`<div class="alert alert-success">';
                        echo $this->session->flashdata('success');
                        echo '</div>';
                    }

                    ?>

                    <form action="<?= base_url('login/aksi') ?>" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="username" type="text" class="form-control form-control-xl" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="password" type="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Masuk</button>
                    </form>
                    
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>