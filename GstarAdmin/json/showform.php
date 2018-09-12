<?php

include("../Mysqli/Memberclass.php");

$type=$_GET['type'];
$current_income=0;

if($type="Binery")
{
$total=0;
	$obj->gettotalbinerybusiness($obj->userID,"Left");
	$lefttotal=$total;
	$total=0;
	$obj->gettotalbinerybusiness($obj->userID,"Right");
	$righttotal=$total;
	if($righttotal>=$lefttotal)
	{		$current_income=$lefttotal;		}else{ $current_income=$righttotal; }
	
	
	$current_income=$current_income*$obj->binery_percent/100;
	
	//Checking paid Total
	
	$paid_binery=$obj->get_paid_total($obj->userID,"Binery");
	$current_income=$current_income-$paid_binery;
	
}


if($type=="Direct")
{
$total=0;
	$obj->direct_business($obj->userID);
	$current_income=$total;
	$current_income=$current_income*$obj->referal_percent/100;
	$paid_binery=$obj->get_paid_total($obj->userID,"Direct");
	$current_income=$current_income-$paid_binery;
}


?>

  <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Your Current Income is </label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" value="<?php echo $current_income; ?>"  class="form-control" readonly/>
                                        </div>
                                    </div>
								
									
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Your Request Amount (INR)</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="Amount" class="form-control" name="TotalAmount" reqiured/> 
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">Payment Mode</label>
                                            <div class="col-md-5 col-xs-5">                                                                                
                                                <select class="form-control select" data-live-search="true" name="PaymentMode">
													<option value="Bank Wire" >Bank Wire</option>
												
                                                </select>
                                            </div>
                                        </div>
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="request">Request</button>
                                        </div>
                                       
                                    </div>