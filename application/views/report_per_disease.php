<?php require_once("includes/header.php"); ?>


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>view alerts per disease</h2>
         </div>
        <div class="col-sm-8">
           
        </div>
    </div>
<br/>


<form action="<?= base_url();?>index.php/welcome/view_report_by_disease" method="post" enctype="multipart/form-data" autocomplete="on">
    <div class="form-group"> 
        <div class="col-sm-5"><select class="form-control m-b" name="disease_name">
                            <option>disease</option>
                            <?php foreach ($diseases as $disease):?>
    <option name="disease_name"> <?php echo $disease->disease_name;?></option>
<?php endforeach; ?>
                        </select></div>
                    <div class="col-sm-5"><button type="submit" class="btn btn-primary">Get report for this disease</button></div>

             </form>
<?php if(isset($disease_report)){?>
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
                            <tbody><td></td>
                            <?php $count = 1;
                            $val = 0;
                            foreach($disease_report as $filtered_object):?>
                                <tr>
                            <td><?php echo $count;?></td>
                            <td> <?php echo($disease_report[$val]->disease_name);?></td>
                                  <td> <?php echo $disease_report[$val]->f_name.", ".$disease_report[$val]->sub_county_name;?></td>
                                  <td> <?php echo($disease_report[$val]->age);?></td>
                                  <td> <?php echo($disease_report[$val]->sex);?></td>
                                  <td> <?php echo($disease_report[$val]->status);?></td>
                                  <td> <?php echo($disease_report[$val]->report_date);?></td>
                                    </tr>

                            <?php $count++;
                            $val++;
                            endforeach;?>         
                            </tbody>
                            </table>



<?php }else{?>


    <div class="wrapper wrapper-content">
        <div class="middle-box text-center animated fadeInRightBig">
            <h3 class="font-bold">No alerts to  display</h3>

            <div class="error-desc">
                   There are no alerts on this system for this particular disease. 
                <br/><a href="<?php echo(base_url()); ?>" class="btn btn-primary m-t">Home</a>
            </div>
        </div>
    </div>

<?php }?> 





<?php require_once("includes/footer.php"); ?>