<?php
include("../package/Memberclass.php");

$step=$_GET['step'];

switch($step)
{

	case 1:
	{
	
		
	
		?>
		 <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Select Url</label>
                                        <div class="col-md-5 col-xs-5">
										<select name="pin" id="selectpin" class="form-control select" data-live-search="true">
                                           <?php
										   
										   $data = $obj->get_one_record("select * from pin_info where userID='".$obj->userID."' and PackID='".$_GET['packid']."' and status='un-used'");
													foreach($data as $val)
													{
														echo '<option value="'.$val['pinID'].'">[ Url Number :- '.$val['pin']." Amount :- ".$val['Amount']." $ Profit :- ".$val['Interest']."% Days :- ".$val['Days'].' ]</option>';
													}
										   
										   ?>
										   
										   </select>
                                        </div>
                                    </div>
									
									
									
		<?php
		break;
	}
	case 2:
	{
	
	  $data = $obj->get_one_record("select * from Registration where userID='".$_GET['userid']."'");
	  if(empty($data)){ echo "Invalid User !!";}else{
	  echo $data[0]['FirstName']." ".$data[0]['LastName']; }
		
	break;
	
	}
	
	
	
	
	
}



?>


							
									
									
			