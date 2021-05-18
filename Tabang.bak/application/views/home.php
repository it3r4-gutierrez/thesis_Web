<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CodeIgniter Login</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form-elements.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
        href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
    <div class="container">
        <h1 class="page-header text-center">CodeIgniter Login with Session</h1>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php
                $user = $this->session->userdata('user');
                extract($user);
                ?>
                <h2>Welcome to Homepage </h2>
                <h4>User Info:</h4>

                <p>First Name: <?php echo $FirstName; ?></p>
                <p>Last Name: <?php echo $LastName; ?></p>
                <p>Middle Name: <?php echo $MiddleName; ?></p>
                <p>Email: <?php echo $emailAddress; ?></p>
                <p>Password: <?php echo $password; ?></p>
                <a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.backstretch.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
</body>

</html>