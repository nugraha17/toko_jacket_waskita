<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="register-box">
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register Pelanggan Baru</p>

                    <?php
                    echo validation_errors('<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>', '</div');

                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i></h5>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }

                    echo form_open('pelanggan/register'); ?>
                    <div class="input-group mb-3">
                        <input type="text" name="nama_pelanggan" class="form-control" value="<?= set_value('nama_pelanggan') ?>" placeholder="Nama Pelanggan">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" value="<?= set_value('password') ?>" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="ulangi_password" class="form-control" value="<?= set_value('ulangi_password') ?>" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        <a href="<?= base_url('pelanggan/login') ?>" class="text-center">Saya Sudah Punya Akun !</a>
                        </div>
                        <div class="col-4">
                            
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                    
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>