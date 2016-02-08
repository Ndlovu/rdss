<?php require_once("includes/header.php"); ?>


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Alerts</h2>

        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="#"  data-toggle="modal" data-target="#add_alert" class="btn btn-primary">Add an alert</a>


            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content">
       <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Faciity</h5>
                        <div class="ibox-content">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Disease</th>
                                    <th>Location</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Status</th>
                                    
                                    <th>Edit</th>
                                    </tr>

                            </thead>

                            <tbody>
                            <?php $count=1; ?>
                            <?php foreach ($alert as $alert_object): ?>

                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php foreach ($disease as $disease_object) {
                                        if ($alert_object->disease_id==$disease_object->disease_id) {
                                            echo $disease_object->disease_name;
                                        }
                                    }?></td>
                                    <td><?php foreach ($facility as $fclty) {
                                        if ($alert_object->facility_id==$fclty->facility_id) {
                                            echo $fclty->facility_name;
                                        }
                                    } ?></td>
                                    <td><?php echo $alert_object->age; ?></td>
                                    <td><?php echo $alert_object->sex; ?></td>
                                    <td><?php echo $alert_object->status; ?></td>
                            <td data-toggle="modal" data-target="#myModal_<?php echo $alert_object->alert_id; ?>"><i class="fa fa-wrench"></i>
                       <div class="modal inmodal"  id="myModal_<?php echo $alert_object->alert_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Edit alert</h4>Update and delete details about a particular alert</small>
                                        </div>
                                         <form action="<?= base_url();?>index.php/alert/update_alert" method="post" enctype="multipart/form-data">  
                                        <div class="modal-body">

                 

                                       <div class="form-group"><input type="hidden" name="alert_id" value="<?php echo $alert_object->alert_id; ?>" class="form-control"></div>
                                       <div class="form-group"><label>disease: </label> <select name="disease_name"class="form-control">
                                        <?php foreach ($disease as $disease_object): ?>
                                        <option name="disease_name" <?php if ($alert_object->disease_id==$disease_object->disease_id) {echo "Selected";
                                                } ?> ><?php  echo $disease_object->disease_name;?>
                                                </option>
                                        <?php endforeach;?>
                                        </select>
                                        </div>


                                      
                                       
                                 <div class="form-group"><label>facility: </label><select name="facility_name" class="form-control">
                            <?php foreach ($facility as $facility_object): ?>
                            <option name="facility_name" <?php if ($alert_object->facility_id==$facility_object->facility_id) {echo "Selected";
                                    }?> ><?php  echo $facility_object->facility_name;?>
                                    </option>
                            <?php endforeach;?>
                            </select></div>

                            <div class="form-group"><label>age:</label>
                                                <input type="text" required name="age" class="form-control" value="<?php echo $alert_object->age; ?>">
                                            </div>

                                <div class="form-group"><label>sex:</label>
                                    <input type="text" required name="sex" class="form-control" value="<?php echo $alert_object->sex; ?>">
                                </div>

                                   <div class="form-group"><label>status:</label>
                                    <input type="text" required name="status" class="form-control" value="<?php echo $alert_object->status; ?>">
                                </div>

                                        </div>
                                        <div class="modal-footer">
                                             <button type="submit" class="btn btn-primary">save changes</button>

                                             <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                           <!--  <input type="submit" id="submit" name="dsubmit" value="Update"> -->
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            </td> 

                                    <td>
                                        <a href="<?php echo(base_url()."index.php/alert/delete_alert/".$alert_object->alert_id); ?>"><i class="fa fa-trash"></i></a>
                                    </td></tr>
                                <?php $count++; endforeach; ?>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>


        </div>

    </div>
</div>


<div class="modal inmodal" id="add_alert" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">alert</h4>
                                            <small class="font-bold">add an alert here.</small>
                                        </div>
                                        <form action="<?= base_url();?>index.php/alert/save_alert" method="post" enctype="multipart/form-data">  
                                        <div class="modal-body">

                 

                                         <div class="form-group"><label>Disease: </label> <select name="disease_name"class="form-control">
                                        <?php foreach ($disease as $disease_object): ?>
                                        <option name="disease_name" <?php if ($alert_object->disease_id==$disease_object->disease_id) {echo "Selected";
                                                } ?> ><?php  echo $disease_object->disease_name;?>
                                                </option>
                                        <?php endforeach;?>
                                        </select>
                                        </div>


                                             <div class="form-group"><label>Facility: </label>
                                        <select name="facility_name" class="form-control">
                                        <?php foreach ($facility as $facility_object): ?>
                                        <option name="facility_name" <?php if ($alert_object->facility_id==$facility_object->facility_id) {echo "Selected";
                                                }?> ><?php  echo $facility_object->facility_name;?>
                                                </option>
                                        <?php endforeach;?>
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
       
     



   


<?php require_once("includes/footer.php"); ?>