<?php include'head.php' ?>       
<?php



if(isset($_POST['request']))
{
	$_POST['request']="";
	
	$obj->withdrawal_request(array_filter($_POST));
	
	
	
}


?>



           <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> Bank Withdrawal</h2>
                </div>

               <div class="page-content-wrap">
                    
                       <?php include("error.php"); ?>
                    
                    <div class="row">                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                            
                           
                            
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Your Wallet Information</h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
								
								 <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Select Payment Type </label>
                                        <div class="col-md-5 col-xs-5">
                                            <select class="form-control select" data-live-search="true" name="PaymentType" id="PaymentType">
											<option value="" > --Select-- </option>
													<option value="Binery" > Binery </option>
													<option value="Direct"> Direct </option>
												
                                                </select>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Minimum Withdrawal Amount </label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" value="1000 INR" class="form-control" readonly/> 
                                        </div>
                                    </div>
								
								
                                  <div id="showform" style="text-align:center">
									
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