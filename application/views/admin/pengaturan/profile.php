
<div class="card">
    <div class="card-header">
        Ganti Password
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/password/aksi') ?>" method="POST">
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
            <div class="form-group">
                <label>Password Lama <span style="color:red">*</span></label>
                <input required type="password" name="password_lama" value="" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password Baru <span style="color:red">*</span></label>
                <input required id="password-content-4-1" type="password" name="password" value="" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Konfirmasi Password <span style="color:red">*</span></label>
                <input required id="password-content-4-2" type="password" name="" value="" class="form-control" required>
            </div>



            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>


<!-- Password toggle -->
<script>
    var password = document.getElementById("password-content-4-1"),
        confirm_password = document.getElementById("password-content-4-2");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Password Tidak Sama");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>