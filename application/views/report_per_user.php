<?php require_once("includes/header.php"); ?>


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>view alerts per user</h2>
         </div>
        <div class="col-sm-8">
           
        </div>
    </div>



<form action="<?= base_url();?>index.php/welcome/report_per_user" method="post" enctype="multipart/form-data" autocomplete="on">
    <div class="form-group"> 
        <div class="col-sm-5"><select class="form-control m-b" name="user_name">
                            <option>users</option>
                            <?php foreach ($users as $user):?>
    <option name="user_name"> <?php echo $user->names;?></option>
<?php endforeach; ?>
                        </select></div>
                    <div class="col-sm-5"><button type="submit" class="btn btn-primary">Get report for this user</button></div>

             </form>
<?php if(isset($filtered_by_user)){?>

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
                            foreach($filtered_by_user as $filtered_object):?>
                                <tr>
                                    <td>
                                        <?php echo $count;?>
                                    </td>
                                    <td><?php echo $filtered_object->disease_name; ?></td>
                                    <td><?php echo $filtered_object->f_name.", ". $filtered_object->sub_county_name ; ?></td>
                                    <td><?php echo $filtered_object->age; ?></td>
                                     <td><?php echo $filtered_object->sex; ?></td>
                                    <td><?php echo $filtered_object->status; ?></td>
                                     <td><?php echo $filtered_object->report_date; ?></td>
                                     <td data-toggle="modal" data-target="#myModal_<?php $filtered_object->alert_id;?>"><i class="fa fa-envelope"></i>
                    <div class="modal inmodal"  id="myModal_<?php $filtered_object->alert_id;?>" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Alert messages</h4>messages</small>
                                        </div>
                                       
                <!-- this is the comment section -->

                 <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>comments on incident</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                        <!--         <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul> -->
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content no-padding">
                            <ul class="list-group">
                            <?php foreach($messages as $msg):
                            if ($msg->alert_id == $filtered_object->alert_id ){?>

                                <li class="list-group-item">
                                    <p><a class="text-info" href="#"><?php echo $msg->user_name;?></a> <?php echo $msg->message;?></p>
                                    <small class="block text-muted"><i class="fa fa-clock-o"></i><?php echo " ".$msg->date_time;?></small>
                                </li>
                            <?php } endforeach;?>
                               </ul>
                        </div>
                    </div>


                             <form action="<?= base_url();?>index.php/messages/submit_message" method="post" enctype="multipart/form-data">  
                            <div class="modal-body">
                        <input type="hidden" name="alert_id" value="<?php echo $filtered_object->alert_id; ?>" class="form-control">
                        <div class="form-group"><label>Message:</label>
                        <input type="text" required name="message" class="form-control" ></div>



                            </div>
                            <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary">send message</button>
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                          
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            </td> 

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
                   There are no alerts on this system for this particular user. 
                <br/><a href="<?php echo(base_url()); ?>" class="btn btn-primary m-t">Home</a>
            </div>
        </div>
    </div>

<?php }?> 



<?php require_once("includes/footer.php"); ?>