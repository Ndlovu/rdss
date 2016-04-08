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
                                     <td></td>
                                      <td></td>

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