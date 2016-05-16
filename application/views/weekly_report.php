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
            <h2>weekly report</h2>

        </div>

        <div class="col-sm-8">
            <div class="title-action">
             <?php if($this->session->userdata('role')!="" || $this->session->userdata('role')!=""){ ?>
                <a href="#"  data-toggle="modal" data-target="#add_alert" class="btn btn-primary">Add an alert</a>

                <?php } ?>
            </div>
        </div>
    
    </div>
    <div class="wrapper wrapper-content">
       <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>weekly reports</h5>
                        <div class="ibox-content">


                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>disease</th>
                                    <th>county</th>
                                    <th>sub county</th>
                                    <th>facility</th>
                                    
                                   <th>number of incidents</th>
                                    <th>number od deaths</th>
                                   
                                    <th>start date</th>
                                    <th>end date</th>
                                    
                                    <th>Edit</th>
                                    </tr>

                            </thead>
                            <tbody>

                              <?php
                              $count = 1;
                               foreach($w_report as $weekly_report):?>

                            <tr>
                              <td><?php echo $count;?></td>
                              <td><?php echo $weekly_report->d_name;?></td>
                              <td><?php echo $weekly_report->c_name;?></td>
                                 <td><?php echo $weekly_report->sub_name;?></td>
                                 <td><?php echo $weekly_report->f_name;?></td>
                                      <td><?php echo $weekly_report->number_of_incidents;?></td>
                                       <td><?php  echo $weekly_report->number_of_deaths;?></td>
                                       <td><?php  echo $weekly_report->date_from;?></td>
                                       <td><?php  echo $weekly_report->date_to;?></td>  <td data-toggle="modal" data-target="#myModal_<?php echo $weekly_report->report_id; ?>"><i class="fa fa-wrench"></i>
    

    <div class="modal inmodal"  id="myModal_<?php echo $weekly_report->report_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Edit report</h4>Update and delete weekly report</small>
                                        </div>
                                         <form action="<?= base_url();?>index.php/alert/save_weekly_report" method="post" enctype="multipart/form-data">  
                                        <div class="modal-body">

                 

                                       <div class="form-group"><input type="hidden" name="alert_id" value="<?php echo $weekly_report->report_id; ?>" class="form-control"></div>
                                       <div class="form-group"><label>Disease: </label> <select name="disease_name"class="form-control">
                                       <option value = "">[Select]</option>

                                        <?php foreach ($disease as $disease_object): ?>
                                        <option name="disease_name" <?php if ($weekly_report->d_name==$disease_object->disease_name) {echo "Selected";
                                                } ?> ><?php  echo $disease_object->disease_name;?>
                                                </option>
                                        <?php endforeach;?>
                                        </select>
                                        </div>

            
                                        <div class="form-group"><label>County: </label>
                        <select name="county_name" class="form-control" id="countyid" >
                        //onchange = "javascript:myFunction();"

                                        <option value = "">[Select]</option>

                                        <?php foreach ($county as $county_object): ?>
                                        <option name="county_name" value="<?php $weekly_report->c_name; ?>" <?php if ($weekly_report->c_name==$county_object->county_name) {echo "Selected";
                                                }?> ><?php  echo $county_object->county_name;?>
                                                </option>
                                        <?php endforeach;?>
                                        </select></div> 
                                       
                                         <div class="form-group"><label>Sub county: </label>
                                        <select name="sub_county_name" class="form-control">
                                        <option value = "">[Select]</option>

                                        <?php foreach ($sub_county as $sub_county_object): ?>

                                        <option name="sub_county_name" <?php if ($weekly_report->sub_name==$sub_county_object->sub_county_name) {echo "Selected";
                                                }?> ><?php  echo $sub_county_object->sub_county_name;?>
                                                </option>
                                        <?php endforeach;?>
                                        </select></div>



                              <div class="form-group"><label>Facility: </label><select name="facility_name" class="form-control">
                            <option value = "">[Select]</option>

                            <?php foreach ($facility as $facility_object): ?>
                            <option name="facility_name" <?php if ($weekly_report->f_name==$facility_object->facility_name) {echo "Selected";
                                    }?> ><?php  echo $facility_object->facility_name;?>
                                    </option>
                            <?php endforeach;?>
                            </select></div>

    <div class="form-group"><label>number of incidents:</label>
            <input type="text" required name="number_of_deaths" class="form-control" value="<?php echo $weekly_report->number_of_incidents; ?>">
                    </div>

        <div class="form-group"><label>number of deaths:</label>
            <input type="text" required name="sex" class="form-control" value="<?php echo $weekly_report->number_of_deaths; ?>">
        </div>

  
             <div class="form-group" id="data_5">
                <label class="font-noraml">select week</label>
                <div class="input-daterange input-group" id="datepicker">
                    <input type="text" class="input-sm form-control" name="start_date" value="<?php echo $weekly_report->date_from; ?>"/>
                    <span class="input-group-addon">to</span>
                    <input type="text" class="input-sm form-control" name="end_date" value="<?php echo $weekly_report->date_to; ?>" />
                </div>
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
                                     
                              

                            </tr>


                              <?php endforeach;?>
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

                             <div class="form-group"><label>Disease: </label><select class="form-control m-b" name="disease_name"  >
                              <option value = "">[Select]</option>
                                <?php foreach ($disease as $disease_object): ?>  
                                  <option  value="<?php echo $disease_object->disease_name;?>" ><?php echo $disease_object->disease_name;?></option><?php endforeach; ?>
                                                    </select></div>


                                <div class="form-group"><label>County: </label><select class="form-control m-b" name="county_name">
                                 <option value = "">[Select]</option>
                                <?php foreach ($county as $county_object): ?>  
                                  <option  value="<?php echo $county_object->county_name;?>" ><?php echo $county_object->county_name;?></option><?php endforeach; ?>
                                        </select></div>



                            <div class="form-group"><label>Sub-county: </label><select class="form-control m-b" name="sub_county_name">
                             <option value = "">[Select]</option>
                                <?php foreach ($sub_county as $sub_county_object): ?>  
                                  <option  value="<?php echo $sub_county_object->sub_county_name;?>" ><?php echo $sub_county_object->sub_county_name;?></option><?php endforeach; ?>
                                        </select></div>




                            <div class="form-group"><label>Facility: </label><select class="form-control m-b" name="facility_name">
                             <option value = "">[Select]</option>
                    <?php foreach ($facility as $facility_object): ?>  
                      <option  value="<?php echo $facility_object->facility_name;?>" ><?php echo $facility_object->facility_name;?></option><?php endforeach; ?>
                            </select></div>


                      <div class="form-group"><label>number of incidents :</label>
                      <input type="text" required name="number_of_cases" class="form-control" placeholder="number of cases">
                      </div>


                      <div class="form-group"><label>number of deaths :</label>
                          <input type="text" required name="number_of_deaths" class="form-control" placeholder="number of deaths">
                      </div>
                             

                      <div class="form-group" id="data_5">
                                <label>select week</label>
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="input-sm form-control" name="start_date" value="05/14/2014"/>
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control" name="end_date" value="05/22/2014" />
                                </div>
                            </div>

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