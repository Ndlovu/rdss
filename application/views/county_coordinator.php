<?php require_once("includes/header.php"); ?>


<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
        <h2 style="color: #b3b3b3">Profile</h2>
            <ol class="breadcrumb">
                <li>
                    <a style="color: #b3b3b3" href="index.html">This is</a>
                </li>
                <li class="active">
                    <strong>Profile</strong>
                </li>
            </ol>
    </div>

    <div class="col-sm-4">
    <?php $success_post = $this->session->flashdata('datasuccess');

    if($success_post){
        ?>
                <div class="alert alert-success">
                    <?php echo($success_post); ?>
                </div>
    <?php } ?>
    </div>


<div class="col-sm-4">
<div class="title-action">
    <a href="#" class="btn btn-primary">Add or update houses</a>
</div>
</div>
</div>

 <div class="wrapper wrapper-content animated fadeInRight">

    <div class="row m-t-lg">

        <div class="col-lg-3">

                <div>                    
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <?php foreach ($USER_DETAILS as $userdetails): ?>
                                    <?php
                                    $c = 0;
                                    foreach ($MESSAGES as $messages):
                                        if($messages->message_status=='unread'){
                                            $c++;
                                        }
                                    endforeach;
                                endforeach;
                                    ?>
                                <button type="button" class="btn btn-default m-r-sm"><i class="fa fa-envelope-o"></i><?php echo(" ".$c);?></button>
                                <b style="color: #b3b3b3"> Messages </b>

                            </td>
                            <td>
                        </tr>

                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm"> <i class="fa fa-institution"></i>

                                <?php
                                $count = 0;
                                 foreach ($HOUSE_DETAILS as $posted_houses):
                                 $count++; 
                                endforeach; echo $count;?>

                                </button>
                               <b style="color: #b3b3b3">Houses Posted</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm"><i class="fa fa-edit"> 0</i></button>
                               <b style="color: #b3b3b3">Comments</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm"><i class="fa fa-bell-o"></i> <?php echo ' '.$count+$c;?></button>
                                <b style="color: #b3b3b3">All Notifications</b>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm"><i class="fa fa-envelope-o"></i></button>
                                 <a href="<?php base_url()?>messages"><b style="color: #b3b3b3">See all messages</b></a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                
            </div>


<?php if($CHECK_AGE_GENDER_OCCUPATION_INTEREST){?>
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5><div style="color: red"> More information is required</div></h5>
                    </div>

                    <div class="ibox-content">

                        <div class="sk-spinner sk-spinner-double-bounce">
                            <div class="sk-double-bounce1"> <a More_options_addition_to_house_search()> <i class="fa fa-arrow-down"> click left</i></a> </div>
                            <div class="sk-double-bounce2"> <a More_options_addition_to_house_search()> <i class="fa fa-arrow-down"></i></a> </div>
                        </div>
                        <b style="color: #b3b3b3"><a onClick="More_options_addition_to_house_search()">click here to add</a></b>
                    </div>

                    <!-- extra information-->
                    <div id="more_information" class="hide" >
                        <div class="ibox-content">
                            <div class="ibox-heading"><span class="star_class star_class" style="color: darkred"><strong>These information required to aid in recommendation*</strong></span></div><br>
                            <div class="row">
                                <div class="m-t-none m-b">
                                    <form action="<?= base_url();?>index.php/register/post_extra_user_details" id="form" method="post" enctype="multipart/form-data" autocomplete="on">
                                        <div class="form-group"><label>Occupation</label> <input type="text" name="occupation" placeholder="eg teacher, farmer,banker etc" class="form-control"></div>
                                        <div class="form-group"><label>Interest</label> <input type="text" name="interest" placeholder="eg swimming, football etc" class="form-control"></div>
                                        <div class="hide"><input type="text" value="<?php echo( $this->uri->segment(1));?>" name="theuri"></div>
                                        <div class="form-group"><label>Gender</label>
                                            <select name="gender" class="form-control">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group"><label>Age group</label>

                                            <select name="age_group" class="form-control">
                                                <option>--SELECT--</option>
                                                <option>below 20</option>
                                                <option>20-25</option>
                                                <option>25-30</option>

                                                <option>30-35</option>
                                                <option>35-40</option>
                                                <option>40-45</option>
                                                <option>45-50</option>
                                                <option>50-55</option>
                                                <option>55+</option>
                                            </select>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Submit</strong></button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- extra information-->
                </div>
    <?php } ?>

            </div>

        <div class="col-lg-3">
            <div class="row">
                       
                            <div class="ibox-content text-center">
                                <h3></h3>
                                <div class="m-b-sm">


                                    <?php 
                                    $session_user = $this->session->userdata('user_id');
                                    if($session_user)
                                    { ?>
                                        <?php foreach ($USER_DETAILS as $userdetails): ?> 

                                             <?php foreach ($IMAGE as $profileimage): ?>
                                                 <?php if ($profileimage->Image_id == NULL && $profileimage->user_id == $session_user ) {?>                                                                                    

                                                 <img alt="image" height="150px" width="110px" class="img-circle" src="<?php echo(base_url()).$profileimage->image_name; ?>">

                                                 <?php } ?>

                                            <?php endforeach; ?>
                                    
                                </div>
                                    <p class="font-bold"><?php echo $userdetails->f_name." ".$userdetails->other_names; ?></p>

                                     <?php endforeach; ?>

                                     <?php }?>

                                <div class="text-center">
                                    <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#pModal"><i class="fa fa-edit"></i> Edit </a>
                                    <a class="btn btn-xs btn-warning"><i class="fa fa-trash"></i></a>
                                <!--modal form for profile -->
                                        <div class="modal inmodal" id="pModal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated fadeInDown">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-institution modal-icon"></i>
                                                        <h4 class="modal-title">Edit profile picture</h4>
                                                        <small class="font-bold">Add account picture</small>
                                                    </div>

                                                    <form action="<?= base_url();?>index.php/register/post_profile_photo" method="post" enctype="multipart/form-data" autocomplete="on">
                                                    <div class="modal-body">                                                  
                                                            
                                                            <div class="form-group"><label></label> <input type="file" name="userfile[]" placeholder="Location choice" class="form-contro" value=""></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                <!-- end of the modal form -->
                                        <?php $message = $this->session->flashdata('profilechanged'); ?>
                                        <?php if($message):?>
                                          <script> $('#pModal').modal('show');</script>
                                            <div class="ibox-content">
                                            <div class="alert alert-success">
                                             <?php echo $message;?>
                                            </div>                           
                                              </div>
                                        <?php endif;?>
                                </div>
                            </div>

                        
                            <div class="ibox-content text-center">
                                <div>
                                 <div class="widget lazur-bg p-xl">

                                    <h3>
                                        Contacts
                                    </h3>

                                <?php if($this->session->userdata('user_id'))
                                { ?>
                                <?php foreach ($USER_DETAILS as $userdetails): ?>                                                    
                                 
                                    <ul class="list-unstyled m-t-md">
                                        <li>
                                            <span class="fa fa-envelope m-r-xs"></span>
                                            <label>Email:</label>
                                            <?php echo $userdetails->email; ?>                                            
                                        </li>
                                        <li>
                                            <span class="fa fa-home m-r-xs"></span>
                                            <label>ID:</label>
                                            <?php echo $userdetails->national_id; ?>                                            
                                            
                                        </li>
                                        <li>
                                            <span class="fa fa-phone m-r-xs"></span>
                                            <label>Contact:</label>
                                            <?php echo $userdetails->phone_number; ?>                                            
                                            
                                        </li>
                                    </ul>
                                <?php endforeach; ?>
                                <?php }?>



                            <?php foreach ($USER_DETAILS as $profile): ?>
                                <div class="text-center">
                                    <a class="btn btn-xs btn-default" a data-target="#edit_profile_modal_<?php echo($profile->user_id); ?>" data-toggle="modal" href="#"><i class="fa fa-edit"></i> Edit </a>


                                        <div class="modal inmodal" id="edit_profile_modal_<?php echo($profile->user_id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                                        <h4 class="modal-title">Hello<strong><?php echo(" ".$profile->f_name." edit your details here"); ?></strong> </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form style="color: black;" class="m-t" method="post" role="form" id="form" action="<?php echo(base_url()); ?>index.php/register/edit_user">
                                                            <div class="form-group">
                                                                <label>First name:</label>
                                                                <input name="f_name" type="text" class="form-control" placeholder="First name" value="<?php echo($profile->f_name); ?>" required="">
                                                            </div>
                                                            <div class="hide"><input type="text" value="<?php echo( $this->uri->segment(1));?>" name="theuri"></div>

                                                            <div class="form-group">
                                                                <label>Other names:</label>
                                                                <input name="other_names" type="text" class="form-control" placeholder="Other names" value="<?php echo($profile->other_names); ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo($profile->email); ?>" required="">
                                                            </div>
                                                            <input type="hidden" name="user_id" value="<?php echo($profile->user_id); ?>" >
                                                            <div class="form-group">
                                                                <input name="password" type="password" class="form-control" placeholder="Password" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label>ID no:</label>
                                                                <input name="national_id" type="number" class="form-control" value="<?php echo($profile->national_id); ?>" placeholder="National ID number" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Phone no:</label>
                                                                <input name="phone_number" type="tel" class="form-control" placeholder="Phone Number" value="<?php echo($profile->phone_number); ?>" required="">
                                                            </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                                        <input type="submit" class="btn btn-primary" value="Update" >
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                    <?php endforeach; ?>

                                 </div>
                                </div>
                            </div>
        
                    </div>
        </div>


        <div class="col-lg-6">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                <div>
                <div class="chat-activity-list">
                    <h3 class="text-center"><strong>Houses Posted</strong></h3>
    
                        <?php $message = $this->session->flashdata('message'); ?>
                        <?php if($message):?>
                          <script> $('#pModal').modal('show');</script>

                            <div class="modal inmodal" id="pModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-institution modal-icon"></i>
                                            <h4 class="modal-title">House details</h4>
                                            <small class="font-bold">Add the details of your new house here.</small>
                                        </div>

                                        <div class="ibox-content">
                                            <div class="alert alert-success">
                                             <?php echo $message;?>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>

                        <?php endif;?>



            <?php foreach ($HOUSE_DETAILS as $posted_houses): ?> 

                    <div class="chat-element">
                        <a href="#" class="pull-left">
                            <img alt="image" class="img-circle" src="<?php echo(base_url().$posted_houses->photo1)?>">
                        </a>
                        <div class="media-body ">
                            <small class="pull-right text-navy"><?php echo $posted_houses->house_post_date ?></small>

                            <strong class="text-muted">Name:</strong> <strong><?php if($posted_houses->house_name=="")echo "  No house name"; else  {echo $posted_houses->house_name;} ?></strong><br>

                            <strong class="text-muted">Type of house:</strong> <strong><?php echo " ".$posted_houses->type; ?></strong>
                            <p class="m-b-xs">
                                <strong class="text-muted">House located in:</strong> <strong><?php echo " ".$posted_houses->location; ?></strong>
                            </p>

                                <form action="<?= base_url();?>index.php/profile/update_house_status" id="form" method="post" enctype="multipart/form-data" autocomplete="on">
                                    <input class="hide form-control" name="status" value="<?php if($posted_houses->status=="available")echo "booked"; else{echo "available";} ?>" >
                                    <input class="hide form-control" name="house_id" value="<?php echo $posted_houses->house_id; ?>" >
                                    <div class="col-sm-6">
                                    <button type="submit" <?php if($posted_houses->status=="available"){?> class=btn-primary><?php }else{?> class=btn-warning> <?php }?> <strong><?php echo " ".$posted_houses->status; ?></strong></button>
                                        <div <?php if($posted_houses->status=="available"){?> style="color: #1AB394"><i class="fa fa-arrow-up"></i> <?php }else{?> style="color: #cd6e00"><i class="fa fa-arrow-up"></i> <?php }?> click here to<?php if($posted_houses->status=="available")echo " book"; else{echo " free";} ?> </div>
                                    </div>
                                </form>


                                <div class="text-right">
                                   
                                    <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#hlModal_<?php echo $posted_houses->house_id?>"><i class="fa fa-edit"></i> Edit </a>         
                                    <a href="<?php echo(base_url()."index.php/profile/delete_house_details/".$posted_houses->house_id); ?>"><div class="btn btn-xs btn-warning"><i class="fa fa-trash"></i></div></a> 

                                <!--modal form for editing houses -->
                                        <div class="modal inmodal" id="hlModal_<?php echo $posted_houses->house_id?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-institution modal-icon"></i>
                                                        <h4 class="modal-title">House no <?php echo $posted_houses->house_id; ?> details</h4>
                                                        <small class="font-bold">Edit the details for house no <?php echo $posted_houses->house_id; ?> here and update them.</small>
                                                    </div>

                                                    <form action="<?= base_url();?>index.php/profile/update_house_details" id="form" method="post" enctype="multipart/form-data" autocomplete="on">
                                                    <div class="modal-body">
                                                            
                                                            <div class="form-group hide"><label>House id</label> <input type="text" name="house_id" placeholder="Location choice" class="form-control" value="<?php echo $posted_houses->house_id; ?>"></div>
                                                            <div class="form-group"><label>House name</label> <input type="text" name="house_name" placeholder="House tittle" class="form-control" value="<?php echo $posted_houses->house_name; ?>"></div>

                                                        <div class="form-group"><label>Location</label> <input type="text" name="house_location" readonly="readonly" class="form-control" value="<?php echo $posted_houses->location ; ?>"></div>



                                                        <label>Type of house</label>
                                                                <select name="house_type" class="form-control">                                                                 
                                                                 <option <?php if($posted_houses->type == 'Single room'){echo"selected";}?>>Single room</option>
                                                                 <option <?php if($posted_houses->type == 'Double room'){echo"selected";}?>>Double room</option>
                                                                 <option <?php if($posted_houses->type == 'Servant quarter'){echo"selected";}?>>Servant quarter</option>
                                                                 <option <?php if($posted_houses->type == 'Bed sitter'){echo"selected";}?>>Bed sitter</option>
                                                                 <option <?php if($posted_houses->type == 'One bedroom'){echo"selected";}?>>One bedroom</option>
                                                                 <option <?php if($posted_houses->type == 'Two bedroom'){echo"selected";}?>>Two bedroom</option>
                                                                 <option <?php if($posted_houses->type == 'Three bedroom+'){echo"selected";}?>>Three bedroom+</option>
                                                                </select>

                                                            <div class="form-group"><label>Other descriptions</label> <input type="text" name="house_description" placeholder="house_description" class="form-control" value="<?php echo $posted_houses->house_description; ?>"></div>

                                                        <div class="form-group"><label>House Image</label> <input type="file" name="userfile[]" placeholder="captured image of the house" class="form-control" value="<?php echo $posted_houses->photo1; ?>"></div>
                                                        <div class="form-group"><label>Price</label> <input type="text" name="price_range" placeholder="captured image of the house" class="form-control" value="<?php echo $posted_houses->price; ?>"></div>


                                                            
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        <button id="update" type="submit" class="btn btn-primary">Update changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                <!-- end of the modal form -->
       
                                </div>
                        </div>
                    </div>

        <?php endforeach; ?>

                </div>
                </div>                

                        <div class="chat-form">

                            <form role="form">

                                <div class="text-right">
                                    <button type="button" class="btn btn-sm btn-primary m-t-n-xs" data-toggle="modal" data-target="#myModal"><strong>Add new house</strong></button>
                                </div>
                            </form>
                            <!--modal form for new houses -->

                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-institution modal-icon"></i>
                                            <h4 class="modal-title">House details</h4>
                                            <small class="font-bold">You can add the details of the new house here.</small>
                                        </div>

                                        <form action="<?= base_url();?>index.php/profile/post_new_house" id="form" method="post" enctype="multipart/form-data">
                                        <div class="modal-body"> 

                                            <div class="form-group"><label>House name</label> <input type="text" name="house_name" placeholder="house name" class="form-control"></div>

                                            <div class="form-group">
                                            <label>County</label>
                                            <select name="county" id="json-one"id="country" size="1" class="form-control"
                                                    title="Name of Your County" admin="1" frontend="1">
                                                <option selected value="48">--SELECT--</option>
                                                <option value="1">Baringo County</option>
                                                <option value="2">Bomet County</option>
                                                <option value="3">Bungoma County</option>
                                                <option value="4">Busia County</option>
                                                <option value="5">Elgeyo Marakwet County</option>
                                                <option value="6">Embu County</option>
                                                <option value="7">Garissa County</option>
                                                <option value="8">Homa Bay County</option>
                                                <option value="9">Isiolo County</option>
                                                <option value="10">Kajiado County</option>
                                                <option value="11">Kakamega County</option>
                                                <option value="12">Kericho County</option>
                                                <option value="13">Kiambu County</option>
                                                <option value="14">Kilifi County</option>
                                                <option value="15">Kirinyaga County</option>
                                                <option value="16">Kisii County</option>
                                                <option value="17">Kisumu County</option>
                                                <option value="18">Kitui County</option>
                                                <option value="19">Kwale County</option>
                                                <option value="20">Laikipia County</option>
                                                <option value="21">Lamu County</option>
                                                <option value="22">Machakos County</option>
                                                <option value="23">Makueni County</option>
                                                <option value="24">Mandera County</option>
                                                <option value="25">Meru County</option>
                                                <option value="26">Migori County</option>
                                                <option value="27">Marsabit County</option>
                                                <option value="28">Mombasa County</option>
                                                <option value="29">Muranga County</option>
                                                <option value="30">Nairobi County</option>
                                                <option value="31">Nakuru County</option>
                                                <option value="32">Nandi County</option>
                                                <option value="33">Narok County</option>
                                                <option value="34">Nyamira County</option>
                                                <option value="35">Nyandarua County</option>
                                                <option value="36">Nyeri County</option>
                                                <option value="37">Samburu County</option>
                                                <option value="38">Siaya County</option>
                                                <option value="39">Taita Taveta County</option>
                                                <option value="40">Tana River County</option>
                                                <option value="41">Tharaka Nithi County</option>
                                                <option value="42">Trans Nzoia County</option>
                                                <option value="43">Turkana County</option>
                                                <option value="44">Uasin Gishu County</option>
                                                <option value="45">Vihiga County</option>
                                                <option value="46">Wajir County</option>
                                                <option value="47">West Pokot County</option>

                                            </select>
                                            </div>

                                            <label>Location in the selected county</label>:<span class="star_class star_class" style="">*</span>&nbsp;                              <div class="form-field-container">
                                            <div class="form-field">
                                                  <span class="ui-widget">
                                                            <select name="house_location" id="json-two" class="form-control"
                                                                    title="Location" admin="1" frontend="1">
                                                                <option>Please choose from above</option>
                                                            </select>
                                                  </span><br/>
                                                <span class="input-errors" id="state_err"></span>
                                            </div>
                                            <div class="form-field-info"></div>

                                            <div class="form-group">
                                                <label>Type of house</label>
                                                <select name="house_type" class="form-control">
                                                     <option>Single room</option>
                                                     <option>Double room</option>
                                                     <option>Servant quarter</option>
                                                     <option>Bed sitter</option>
                                                     <option>One bedroom</option>
                                                     <option>Two bedroom</option>
                                                     <option>Three bedroom+</option>
                                                </select>
                                            </div>
                                                
                                            <div class="form-group"><label>House image</label> <input type="file" name="userfile[]" placeholder="captured image of the house" class="form-control"></div>
                                            <div class="form-group"><label>Other descriptions</label> <input type="text" name="house_description" placeholder="enter the house price" class="form-control"></div>
                                            <div class="form-group"><label>Price</label> <input type="text" name="price_range" placeholder="price of the house" class="form-control" required="required"></div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button id="submit" type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!-- end of the modal form -->

                        </div>
                </div>
            </div>

        </div>  
      

        </div>

</div>


<?php require_once("includes/footer.php"); 