<?php require_once("includes/header.php"); ?>


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Manage Facilities</h2>

        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="#"  data-toggle="modal" data-target="#add_facility" class="btn btn-primary">Add a facility</a>


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
                                    <th>Facility</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    </tr>

                            </thead>

                            <tbody>
                            <?php $count=1; ?>
                            <?php foreach ($facility as $facility_object): ?>

                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $facility_object->facility_name; ?></td>
                                    <td><?php echo $facility_object->facility_acronym;?></td>
                                    <td><?php echo $facility_object->facility_description; ?></td>
                            <td data-toggle="modal" data-target="#myModal_<?php echo $facility_object->facility_id; ?>"><i class="fa fa-wrench"></i>


                                         <div class="modal inmodal" id="myModal_<?php echo $facility_object->facility_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Edit facility</h4>
                                            <small class="font-bold">Update and delete details about a particular facility.</small>
                                        </div>

                                        <form action="<?= base_url();?>index.php/facility/update_facility" method="post" enctype="multipart/form-data">  
                                        <div class="modal-body">

                           <div class="form-group"><input type="hidden" name="facility_id" value="<?php echo $facility_object->facility_id; ?>" class="form-control"></div>
                                        <div class="form-group"><label>facility: </label> <input type="text" name="facility_name" value="<?php echo $facility_object->facility_name; ?>" class="form-control"></div>
                                                                          
                                       <div class="form-group"><label>Description: </label> <input type="text" name="facility_description" value="<?php echo $facility_object->facility_description; ?>" class="form-control"></div></div>
                                        <div class="modal-footer">
                                             <button type="submit" class="btn btn-primary">Save changes</button>

                                             <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                           <!--  <input type="submit" id="submit" name="dsubmit" value="Update"> -->
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            </td> 
                                    <td>
                                        <a href="<?php echo(base_url()."index.php/facility/delete_facility/".$facility_object->facility_id); ?>"><i class="fa fa-trash"></i></a>
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


<div class="modal inmodal" id="add_facility" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Infectious facility</h4>
                                            <small class="font-bold">Add an infectious facility here.</small>
                                        </div>
                                        <form action="<?= base_url();?>index.php/facility/save_facility" method="post" enctype="multipart/form-data">  
                                        <div class="modal-body">

                 

                                        <div class="form-group"><label>facility: </label> <input type="text" name="facility_name" placeholder="facility" class="form-control"></div>
                                        <div class="form-group"><label>Acronym: </label> <input type="text" name="facility_acronym" placeholder="acronym" class="form-control"></div>

                                      
                                       <div class="form-group"><label>Description: </label> <input type="text" name="facility_description" placeholder="Description" class="form-control"></div>
                                        </div>
                                        <div class="modal-footer">
                                             <button type="submit" class="btn btn-primary">Add facility</button>

                                             <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                           <!--  <input type="submit" id="submit" name="dsubmit" value="Update"> -->
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
       
     



   


<?php require_once("includes/footer.php"); ?>