<?php
@session_start();
include("../package/Memberclass.php");

$type=$_GET['type'];
$current_income=0;

if($type=="Binery")
{
/*
$total=0;
	$obj->gettotalbinerybusiness($obj->userID,"Left");
	$lefttotal=$total;
	$total=0;
	$obj->gettotalbinerybusiness($obj->userID,"Right");
	$righttotal=$total;
	
	//echo $lefttotal;
	//echo $righttotal;
	//echo "hello";
	
	if($righttotal>=$lefttotal)
	{		$current_income=$lefttotal;		}else{ $current_income=$righttotal; }
	
	
	//echo $current_income;
	
	
	//Checking paid Total
	
	$paid_binery=$obj->get_paid_total($obj->userID,"Binery");
	$current_income=$current_income-$paid_binery;
	$current_income=$current_income-500;
	//echo $current_income1=$current_income*$obj->binery_percent/100;
	
	//$current_income=$current_income$current_income1;
	if($current_income<1){$current_income=0;} */
	
	
	
	
$data=array();
$daterecord=array();
$left = $obj->gettotalbusiness($obj->userID,"Left");

$leftdates = $daterecord;



$data=array();
$daterecord=array();
$right = $obj->gettotalbusiness($obj->userID,"Right");

$rightdates = $daterecord;


$totaldates1 = array_merge($rightdates,$leftdates);
$totaldates=array_unique($totaldates1);

sort($totaldates);
	
	
	
	$leftcarry=0;
											$rightcarry=0;
											
											$totalam=0;
											
											
											
											
											
											
											foreach($totaldates as $dates)
											{
											$leftshow=0;
											if(!empty($left[$dates])){$leftshow=$left[$dates];}
											$rightshow=0;
											if(!empty($right[$dates])){$rightshow=$right[$dates];}
											
		 $leftcarry+=$leftshow;
		 $rightcarry+=$rightshow;		 
								
								if($leftcarry>$rightcarry){
								$matching = $leftcarry-$rightcarry;
								$matching1 = $leftcarry-$matching;
									if($leftcarry>$matching1){$leftcarry=$leftcarry-$matching1; $rightcarry=0; }else{$leftcarry=0; }
								}else{
									$matching = $rightcarry-$leftcarry;
									$matching1 = $rightcarry-$matching;
								}			if($rightcarry>$matching1){ $rightcarry=$rightcarry-$matching1; $leftcarry=0;}else{ $rightcarry=0; }
											
											$matchingamount=$matching1*$obj->binery_percent/100;
											
											//echo $matchingamount;
											//echo $capping;
											
											
											foreach($cappingwithtime as $key=>$val)
											{
											
											 $current=strtotime($dates);											 
											
											if($key<=$current)
											{$capping=$val; break;}
											
											
											}
											
											$capping1 = $matchingamount-$capping; 
											
							if($capping1<=0){ 
										
							$capping1 = 0;					
					}else{
					$matchingamount=$capping;
					}						
											
                                            
											$totalam+=$matchingamount;
											}
											
										
										$current_income=$totalam;
										
										if($current_income>500){
	$current_income=$current_income-500; }
										
										$paid_binery=$obj->get_paid_total($obj->userID,"Binery");
	$current_income=$current_income-$paid_binery;
	
											
	
	
	
	
	
	
}


if($type=="Direct")
{
$total=0;
	$obj->direct_business($obj->userID);
	 $current_income=$total;
	//echo $obj->referal_percent;
	$current_income=$current_income*$obj->referal_percent/100;
	 $paid_direct=$obj->get_paid_total($obj->userID,"Direct");
	$current_income=$current_income-$paid_direct;
	//echo $current_income;
}

$_SESSION['current_income']=$current_income;

?>

<script>
$("#TotalAmount").keyup(function(){
														
														var myval = $("#TotalAmount").val();
														var txt = myval*5/100;
														txt=myval-txt;
														$("#charges").val(txt);
														
														});	
</script>

  <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Your Current Income is </label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" name="current_income" value="<?php echo $current_income; ?>"  class="form-control" readonly/>
                                        </div>
                                    </div>
								
									<?php
									
									if($current_income>=20){
									
									?>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Your Request Amount ($)</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="Amount" class="form-control" name="TotalAmount" id="TotalAmount" reqiured/> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Net Payable</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="After Deductions" class="form-control" id="charges" readonly> 
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">Payment Mode</label>
                                            <div class="col-md-5 col-xs-5">                                                                                
                                                <select class="form-control select" data-live-search="true" name="PaymentMode">
													<option value="Paypal" >Paypal</option>
												
                                                </select>
                                            </div>
                                        </div>
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="request">Request</button>
                                        </div>
                                       
                                       
                                    </div>
                                    
                                    <?php } ?>