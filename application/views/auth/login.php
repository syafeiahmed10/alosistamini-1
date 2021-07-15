<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="text-center mt-4"><img style="max-width: 100%;max-height:170px" src="<?php echo base_url('assets/img/logo_jawa_tengah_icon.ico'); ?>" alt=""></div>
            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4 ">Alosista PKP<sup>V2</sup></h1>
                                </div>

                                <!-- DISINI ada  -->
                                <?php echo $this->session->flashdata('message');
                                ?>

                                <form class="user" method="POST" action="<?php echo base_url('auth') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter username " value="<?php echo set_value('username') ?>">
                                        <!-- <?php echo form_error('username'); ?> -->
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <!-- <?php echo form_error('password'); ?> -->
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>


                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration') ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>