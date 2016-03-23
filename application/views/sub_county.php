<?php require_once("includes/header.php"); ?>


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Manage Sub-counties</h2>
            <!--<ol class="breadcrumb">
                <li>
                    <a href="index.html">This is</a>
                </li>
                <li class="active">
                    <strong>Breadcrumb</strong>
                </li>
            </ol>-->
        </div>
        <div class="col-sm-8">
            <!--<div class="title-action">
                <a href="" class="btn btn-primary">This is action area</a>
            </div>-->
        </div>
    </div>



        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">


                <div class="col-lg-8">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>All Sub-counties </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>

                        
                        <div class="ibox-content">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sub-county Name</th>
                                    <th>Description</th>
                                   
                                    <th>Edit</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php $count=1; ?>
                                <?php foreach ($sub_counties as $sub_county):?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $sub_county->sub_county_name; ?></td>
                                        
                                        <td><?php echo $sub_county->sub_county_description; ?></td>

                                        

                                        <td data-toggle="modal" data-target="#myModal_<?php echo $sub_county->sub_county_id?>" ><i class="fa fa-wrench"></i></td>


                                        <div class="modal inmodal" id="myModal_<?php echo $sub_county->sub_county_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Edit incident entry</h4>

                                                    </div>
                                                    <div class="modal-body">


                                                        <form action="<?= base_url();?>index.php/sub_county/update_sub_county_id1" method="post" enctype="multipart/form-data" autocomplete="on">

                                                            <div class="form-group">
                                                                <input type="hidden" name="sub_county_id" class="form-control" value="<?php echo $sub_county->sub_county_id; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Sub-county Name :</label>
                                                                <input type="text" name="sub_county_name" class="form-control" readonly value="<?php echo $sub_county->sub_county_name; ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Description :</label>
                                                                <input type="text" name="sub_county_comment" class="form-control" value="<?php echo $sub_county->sub_county_description; ?>"
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


                        <div class="row">
        <div class="col-md-12 text-center">
            <?php echo $pagination; ?>
        </div>
    </div>


                        
                    </div>
                </div>
            </div>


        </div>








<?php require_once("includes/footer.php"); ?>