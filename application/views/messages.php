                 
                <td data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i>
                    <div class="modal inmodal"  id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Enter message</h4>Enter message</small>
                                        </div>
                                         <form action="<?= base_url();?>index.php/message/submit_message" method="post" enctype="multipart/form-data">  
                                        <div class="modal-body">

                                    <div class="form-group"><label>Message:</label>
                                    <input type="text" required name="message" class="form-control" ></div>


                                        </div>
                                        <div class="modal-footer">
                                             <button type="submit" class="btn btn-primary">send message</button>

                                             <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                          
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            </td> 
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
<!-- <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a> 
<i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>-->