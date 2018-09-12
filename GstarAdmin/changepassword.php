<?php include'head.php' ?>   
<?php

if(isset($_POST['update'])){

$obj->change_password(array("oldpass"=>$_POST['oldpassword'],"newpassword"=>$_POST['newpassword']));

}


?>    



           <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span>Change Password</h2>
                </div>

               <div class="page-content-wrap">
                    
                    <?php include("error.php"); ?>
                    
                    <div class="row">                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                            
                           
                            
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form class="form-horizontal " method="post" action="">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Security Details : </h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Old Password</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="password" name="oldpassword" id="oldpass" placeholder="Old Password" class="form-control" reqiured/>
                                        </div>
                                    </div>
									
									
							
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">New Password</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="password" id="newpass" name="newpassword" placeholder="New Password" class="form-control" reqiured/>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Confirm Password</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="password" id="confirmpass" name="confirmpassword" placeholder="Confirm Password" class="form-control" reqiured/>
                                        </div>
                                    </div>
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" id="updatepassword" name="update">Update</button>
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