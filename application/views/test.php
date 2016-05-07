<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>RDSS</title>
    <link href="<?php echo(base_url()); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>assets/css/style.css" rel="stylesheet">
</head>

    <div id="wrapper">

          <!-- <div id="page-wrapper" class="gray-bg"> -->
     
      <!-- <div class="wrapper wrapper-content animated fadeInRight"> -->
               <div class="row" >
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Complete the registration process</h5>
                            </div>
                        <div class="ibox-content">
                         <h2>
                                Registration Form
                            </h2>
                            <p>
                                Please register to access more system functionality and more reports
                            </p>

                            <form id="form" action="<?php echo(base_url()); ?>index.php/register/create_user" class="wizard-big">
                                <h1>Account</h1>
                                <fieldset>
                                    <h2>Account Information</h2>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Username *</label>
                                                <input id="userName" name="userName" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input id="password" name="password" type="password" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password *</label>
                                                <input id="confirm" name="confirm" type="password" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <h1>Profile</h1>
                                <fieldset>
                                    <h2>Profile Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Full names *</label>
                                                <input id="names" name="names" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>National ID *</label>
                                                <input id="national_id" name="national_id" type="text" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input id="email" name="email" type="text" class="form-control required email">
                                            </div>
                                            <div class="form-group">
                                                <label>Address *</label>
                                                <input id="address" name="address" type="text" class="form-control">
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                         <div class="form-group">
                                                <label>Phone number *</label>
                                                <input id="phone_number" name="address" type="text" class="form-control">
                                            </div>

                                         </div>
                                    </div>
                                </fieldset>

                                <h1>Warning</h1>
                                <fieldset>
                                    <div class="text-center" style="margin-top: 120px">
                                        <h2>Welcome. Thank you registering</h2>
                                    </div>
                                </fieldset>

                                <h1>Finish</h1>
                                <fieldset>
                                    <h2>Terms and Conditions</h2>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
           <!--  </div> -->
   <div class="footer">
    <div class="pull-right">
        <p>Page rendered in <strong>{elapsed_time}</strong> seconds</p>
    </div>
    <div>
        <strong>Copyright</strong>. Identities Tech &copy; <?php echo date("Y");?>
    </div>
</div>
        <!-- </div> -->
        </div>


<!-- type="text/javascript" src="<?php echo(base_url()); ?>assets/ -->
    <!-- Mainly scripts -->
    <script src="<?php echo(base_url()); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo(base_url()); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo(base_url()); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo(base_url()); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo(base_url()); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo(base_url()); ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="<?php echo(base_url()); ?>assets/js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?php echo(base_url()); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>

</body>

</html>
