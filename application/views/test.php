<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="css/ex.css" type="text/css" />
<style type="text/css">

form.demoForm {
    margin: 2em 0 3em;
}

form.demoForm select {
    vertical-align: top;
    margin-right: 1em;
}

select#choices {
    min-width: 140px;
}

</style>
</head>
<body>
    
              <div class="modal inmodal" id="add_alert" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">alert</h4>
                                            <small class="font-bold">add an alert here.</small>
                                        </div>
                                        <form action="" method="post" enctype="multipart/form-data">  
                                        <div class="modal-body">

                                        <div class="form-group"><label>Age :</label>
                                        <input type="text" required name="age" class="form-control" placeholder="Age">
                                        </div>


                                <div class="form-group"><label>Sex :</label>
                                    <input type="text" required name="sex" class="form-control" placeholder="Sex">
                                </div>

                                 <div class="form-group"><label>Status :</label>
                                    <input type="text" required name="status" class="form-control" placeholder="Status">
                                </div>

                              

                             <div class="form-group">
                            <label>Date:</label>
                            <input id="textDate" type="text" required name="date" class="form-control"   placeholder="Date">
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
       
     



<script type="text/javascript">

<script type="text/javascript">
jQuery(document).ready(function($){
$(document).on('change', 'select[name="item_meta[125]"]', function(){
var val1 = $("select[name='item_meta[125]']").children("option").filter(":selected").text();
$("#field_FIELDKEY").val(val1);
$("#field_FIELDKEY").change();
});
});
</script>


</script>

<p>Back to <a href="index.html">index</a> for more demos and information.</p>

</body>
</html>