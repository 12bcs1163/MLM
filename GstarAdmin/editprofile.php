<?php include'head.php' ?>  
<?php
if(isset($_POST['profileupdate']))
{
//print_r($_POST);
$obj->profile_update(array_filter($_POST),$_GET['id']);
}

 $userdata=$obj->loaduserinfo2($_GET['id']); 
 $bankdata=$userdata;
 
 ?>     
 
 
 <?php

if(isset($_POST['update'])){

$obj->change_password(array("oldpass"=>$_POST['oldpassword'],"newpassword"=>$_POST['newpassword']),$_GET['id']);

}


?>    


<?php

if(isset($_POST['bankupdate']))
{

$obj->bank_update(array_filter($_POST),$_GET['id'],$userdata['UserID']);

}

?>
 


           <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> Edit Profile</h2>
                </div>

               <div class="page-content-wrap">
                    
            <?php include("error.php"); ?>
                    
                    <div class="row">                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                            
                           
                            
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                
                                <div class="panel-body form-group-separated">
								
                                  
									<div class="panel-body">
									<h3><span class="fa fa-pencil"></span> Personal Details : </h3>
									</div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">First Name</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" name="FirstName" placeholder="First Name" value="<?php echo $userdata['FirstName']; ?>" class="form-control" />
                                        </div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Date of Birth</label>
                                        <div class="col-md-5 col-xs-5">
                                            <div class="input-group">
                                                    <input type="text" name="DOB" class="form-control" placeholder="05/15/2013" id="dp-4" value="<?php echo $userdata['DOB']; ?>" >
                                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                        </div>
                                    </div>
									
								
								<div class="panel-body">
									<h3><span class="fa fa-pencil"></span> Contact Details : </h3>
									</div>	
								<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Address</label>
                                        <div class="col-md-5 col-xs-5">
                                            <textarea type="textarea" name="Address" placeholder="Address" class="form-control" reqiured/><?php echo $userdata['Address']; ?></textarea>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">City</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" name="City" placeholder="City" class="form-control" value="<?php echo $userdata['City']; ?>" reqiured/>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">State</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" name="State" placeholder="State" class="form-control" value="<?php echo $userdata['State']; ?>" reqiured/>
                                        </div>
                                    </div>
									<div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">Contact Number</label>
                                            <div class="col-md-5 col-xs-5">                                                                                
                                               <input type="text" name="MobileNo" placeholder="Contact Number" value="<?php echo $userdata['MobileNo']; ?>"  class="form-control" reqiured/>
                                            </div>
                                        </div> 
								
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="profileupdate">Update</button>
                                        </div>
                                       
                                    </div>
									
									
                                                                           
                                    
                                </div>
                            </div>
                            </form>
                            
                            

                       
						
						
						
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
                                            <input type="text" name="oldpassword" id="oldpass" placeholder="Old Password" class="form-control" value="<?php echo $userdata['Password']; ?>" reqiured/>
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
						
						
						
						
						<div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                               
                                <div class="panel-body form-group-separated">
								
                                    
									<div class="panel-body">
									<h3><span class="fa fa-pencil"></span> User Details : </h3>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">  ID</label>
                                        <div class="col-md-5 col-xs-5">
                                            
                                       <input type="text" class="form-control" name="UserID"  placeholder="ID" value="<?php echo $userdata['UserID']; ?>" reqiured>
                                 
                                        </div>
                                    </div>
									
									
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" id="bankupdate"  name="bankupdate">Update</button>
                                        </div>
                                       
                                    </div>
									
									
                                                                           
                                   
                                </div>
                            </div>
                            </form>
                            
                            

                        </div>
						
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