<?php require_once("includes/header.php"); ?>


<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
        <h2 style="color: #b3b3b3">User Dashboard</h2>
            <ol class="breadcrumb">
                <li>
                    <a style="color: #b3b3b3" href="index.html">  <?php if($this->session->userdata('role')!="" || $this->session->userdata('role')!=""){ ?>   <a> <span class="clear"> <span class="block m-t-xs" style="font-size:14px"></i><strong class="font-bold"> Welcome</strong></span>  </span></a><?php }?></a>
                </li>
                <li class="active">
                    <a style="color: #b3b3b3" href="index.html">  <?php if($this->session->userdata('role')!="" || $this->session->userdata('role')!=""){ ?>   <a> <span class="clear"> <span class="block m-t-xs" style="font-size:14px"> <strong class="font-bold"> <?php echo($this->session->userdata('names'));?></strong></span>  </span></a><?php }?></a>                </li>
            </ol>
    </div>

    <div class="col-sm-4">
<!-- 
                <div class="alert alert-success">
                
                </div> -->

    </div>


<div class="col-sm-4">
<div class="title-action">
     <a data-toggle="modal" data-target="#add_alert" class="btn btn-primary">Add an alert</a>

</div>
</div>
</div>
<!-- end of dashboard header -->

 <div class="wrapper wrapper-content animated fadeInRight">

    <div class="row m-t-lg">

        <div class="col-lg-3">

                <div>                    
                    <table class="table">
                        <tbody>
<tr>
                  <td >
                             
                                <button type="button" class="btn btn-default m-r-sm"><i class="fa fa-envelope-o"></i></button>
                                <a class="font-bold" data-target="#msgModal" data-toggle="modal" href="#">Messages 
                                <?php if($count > 0 ){?>
                                <span class="label label-primary"><?php echo $count; ?></span>

                                    <?php }?></a>


                            </td>
                            
                                    
                        <div class="text-center">
                                     <div class="modal inmodal" id="msgModal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated fadeInDown">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-institution modal-icon"></i>
                                                        <h4 class="modal-title">Message board</h4>
                                                        <small class="font-bold">read and send messages about particular incidents</small>
                                                    </div>
                                                    <div class="ibox float-e-margins">

                            <?php  foreach($user_report as $filtered_object):?>
                            <div class="ibox-title">
                              <div class="row">
                              <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                                <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                            </div>
                            <div class="col-xs-8">
                                <label>Disease:</label>
                                <h8><?php echo $filtered_object ->disease_name; ?></h8>
                            </div>

                            <div class="col-xs-8">
                               <label>Location:</label>
                                <h8><?php echo  $filtered_object->f_name.", ". $filtered_object->sub_county_name; ?></h8>
                            </div>
                            <div class="col-xs-8">
                                <label>Age:</label>
                                <h8><?php echo $filtered_object->age; ?></h8>
                            </div>
                            <div class="col-xs-8">
                                <label>Gender:</label>
                                <h8><?php echo $filtered_object->sex; ?></h8>
                            </div>
                            <div class="col-xs-8">
                                <label>Status:</label>
                                <h8><?php echo $filtered_object->status; ?></h8>
                            </div>
                            <div class="col-xs-8">
                                <label>Date:</label>
                                <h8><?php echo $filtered_object->report_date; ?></h8> </div>
                        </div>
                        <div class="ibox-content no-padding">
                            <ul class="list-group">
                            <?php foreach($messages as $msg):
                            if ($msg->alert_id == $filtered_object->alert_id ){?>
                                <li class="list-group-item">
                                    <p><a class="text-info" href="#"><small>Posted</small><?php echo $msg->user_name;?></a> <?php echo $msg->message;?></p>
                                    <small class="block text-muted"><i class="fa fa-clock-o"></i><?php echo " ".$msg->date_time;?></small>
                                </li>
                        <br/>
                                <?php } endforeach;?>
                               </ul>
<form action="<?= base_url();?>index.php/messages/submit_message" method="post" enctype="multipart/form-data">  
                            <div class="modal-body">
                        <input type="hidden" name="alert_id" value="<?php echo $filtered_object->alert_id; ?>" class="form-control">
                        <div class="form-group"><label>Message:</label>
                          <input type="text" required name="message" class="form-control" ></div>
                        <button type="submit" class="btn btn-primary">send message</button> 

                        </div></form>                                                   
            </div>
            </div>
                        <?php endforeach;?>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                          
                                        </div>


                                               </div>

                                            </div>

                                        </div>
                        </div>
                        </div>
                        

                        </tr>

                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm"> <i class="fa fa-institution"></i>

                               

                                </button>
                 
                               <a href=""> <span  style="font-size:12px"></i><strong class="font-bold"> Notifications</strong></span>  </a>
                            </td>
                        </tr>
                      <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm"><i class="fa fa-bell-o"></i> </button>
                                
                                <a href="<?php echo(base_url()); ?>index.php/welcome/report_per_sub_county"> <span  style="font-size:12px"></i><strong class="font-bold"> Sub county alerts</strong></span>  </a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm"><i class="fa fa-list"></i></button>
                                
                                 <a href="<?php echo(base_url()); ?>index.php/alert/weekly_report"> <span  style="font-size:12px"></i><strong class="font-bold"> Weekly reports </strong></span>  </a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                
            </div>
            <br/>
            
                <div class="ibox ">
                    <div class="ibox-title">
                        <!-- <h5><div style="color: red "> Disease outbreaks</div></h5> -->
                        <div class="row">
                            <div class="col-xs-12">
                        <div class="sk-spinner sk-spinner-double-bounce">
                            <div class="sk-double-bounce1" style="color:red">  <i class="fa fa-arrow-down"></i></a><h5>Disease outbreaks </h5></div>
                            <div class="sk-double-bounce2" style="color:red">  <i class="fa fa-arrow-down"></i></a> latest reports</div>
                        </div>
                      
                            </div>


                        </div>
                    </div>

                    <div class="ibox-content">
                            <b style="color: blue">the latest</b>
                    </div>

                </div>


            </div>


        <div class="col-lg-3">
            <div class="row">
                       
                            <div class="ibox-content text-center">
                                <h3></h3>
                                <div class="m-b-sm">


                

                                                 <img alt="image" height="150px" width="110px" class="img-circle" src="<?php echo(base_url()); ?>assets/img/a4.jpg"">

                                            <!-- <img alt="image" class="img image" src="<?php echo(base_url()); ?>assets/img/moh.jpg" /> -->
                                </div>
                                    <p class="font-bold">More info here</p>

                                   

                            <div class="text-center">
                                    <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#picModal"><i class="fa fa-edit"></i> Edit </a>
                                    <a class="btn btn-xs btn-warning"><i class="fa fa-trash"></i></a>
                                        <div class="modal inmodal" id="picModal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated fadeInDown">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-institution modal-icon"></i>
                                                        <h4 class="modal-title">Edit profile picture</h4>
                                                        <small class="font-bold">Add account picture</small>
                                                    </div>

                                                    <form action="" method="post" enctype="multipart/form-data" autocomplete="on">
                                                    <div class="modal-body">                                                  
                                                            
                                                            <div class="form-group"><label></label> <input type="file" name="userfile[]" placeholder="Location choice" class="form-contro" value=""></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                <!-- end of the modal form -->
                             
                                </div>
                            </div>

                        <br/>
                            <div class="ibox-content text-center">
                                <div>
                                 <div class="widget lazur-bg p-xl">

                                    <h3>
                                        Contacts
                                    </h3>

                      
                                    <ul class="list-unstyled m-t-md">
                                        <li>
                                            <span class="fa fa-envelope m-r-xs"></span>
                                            <label>Email:</label><?php echo($this->session->userdata('email'));?>
                                                                                
                                        </li>
                                        <li>
                                            <span class="fa fa-home m-r-xs"></span>
                                            <label>ID:</label><?php echo($this->session->userdata('national_id'));?>
                                                                                 
                                            
                                        </li>
                                        <li>
                                            <span class="fa fa-phone m-r-xs"></span>
                                            <label>Contact:</label><?php echo($this->session->userdata('phone_number'));?>
                                                                             
                                            
                                        </li>
                                    </ul>
                          
                                <div class="text-center">
                                    <a class="btn btn-xs btn-default" a data-target="#edit_profile_modal_" data-toggle="modal" href="#"><i class="fa fa-edit"></i> Edit </a>


                                        <div class="modal inmodal" id="edit_profile_modal_" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated fadeInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                                        <h4 class="modal-title">Edit your personal information<strong></strong> </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    
                                        <form style="color: black;" class="m-t" method="post" role="form" action="<?php echo(base_url()); ?>register/edit_user">
                                            <div class="form-group">
                                                <input name="names" type="text" class="form-control" value="<?php echo($this->session->userdata('names')); ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <input name="email" type="email" class="form-control" value="<?php echo($this->session->userdata('email')); ?>" required>
                                            </div>
                                            <input type="hidden" name="user_id" value="<?php echo($this->session->userdata('user_id')); ?>" >
                                            <!-- <div class="form-group">
                                                <input name="role" type="text"  value="<?php echo($this->session->userdata('role')); ?>"  >
                                            </div> -->
                                            <div class="form-group">
                                                <input name="national_id" type="number" class="form-control" value="<?php echo($this->session->userdata('national_id')); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="phone_number" type="tel" class="form-control" placeholder="Phone Number" value="<?php echo($this->session->userdata('phone_number')); ?>" required="">
                                            </div>
                                       
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                        <input type="submit" class="btn btn-primary" value="Update" >
                                    </div>
                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                

                                 </div>
                                </div>
                            </div>
        
                    </div>
        </div>



        <div class="col-lg-6">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                <div>
                <div class="chat-activity-list">
                    <h3 class="text-center"><strong>User alerts</strong></h3>
                                     <div class="chat-element">
<?php if(isset($user_report)){?>
<table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Disease</th>
                                    <th>Location</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    
                                   </tr>

                            </thead>
                             <tbody>
                            <?php $count = 1;

                            foreach($user_report as $filtered_object):?>
                                <tr>
                                    <td>
                                        <?php echo $count;?>
                                    </td>
                                    <td><?php echo $filtered_object->disease_name;?></td>
                                    <td><?php echo  $filtered_object->f_name.", ". $filtered_object->sub_county_name;?></td>
                                    <td><?php echo $filtered_object->age; ?></td>
                                    <td><?php echo $filtered_object->sex; ?></td>
                                    <td><?php echo $filtered_object->status; ?></td>
                                    <td><?php echo $filtered_object->report_date; ?></td>
                                </tr>

                            <?php $count++;
                            endforeach;?>         
                            </tbody>
        
                            </table>



<?php }else{?>
    <div class="wrapper wrapper-content">
        <div class="middle-box text-center animated fadeInRightBig">
            <h3 class="font-bold">No alerts to  display</h3>

            <div class="error-desc">
                   There are no alerts on this system for this particular facility. 
                <br/><a href="<?php echo(base_url()); ?>" class="btn btn-primary m-t">Home</a>
            </div>
        </div>
    </div>

<?php }?> 


                        
                    </div>


                </div>


            

                </div>                

                        <div class="chat-form">

                            <form role="form">

                                <div class="text-right">
                                    <button type="button" class="btn btn-sm btn-primary m-t-n-xs" data-toggle="modal" data-target="#add_alert"><strong>Add an alert</strong></button>
                                    <!--  <a href="#"  data-toggle="modal" data-target="#add_alert" class="btn btn-primary">Add an alert</a> -->
                                </div>
                            </form>
                            <!--modal form for new houses -->

                        
<div class="modal inmodal" id="add_alert" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                    <div class="modal-content animated fadeInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">alert</h4>
                                            <small class="font-bold">add an alert here.</small>
                                        </div>
                                        <form action="<?= base_url();?>index.php/alert/save_alert" method="post" enctype="multipart/form-data">  
                                        <div class="modal-body">

                             <div class="form-group"><label>Disease: </label><select class="form-control m-b" name="disease_name"  >
                              <option value = "">[Select]</option>
                                <?php foreach ($disease as $disease_object): ?>  
                                  <option  value="<?php echo $disease_object->disease_name;?>" ><?php echo $disease_object->disease_name;?></option><?php endforeach; ?>
                                                    </select></div>

                
                                        <div class="form-group"><label>Age :</label>
                                        <input type="text" required name="age" class="form-control" placeholder="Age">
                                        </div>


                                <div class="form-group"><label>Sex :</label>
                                    <input type="text" required name="sex" class="form-control" placeholder="Sex">
                                </div>

                                 <div class="form-group"><label>Status :</label>
                                    <input type="text" required name="status" class="form-control" placeholder="Status">
                                </div>

                              
                                <div class="form-group" id="data_1">
                                <label class="font-noraml">Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014"  required name="date">
                                </div>
                            </div>


                                        </div>
                                        <div class="modal-footer">
                                             <button type="submit" class="btn btn-primary">Add alert</button>

                                             <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                           <!--  <input type="submit" id="submit" name="dsubmit" value="Update"> -->
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
    <!-- end of the modal form -->

                        </div>
                </div>

        <br/>






<?php require_once("includes/footer.php"); 