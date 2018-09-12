<?php include'head.php' ?>       

<?php

if(isset($_POST['submit']))
{
	$_POST['submit']="";
	$_POST['EmailVerify']=1;
	$_POST['EmailStatus']=1;
	$_POST['Status']='Active';
	
	$obj->register_member(array_filter($_POST));
	
	echo '
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                <strong>MESSAGE ! </strong>'.$obj->flash.'
                            </div>                            
                        </div>
                   ';
	
}


?>
           <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> Open A Account</h2>
                </div>

               <div class="page-content-wrap">
                    
                      
                    
                    <div class="row">                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                            
                           
                            
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" class="form-horizontal " method="post">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Details</h3>
                                    
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Sponser Id</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" value="<?php echo $obj->userID; ?>" placeholder="Sponser Id" name="DirectID" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">Position</label>
                                            <div class="col-md-5 col-xs-5">                                                                                
                                                <select class="form-control select" data-live-search="true" name="Position">
													<option placeholder="left">Left</option>
													<option placeholder="Right">Right</option>
												</select>
                                            </div>
                                    </div>
									
									
									</div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Name</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="Name" name="FirstName" class="form-control" required/>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Username</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="Username" name="UserID" class="form-control" required/>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Password</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="password" placeholder="Password" name="Password" class="form-control" required/>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Tran Password</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="password" placeholder="Tran Password" name="TPassword" class="form-control" required/>
                                        </div>
                                    </div>
									
						<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Join Date</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="Date" name="RegistrationDate" value="<?php echo $obj->today_date; ?>" class="form-control" required/>
                                         
                                        </div>
                                    </div>			
                                                                           
                                    <div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            </form>
                            
                            

                        </div>
                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                    
                        </div>
                        
                    </div>
                    

                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        
        
        <!-- BLUEIMP GALLERY -->
            
        <!-- END BLUEIMP GALLERY -->        
        
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                      
        
   <?php include'footer.php' ?>