<?php require_once("includes/header.php"); ?>


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>USSD REPORT</h2>

        </div>
        <div class="col-sm-8">
            <div class="title-action">
            </div>
        </div>
    </div>

<div class="wrapper wrapper-content">
       <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>USSD Alerts</h5>
                        <div class="ibox-content">


                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Facility name </th>
                                    <th>MFL code</th>
                                    <th>Disease</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Edit</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php $count=1; ?>
                                <?php foreach ($ussd_report as $report):?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $report->facility_name; ?></td>
                                        <td><?php echo $report->mfl;?></td>
                                        <td><?php echo $report->disease_name; ?></td>
                                        <td><?php echo $report->age; ?></td>
                                        <td><?php echo $report->sex; ?></td>
                                        <td><?php echo $report->status; ?></td>
                                        <td><?php echo $report->time_stamp;?></td>


                                        <td data-toggle="modal" data-target="#myModal_<?php echo $report->record_id;?>" ><i class="fa fa-wrench"></i></td>


                                         <div class="modal inmodal" id="myModal_<?php echo $report->record_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Edit USSD report</h4>

                                                    </div>
                                                    <div class="modal-body">


                                                        <form action="<?= base_url();?>index.php/rreport/update_ussd_report" method="post" enctype="multipart/form-data" autocomplete="on">

                                                            <div class="form-group">
                                                                <input type="hidden" name="record_id" class="form-control" value="<?php echo $report->record_id; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Facility MFL code :</label>
                                                                <input type="text" name="mfl_Code" class="form-control" readonly value="<?php echo $report->mfl_code; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Disease :</label>
                                                                <input type="text" name="disease_code" class="form-control" value="<?php echo $report->disease_code; ?>"
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                                                        <button id="update" type="submit" class="btn btn-primary">Save changes</button>

                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>




                                        

                                    </tr>
                                    <?php $count++;endforeach; ?>


                                </tbody>
                            </table>


                       
                    </div>
                </div>
            </div>


        </div>

    </div>





   


<?php require_once("includes/footer.php"); ?>