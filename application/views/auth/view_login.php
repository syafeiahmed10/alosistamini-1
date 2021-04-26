<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <!-- <div class="col-xl-10 col-lg-12 col-md-9"> -->
        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <!-- <div class="col-lg-6"> -->
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <?php echo $this->session->flashdata('message');
                                ?>
                                <form class="user" method="POST" action="<?php echo base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input value="<?= set_value('email'); ?>" type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address...">
                                        <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input value="<?= set_value('password'); ?>" type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Masuk
                                    </button>
                                    <hr>

                                </form>

                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Lupas Sandi ?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?php echo base_url('auth/registrasi') ?>">Buat Akun</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>