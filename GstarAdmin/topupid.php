<?php include'head.php' ?>       
<?php

if(isset($_POST['topup']))
{

$data = $obj->get_one_record("select * from pin_info where userID='".$obj->userID."' and PackID='".$_POST['packID']."' and pinID='".$_POST['pin']."' and status='un-used'");
if(!empty($data)){
$totalamount=$data[0]['Amount'];
$pin=$data[0]['pin'];
$array['Commitment']=rand();
$array['DateTime']=$obj->today_date;
$array['PinID']=$pin;
$array['TotalAmount']=$totalamount;
$array['UserID']=$_POST['topupuserid'];

//Add commitment

$obj->insert_data("Commitment",$array);
$lastid=$obj->mysqli2->insert_id;

if($obj->update_data("update pin_info set use_date='".$obj->today_date."',OrderID='".$lastid."',status='used',useduserID='".$_POST['topupuserid']."' where pinID='".$data[0]['pinID']."'"))
{

$obj->update_data("update Registration set PaidStatus='Paid' where UserID='".$_POST['topupuserid']."'");

	$obj->flash="Successfully Top Up :- ".$_POST['topupuserid']." [Success]";

}else{
	$obj->flash="Error !! [Try Again Later]";
}



}else{

$obj->flash=" Please reload this page for more topups . [ Error !! ]";

}



}


?>


           <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> TOPUP ID</h2>
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
                                    <h3><span class="fa fa-pencil"></span>TOPUP ID</h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                   
								   <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Select Package</label>
                                        <div class="col-md-5 col-xs-5">
                                         <select class="form-control select" data-live-search="true" name="packID" id="packid">
												<option value="">--Select--</option>
												<?php
												
													$data = $obj->get_one_record("select * from packages");
													foreach($data as $val)
													{
												
												?>
												
													<option value="<?php echo $val['packID']; ?>" ><?php echo $val['name']; ?> [ <?php echo $val['InterestRate']; ?>% ]</option>
													<?php } ?>
                                                </select>
                                        </div>
                                    </div>
									<div id="showpin">
									
									</div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">User ID</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" name="topupuserid" id="topupuserid" placeholder="User ID" class="form-control" reqiured/>
											  <button type="button" id="verifytopup" class="btn btn-danger">Verify</button>
											  <div id="showname"></div>
                                        </div>
                                    </div>
									
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" name="topup" class="btn btn-danger">Top Up</button>
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