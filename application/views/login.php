<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RDSS | login</title>

    <link href="<?php echo(base_url()); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo(base_url()); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
               <h2 class="font-bold">Welcome to RDSS</h2>
               <p style="color:green">Quote of the day</p>
               <p>Doctors and nurses, with their training and their experiences, they would be able to detect unusual patterns of disease. That's why we say it is important for every country to have a proper surveillance system. The function of the surveillance system is to detect unusual patterns of diseases.</p> <p style="color:blue"> Margaret Chan (WHO)</p>
               <br/>
                <p style="font-style:italic">Fostering disease surveillance efforts through timely reporting.</p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
            <form class="m-t" method="post" role="form" action="<?php base_url(); ?>login/validate">
            <?php if(isset($error_message)):?>
              <div class="alert alert-success">
              <p style="color:red">Wrong username or password. please try again.</p>                
                </div> 
                <?php endif;?>

                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Password" required="">
                </div>
                <input type="submit" class="btn btn-primary block full-width m-b" value="Login">

               <!--  <a href="#"><small style="font-size: 15px">Forgot password?</small></a> -->
                   <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                         <a class="btn btn-sm btn-white btn-block" href="<?php echo(base_url()); ?>index.php/register">Create an account</a>
               <!-- <p>Have an account?<a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/register">Register</a></p> -->
            </form>
                    <p class="m-t">
                        <small>A real time disease surveillance tool</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Identities Tech
            </div>
            <div class="col-md-6 text-right">
               <small>&copy; <?php echo(date("Y")); ?></small>
            </div>
        </div>
    </div>

</body>

</html>
