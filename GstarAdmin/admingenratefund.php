<?php include'head.php' ?>       


           <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> Generate Url</h2>
                </div>
<?php

if(isset($_POST['generate']))
{

$requestarray=array();
	$requestarray['TotalAmount']=$_POST['TotalAmount'];
	$requestarray['pinrequest']=1;
	$requestarray['PaymentType']="Genrated Fund by ".$obj->userID;
	$requestarray['Status']='Approved';
	$requestarray['Trantype']="1";
	$requestarray['PaymentMode']="Infinity Balance";
	
	$obj->withdrawal_request(array_filter($requestarray));
	$obj->flash="Successfully Genrated Fund ";
	
}


?>
               <div class="page-content-wrap">
                    
                       <?php include("error.php"); ?>
                    
                    <div class="row">                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                            
                           
                            
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Generate Fund : </h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5"></div>
                                    </div>
									
									
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Amount </label>
                                        <div class="col-md-5 col-xs-5">  <input type="text" placeholder="Amount" class="form-control" name="TotalAmount" reqiured/ ></div>
                                    </div>
									
									
									
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="generate">Generate</button>
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