<?php require_once("top_includes.php"); ?>

<body>
<div id="wrapper">
<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">


                    
                <div class="dropdown profile-element"> <span>
                           RDSS
                             </span>


                    <a> <span class="clear"> <span class="block m-t-xs" style="font-size:14px">Logged in as: <strong
                                    class="font-bold"> <?php echo($this->session->userdata('names'));?></strong>
                             </span>  </span></a>
                    <!--<ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>-->
                </div>
                        <!-- <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>

<a> <span class="clear"> <span class="block m-t-xs" style="font-size:14px">Logged in as: <strong
                                    class="font-bold"> <?php echo($this->session->userdata('names')); ?></strong>
                             </span>  </span></a>


                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Lucian</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                               
                            </ul>
                        </div> -->
                        <div class="logo-element">IN+
                        </div>
                    </li>
                    <li class="active">
                        <a href="<?php echo(base_url()); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span> <span class="fa arrow"></span></a>
                        
                    </li>
                   <li>
            <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label" style="font-size:16px">Settings</span><span
                        class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                    
                    <li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/disease">Infectious disease(s)</a></li>
                    <li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/county">Counties</a></li>
                    <li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/facility">Facilities</a></li>
                    <li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/sub_county">Sub counties</a></li>
                     <li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/alert">Issue alert</a></li>
                    
             </ul>



            </li>
            <li><li><a style="font-size:15px"href="<?php echo(base_url()); ?>index.php/register">Register</a></li></li>
              
                 
                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Real-time Disease Monitoring Tool</span>
                
                
                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>