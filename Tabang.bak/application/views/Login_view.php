<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabang Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetslogin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetslogin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetslogin/css/form-elements.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetslogin/css/style.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assetslogin/ico/favicon.png">

</head>

<body>
    <div class="top-content"
        style="background-image: url('<?php echo base_url(); ?>assetslogin/img/backgrounds/1.jpg');">>

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>Tabang</strong> Login Form</h1>
                        <!-- <div class="description">
                            <p>
                                This is a free responsive login form made with Bootstrap.
                                Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and
                                use it as you like!
                            </p>
                        </div> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Login to our site</h3>
                                <p>Enter your Email and password to log on:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form method="POST" action="<?php echo base_url(); ?>index.php/User/login" role="form"
                                class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Email</label>
                                    <input type="text" name="email" placeholder="Email..."
                                        class="form-email form-control" id="form-email" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="password" placeholder="Password..."
                                        class="form-password form-control" id="form-password" required>
                                </div>
                                <button type="submit" class="btn">Sign in!</button>
                            </form>
                        </div>
                        <?php
                        if ($this->session->flashdata('error')) {
                        ?>
                        <div class="alert alert-danger text-center" style="margin-top:20px;">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
                <div class="row" style="padding-top: 50;">
                    <div class="col-sm-6 col-sm-offset-3 social-login">
                        <!-- <h3>...or login with:</h3> -->
                        <div class="social-login-buttons">
                            <!-- <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                                <i class="fa fa-google-plus"></i> Google Plus
                            </a> -->
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 50;">
                    <div class="col-sm-6 col-sm-offset-3 social-login">
                        <!-- <h3>...or login with:</h3> -->
                        <div class="social-login-buttons">
                            <!-- <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                                <i class="fa fa-google-plus"></i> Google Plus
                            </a> -->
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 50;">
                    <div class="col-sm-6 col-sm-offset-3 social-login">
                        <!-- <h3>...or login with:</h3> -->
                        <div class="social-login-buttons">
                            <!-- <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                                <i class="fa fa-google-plus"></i> Google Plus
                            </a> -->
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 50;">
                    <div class="col-sm-6 col-sm-offset-3 social-login">
                        <!-- <h3>...or login with:</h3> -->
                        <div class="social-login-buttons">
                            <!-- <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                                <i class="fa fa-google-plus"></i> Google Plus
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <!-- Javascript -->
    <script src="<?php echo base_url(); ?>aassetslogin/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assetsalogin/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assetaslogin/js/jquery.backstretch.min.js"></script>
    <script src="<?php echo base_url(); ?>assetslogin/js/scripts.js"></script>


</body>

</html>