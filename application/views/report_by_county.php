<?php require_once("includes/header.php"); ?>


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>view alerts per county</h2>
         </div>
        <div class="col-sm-8">
           
        </div>
    </div>



<form action="<?= base_url();?>index.php/welcome/report_by_county" method="post" enctype="multipart/form-data" autocomplete="on">
    <div class="form-group"> 
        <div class="col-sm-5"><select class="form-control m-b" name="county_name">
                            <option>county</option>
                            <?php foreach ($counties as $county):?>
    <option name="county_name"> <?php echo $county->county_name;?></option>
<?php endforeach; ?>
                        </select></div>
                    <div class="col-sm-5"><button type="submit" class="btn btn-primary">Get report for this county</button></div>

             </form>
<?php if(isset($filter_by_county)){?>
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
                            foreach($filter_by_county as $filtered_object):?>
                                <tr>
                                    <td>
                                        <?php echo $count;?>
                                    </td>
                                    <td><?php echo $filtered_object['disease'];?></td>
                                    <td><?php echo  $filtered_object['facility'].", ". $filtered_object['sub_county'];?></td>
                                    <td><?php echo $filtered_object['age']; ?></td>
                                    <td><?php echo $filtered_object['sex']; ?></td>
                                    <td><?php echo $filtered_object['status']; ?></td>
                                    <td><?php echo $filtered_object['date']; ?></td>
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
                   There are no alerts on this system for this particular county. 
                <br/><a href="<?php echo(base_url()); ?>" class="btn btn-primary m-t">Home</a>
            </div>
        </div>
    </div>

<?php }?> 





<?php require_once("includes/footer.php"); ?>