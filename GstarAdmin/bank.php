<?php include'head.php' ?>       
<?php

if(isset($_POST['bankupdate']))
{

$obj->bank_update(array_filter($_POST));

}
$bankdata=$obj->loaduserinfo();
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
									<h3><span class="fa fa-pencil"></span> Ac Details : </h3>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Bank Name</label>
                                        <div class="col-md-5 col-xs-5">
                                            
                                       <input type="text" class="form-control" name="Bank_Name" id="Bank_Name" placeholder="allahabad bank" value="<?php echo $bankdata['Bank_Name']; ?>" reqiured>
                                 
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Branch</label>
                                        <div class="col-md-5 col-xs-5">                                    
                                         <input type="text" class="form-control" name="Branch_Name" value="<?php echo $bankdata['Branch_Name']; ?>" id="Branch_Name" placeholder="Branch" reqiured>
                                        </div>
                                    </div>
								
								<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">IFSC/MIRC Code</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" name="IFSC_Code" id="IFSC_Code" value="<?php echo $bankdata['IFSC_Code']; ?>" placeholder="IFSC/MIRC Code" class="form-control" reqiured/>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Account Name As per bank Ac</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" name="Acc_Holder_Name" id="Acc_Holder_Name" value="<?php echo $bankdata['Acc_Holder_Name']; ?>" placeholder="Account Name As per bank Ac" class="form-control" reqiured/>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Account No.</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" name="Bank_Acc_No" id="Bank_Acc_No" value="<?php echo $bankdata['Bank_Acc_No']; ?>" placeholder="Account No." class="form-control" reqiured/>
                                        </div>
                                    </div>
									
									
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Pan Number</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" name="Pan_Number" id="Pan_Number" value="<?php echo $bankdata['Pan_Number']; ?>" placeholder="Pan Number" class="form-control" reqiured/>
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