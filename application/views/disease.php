<?php require_once("includes/header.php"); ?>


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Manage diseases</h2>

        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="#"  data-toggle="modal" data-target="#add_disease" class="btn btn-primary">Add an infectious disease</a>


            </div>
        </div>
    </div>


     <div class="wrapper wrapper-content">
       <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Disease</h5>
                        <div class="ibox-content">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Disease</th>
                                    <th>Acronym</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    </tr>

                            </thead>

                            <tbody>
                            <?php $count=1; ?>
                            <?php foreach ($disease as $disease_object): ?>

                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $disease_object->disease_name; ?></td>
                                    <td><?php echo $disease_object->disease_acronym;?></td>
                                    <td><?php echo $disease_object->disease_description; ?></td>
                            <td data-toggle="modal" data-target="#myModal_<?php echo $disease_object->disease_id; ?>"><i class="fa fa-wrench"></i>


                                         <div class="modal inmodal" id="myModal_<?php echo $disease_object->disease_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Edit disease</h4>
                                            <small class="font-bold">Update and delete details about a particular disease.</small>
                                        </div>

                                        <form action="<?= base_url();?>index.php/disease/update_disease" method="post" enctype="multipart/form-data">  
                                        <div class="modal-body">

                           <div class="form-group"><input type="hidden" name="disease_id" value="<?php echo $disease_object->disease_id; ?>" class="form-control"></div>
                                        <div class="form-group"><label>Disease: </label> <input type="text" name="disease_name" value="<?php echo $disease_object->disease_name; ?>" class="form-control"></div>
                                        <div class="form-group"><label>Acronym: </label> <input type="text" name="disease_acronym" value="<?php echo $disease_object->disease_acronym; ?>" class="form-control"></div>
                                     
                                       <div class="form-group"><label>Description: </label> <input type="text" name="disease_description" value="<?php echo $disease_object->disease_description; ?>" class="form-control"></div></div>
                                        <div class="modal-footer">
                                             <button type="submit" class="btn btn-primary">Save changes</button>

                                             <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                           
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            </td> 
                                    <td>
                                        <a href="<?php echo(base_url()."index.php/disease/delete_disease/".$disease_object->disease_id); ?>"><i class="fa fa-trash"></i></a>
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


<div class="modal inmodal" id="add_disease" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Infectious disease</h4>
                                            <small class="font-bold">Add an infectious disease here.</small>
                                        </div>
                                        <form action="<?= base_url();?>index.php/disease/save_disease" method="post" enctype="multipart/form-data">  
                                        <div class="modal-body">

                 

                                        <div class="form-group"><label>Disease: </label> <input type="text" name="disease_name" placeholder="disease" class="form-control"></div>
                                        <div class="form-group"><label>Acronym: </label> <input type="text" name="disease_acronym" placeholder="acronym" class="form-control"></div>

                                      
                                       <div class="form-group"><label>Description: </label> <input type="text" name="disease_description" placeholder="Description" class="form-control"></div>
                                        </div>
                                        <div class="modal-footer">
                                             <button type="submit" class="btn btn-primary">Add disease</button>

                                             <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                           <!--  <input type="submit" id="submit" name="dsubmit" value="Update"> -->
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
       
     



   


<?php require_once("includes/footer.php"); ?>