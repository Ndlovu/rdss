<?php require_once("top_includes.php"); ?>

<body>
<div id="wrapper">
<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">    

                <div class="dropdown profile-element"> <!-- <span>RDSS</span> -->
                  <?php if($this->session->userdata('role')!="" || $this->session->userdata('role')!=""){ ?>
                    <a> <span class="clear"> <span class="block m-t-xs" style="font-size:14px">Logged in as: <strong class="font-bold"> <?php echo($this->session->userdata('names'));?></strong></span>  </span></a>
                  <?php } else { ?>
                  <a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/login">Login</a><?php }?>
                </div>
                        
                     <!--    <div class="logo-element">IN+
                        </div> -->
                    </li>
                    <li class="active">
                        <a href="<?php echo(base_url()); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span> <span class="fa arrow"></span></a>
                        
                    </li>
        <?php if($this->session->userdata('role')!="" || $this->session->userdata('role')!=""){ ?>
                   <li>
            <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label" style="font-size:16px">Settings</span><span
                        class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                    
                    <li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/disease">Infectious disease(s)</a></li>
                    <li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/county">Counties</a></li>
                    <li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/facility">Facilities</a></li>
                    <li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/sub_county">Sub counties</a></li>
                     <li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/alert">Issue alert</a></li>
                      <li>
                    <a href="<?php echo base_url(); ?>index.php/login/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                    
             </ul>



            </li>
            <?php } ?>
            <li><li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/register">Register</a></li></li>
              
                 
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
        
                
               
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>