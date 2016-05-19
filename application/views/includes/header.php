<?php require_once("top_includes.php"); ?>

<body onload="load()">
<div id="wrapper">
<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">    

                <div class="dropdown profile-element"> <!-- <span>RDSS</span> -->
                <span><img alt="image" class="img image" src="<?php echo(base_url()); ?>assets/img/moh.jpg" />
                </span>

                  <?php if($this->session->userdata('role')!="" || $this->session->userdata('role')!=""){ ?>
                    <a> <span class="clear"> <span class="block m-t-xs" style="font-size:14px"><!-- Logged in as: --> <i class="fa fa-user"></i><strong class="font-bold"> <?php echo($this->session->userdata('names'));?></strong></span>  </span></a>
                  <?php } else { ?>
                  <!-- <a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/login">Login</a> -->
                  <!-- <a href="<?php echo(base_url()); ?>index.php/login"><i class="fa fa-user"></i> login</a> -->
                  <a style="font-size:15px"><i></i></a>
                  <?php }?>
                </div>
                <!-- <i class="fa fa-th-large"> -->
                  </li>
                    <li class="active">
                        <a href="<?php echo(base_url()); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span> <!-- <span class="fa arrow"></span> --></a>
                        
                    </li>


 <?php if($this->session->userdata('role')!="" || $this->session->userdata('role')!=""){ ?>
                   
  
                         <li>
                        <a href="<?php echo(base_url()); ?>index.php/alert"><i class="fa fa-exclamation"></i> <span class="nav-label" style="font-size:16px">Issue alert</span><!-- <span
                        class="fa arrow"></span> --></a></li>


                     <?php }?>


        <?php if($this->session->userdata('role') == "admin" ){?>
                   <li>
            <a href="#"><i class="fa fa-gears"></i> <span class="nav-label" style="font-size:16px">Settings</span><span
                        class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">                    
                 <li><a  class="nav-label" style="font-size:15px"href="<?php echo(base_url()); ?>index.php/disease">diseases</a></li>
                    <li><a class="nav-label" style="font-size:15px"href="<?php echo(base_url()); ?>index.php/county">counties</a></li>
                    <li><a  class="nav-label" style="font-size:15px"href="<?php echo(base_url()); ?>index.php/facility">facilities</a></li>
                    <li><a class="nav-label" style="font-size:15px"href="<?php echo(base_url()); ?>index.php/sub_county">sub counties</a></li>
                                                                       
             </ul>
            </li>
           
            <?php } ?>


              <li>
                 <a href="#"><i class="fa fa-list"></i> <span class="nav-label" style="font-size:16px">Reports</span><span
                        class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        <li><a class="nav-label" style="font-size:15px"href="<?php echo(base_url()); ?>index.php/welcome/report_by_county">view by county</a></li>
                     <li><a class="nav-label" style="font-size:15px"href="<?php echo(base_url()); ?>index.php/welcome/report_per_sub_county">view by sub county</a></li>
                     <li><a class="nav-label" style="font-size:15px"href="<?php echo(base_url()); ?>index.php/welcome/report_per_user">view by user</a></li>

                        <li><a class="nav-label" style="font-size:15px"href="<?php echo(base_url()); ?>index.php/welcome/view_report_by_disease">view by disease</a></li>
                         <li><a class="nav-label" style="font-size:15px"href="<?php echo(base_url()); ?>index.php/welcome/report_per_facility">view by facility</a></li>
            <li><a class="nav-label" style="font-size:15px"href="<?php echo(base_url()); ?>index.php/alert/weekly_report"></i>Weekly reports</a></li>
                        </ul></li>


         
            <li><a href="<?php echo(base_url()); ?>index.php/welcome/view_twitter_reports"><i class="fa fa-twitter fa-fw"></i><span class="nav-label" style="font-size:16px">Tweet tracker</span></a></li>



        <?php if($this->session->userdata('role') == "admin" ){ ?>
              <li><a href="<?php echo(base_url()); ?>index.php/users"><i class="fa fa-group"></i><span class="nav-label" style="font-size:16px">Manage users</span> </a></li>
 <?php } ?>

               
              <?php if($this->session->userdata('role')=="" || $this->session->userdata('role')==""){ ?>
            <li><li><a class="nav-label" style="font-size:15px"href="<?php echo(base_url()); ?>index.php/register">Register</a></li></li>
             <?php  }?>

                  
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
           <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
           <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
              </div>
    
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Real-time Disease Monitoring Tool</span>
                    </li>

                    <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                   </li>
           
                <?php if($this->session->userdata('role')!="" || $this->session->userdata('role')!=""){ ?>

                 <li><a href="<?php echo base_url(); ?>index.php/login/logout"><i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>

                  <?php } else{ ?>
                     <li><a href="<?php echo(base_url()); ?>index.php/login"><i class="fa fa-user"></i> login</a>
                </li>

                  <?php  }?>
                     <li>
                    <a class="right-sidebar-toggle"><i class="fa fa-tasks"></i>
                    </a>
                </li>

<!--   <a href="<?php echo(base_url()); ?>index.php/login"><i class="fa fa-user"></i> login</a> -->

            </ul>

        </nav>
        </div>









