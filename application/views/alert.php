<?php require_once("includes/header.php"); ?>

<script>
  function myFunction() 
  {
      var base_url = "<?= base_url();?>";
      var item = document.getElementById("countyid");
      var itemIndex = item.selectedIndex;
      var itemSelected = item[itemIndex].value;
     var url = base_url+"alert/get_sub_county_by_id";
     $.getJSON
      (
        url,
        {county_name:itemSelected},
        function(dataReceived)
        {
          /*NOTES:
            0 - funding agency id
            1 - funding agency name
            2 - commodity id
            3 - commodity name
          */
          $("#selected_sub_county").html(dataReceived[1]);
         
        }

      );
  }
  
</script>



    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>disease incidents</h2>

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
                        <h5>Confirmed reports</h5>
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
                                    <th>Date</th>
                                    
                                    <th>Edit</th>
                                    </tr>

                            </thead>

                            <tbody>
                            <?php $count=1;
                            $county_name = NULL;
                            $sub_county_name = NULL;
                            $facility_name= NULL;


                             ?>

                            <?php foreach ($alert as $alert_object): 


                           foreach($county as $county_location){
                            if ($alert_object->county_id == $county_location->county_id) {
                                $county_name = $county_location->county_name;
                            }
                           }

                           foreach ($facility as $fclty) {
                                        if ($alert_object->facility_id==$fclty->facility_id) {
                                            $facility_name = $fclty->facility_name;
                                        }
                                    }

                            foreach ($sub_county as $sub_location) {
                                if ($alert_object->sub_county_id == $sub_location->sub_county_id) {
                                    $sub_county_name= $sub_location->sub_county_name;
                                }
                            }


                            ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php foreach ($disease as $disease_object) {
                                        if ($alert_object->disease_id==$disease_object->disease_id) {
                                            echo $disease_object->disease_name;
                                        }
                                    }?></td>
                                    <td><?php echo $facility_name. ",\n". $sub_county_name . ".\n". $county_name; ?></td>
                                    <td><?php echo $alert_object->age; ?></td>
                                    <td><?php echo $alert_object->sex; ?></td>
                                    <td><?php echo $alert_object->status; ?></td>
                                    <td><?php echo $alert_object->date; ?></td>
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
                                       <div class="form-group"><label>Disease: </label> <select name="disease_name"class="form-control">
                                       <option value = "">[Select]</option>

                                        <?php foreach ($disease as $disease_object): ?>
                                        <option name="disease_name" <?php if ($alert_object->disease_id==$disease_object->disease_id) {echo "Selected";
                                                } ?> ><?php  echo $disease_object->disease_name;?>
                                                </option>
                                        <?php endforeach;?>
                                        </select>
                                        </div>
            
                                        <div class="form-group"><label>County: </label>
                        <select name="county_name" class="form-control" id="countyid" onchange = "javascript:myFunction();">

                                        <option value = "">[Select]</option>

                                        <?php foreach ($county as $county_object): ?>
                                        <option name="county_name" value="<?php $alert_object->county_id; ?>" <?php if ($alert_object->county_id==$county_object->county_id) {echo "Selected";
                                                }?> ><?php  echo $county_object->county_name;?>
                                                </option>
                                        <?php endforeach;?>
                                        </select></div> 
                                       
                                         <div class="form-group"><label>Sub county: </label>
                                        <select name="sub_county_name" class="form-control">
                                        <option value = "">[Select]</option>

                                        <?php foreach ($sub_county as $sub_county_object): ?>

                                        <option name="sub_county_name" <?php if ($alert_object->sub_county_id==$sub_county_object->sub_county_id) {echo "Selected";
                                                }?> ><?php  echo $sub_county_object->sub_county_name;?>
                                                </option>
                                        <?php endforeach;?>
                                        </select></div>



                              <div class="form-group"><label>Facility: </label><select name="facility_name" class="form-control">
                            <option value = "">[Select]</option>

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

                            <div class="form-group"><label>Date:</label>
                                <input type="text" required name="date" class="form-control" value="<?php echo $alert_object->date; ?>"></div>


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


                                             <div class="form-group"><label>County: </label>
                                        <select name="county_name" class="form-control">
                                        <?php foreach ($county as $county_object): ?>
                                        <option name="county_name" <?php if ($alert_object->county_id==$county_object->county_id) {echo "Selected";
                                                }?> ><?php  echo $county_object->county_name;?>
                                                </option>
                                        <?php endforeach;?>
                                        </select></div>

                                         <div class="form-group"><label>Sub county: </label>
                                        <select name="sub_county_name" class="form-control">
                                        <?php foreach ($sub_county as $sub_county_object): ?>
                                        <option name="sub_county_name" <?php if ($alert_object->sub_county_id==$sub_county_object->sub_county_id) {echo "Selected";
                                                }?> ><?php  echo $sub_county_object->sub_county_name;?>
                                                </option>
                                        <?php endforeach;?>
                                        </select></div>


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

                               <!--   <div class="form-group" id="data_1">
                                <label class="font-noraml">Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="date" class="form-control" placeholder="Date">
                                </div>
                            </div> -->

                             <div class="form-group">
                            <label>Date:</label>
                            <input id="txtDate" type="text" required name="date" class="form-control"  data-mask="9999-99-99" placeholder="Date">
                            <span class="help-block">yyyy-mm-dd</span>

                            <!--<input type="text"  class="form-control" >-->
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