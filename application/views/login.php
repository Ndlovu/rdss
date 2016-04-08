<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RDSS</title>

    <link href="<?php echo(base_url()); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">rdss</h1>
               <!--  <h3 style="font-size: 20px">Real-time Disease Surveillance System</h3> -->
            <p style="font-size: 18px" >Login.</p>
            <form  method="post" role="form" action="<?php base_url(); ?>login/validate">
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Password" required="">
                </div>
                <input type="submit" class="btn btn-primary block full-width m-b" value="Login">

               <!--  <a href="#"><small style="font-size: 15px">Forgot password?</small></a> -->
               <p>Have an account?<a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/register">Register</a></p>
            </form>
            <p> <small>Identities Tech &copy; <?php echo(date("Y")); ?></small> </p>


            </div>

          
        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="<?php echo(base_url()); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo(base_url()); ?>assets/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo(base_url()); ?>assets/js/plugins/iCheck/icheck.min.js"></script>
   
</body>

</html>

