<?php
@session_start();


class Member
{






	public function __construct()
	{
		error_reporting(0);
		//ini_set("memory_limit","512M");
		
		//Configration of Database ....
		
		//$this->mysqli = new mysqli('localhost', 'root', '', 'trading');
		@date_default_timezone_set("America/New_York"); 
		
		$this->mysqli2 = new mysqli('localhost', 'root', '', 'gstarmar_mlm');
		
				
			//	$this->userID = $_SESSION['User_Arrsay']['userID'];
		$this->userID = $_SESSION['user_array']['UserID'];
		if (mysqli_connect_errno()) {
			    printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			}
			
			$this->node_array=array();
			$this->today_date=date("F j, Y, g:i a");
			$this->today_date_only=date("F j, Y");
			
			$this->referal_percent="10";
			$this->binery_percent="10";
			$this->tds="5";
			$this->admin="0";
					
	}


function loaduserinfo()
{

	$query4 = "SELECT * FROM Registration WHERE UserID = '".$this->userID."'";
       
           
       $result4=$this->mysqli2->query($query4);
       $num=$result4->fetch_assoc();
	   
	   return $num;

}


function loaduserinfo2($id)
{

	$query4 = "SELECT * FROM Registration WHERE Id = '".$id."'";
       
           
       $result4=$this->mysqli2->query($query4);
       $num=$result4->fetch_assoc();
	   
	   return $num;

}

function upload_process()
{

		$file = current($_FILES);
		
		if(empty($file)){return "";}

	$dir = "../banner/";
	$arr = array(

		'error' => $file['error'], 

		'file' => "{$dir}/{$file['name']}",

		'file_name' => $file['name'], 

		'size' => $file['size']

		);


	$photo=rand().$arr['file_name'];


	if($file['error'] == UPLOAD_ERR_OK)

	 {

		if(@move_uploaded_file($file['tmp_name'], $dir.$photo))
		{				
					
			return $photo;			
		}	

	}

		
		return "";

	
	
	
}


function upload_payment($tarray)
{
	//$tarray['UserID']=$this->userID;
	$tarray['cphoto']=$this->upload_process();
	if($this->insert_data("admincontest",$tarray))
	{
		$this->flash = "Successfully Uploaded Your Contest .[Success]";
	}else{ $this->flash = "Error While Uploading Payment . [Error!!]"; }


}


function profile_update($array,$userid)
{

	$query = "update Registration set ".$this->make_query(array_filter($array))." where Id='".$userid."'";




	   if($this->update_data($query))
        {        
     
    		  $this->flash = "Profile Information Updated Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while updating .[Error]";
		}

}

public function withdrawal_request($array)
{

if(empty($array['UserID'])){
$array['UserID']=$this->userID;}
$array['PaymentDate']=$this->today_date_only;


	   if($this->insert_data("payments",$array))
        {        
     
    		  $this->flash = "Withdrawal Request is Successfully Genrated Wait for Admin Approvel.  [Thanks]";
        
        }
		else{
				$this->flash = "Error  .[Error]";
		}
}


function check_current_income()
{
global $cappingwithtime;

$returnarray=array();

	//Daily Bonus

											$sno=1;
											$totalb=0;
											
											$data = $this->get_one_record("select * from Commitment where userID='".$this->userID."' and CommitmentStatus='Active'");
											
											
											
											
											foreach($data as $val)
											{
											
											
											
											
											
											
												
												$data2 = $this->get_one_record("select * from pin_info where useduserID='".$this->userID."' and OrderID='".$val['CommitID']."'");
												
												
												
												//echo $data2[0]['Interest'];
												
											 $d1=$val['TotalAmount']*$data2[0]['Interest']/100;
												
											$leftdays=0;
											$leftdays1=0;
												error_reporting(false);
												$totaldays=$data2[0]['Days'];
												$nowdays=$days;
												$currentdate=strtotime($val['DateTime']);
									 $enddate=strtotime(" +".$totaldays." days",$currentdate);
												
												$dailygrowth = $this->get_one_record("select * from dailygrowth where userID='".$this->userID."' and TimeStr>='".strtotime($val['DateTime'])."'and TimeStr<='".$enddate."' ");
												
												
												$i=0;
												foreach($dailygrowth as $val2)
												{
												
												$i++;
												
												
												
			$leftdays1=$nowdays-$i;
			$leftdays=$totaldays-$leftdays1;
			
			
			
												//$totaldays=$totaldays-1;
												$date=$val2['DateTime'];
												
												 $abc=$days-$i;

												
											
													$d1=$val['TotalAmount']*$data2[0]['Interest']/100;  
													
												
												$totalb+=$d1;
												
												
												}
												
													
												}
		$dailybonus=$totalb;	
		$returnarray['DAILYBONUS']=$dailybonus;									
												

//End Daily Bonus

//REFERRAL BONUS

												
													$data = $this->get_one_record("select * from Registration where DirectID='".$this->userID."'");
													
													$totalam=0;
													foreach($data as $val)
													{
														$query2 = "SELECT SUM(TotalAmount) AS Amount FROM Commitment WHERE UserID = '".$val['UserID']."'"; 				 
														 $row1=$this->get_one_record($query2);
														 $row1=$row1[0];
														 if(!empty($row1['Amount'])){ $val['amount']=$row1['Amount']; }else{ $val['amount']=0; }
														 
														 
														 
												
											
											
										
											
											
                                                $co=$val['amount']*$this->referal_percent/100; 
                                                  
                                                
												
												
												$totalam+=$co;
												
												}
												$referralbonus=$totalam;
												
$returnarray['REFERRALBONUS']=$referralbonus;	
//END REFERRAL BONYS

////Infinity bonus

$this->data=array();
$this->daterecord=array();
$left = $this->gettotalbusiness($this->userID,"Left");

$leftdates = $this->daterecord;


$this->data=array();
$this->daterecord=array();
$right = $this->gettotalbusiness($this->userID,"Right");

$rightdates = $this->daterecord;



$totaldates1 = array_merge($rightdates,$leftdates);
$totaldates=array_unique($totaldates1);

sort($totaldates);




											$leftcarry=0;
											$rightcarry=0;
											
											$totalam2=0;
											
											
											
											
											
											
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
									if($leftcarry>=$matching1){$leftcarry=$leftcarry-$matching1; $rightcarry=0; }else{$leftcarry=0; }
								}else{
									$matching = $rightcarry-$leftcarry;
									$matching1 = $rightcarry-$matching;
											if($rightcarry>=$matching1){ $rightcarry=$rightcarry-$matching1;  $leftcarry=0;}else{ $rightcarry=0; }
								}			
											
											//echo $matching1;
											
											$matchingamount=$matching1*$this->binery_percent/100;
											
											
											//echo $capping;
											
											$capping=0;
											
											foreach($cappingwithtime as $key=>$val)
											{
											
											$current=strtotime($dates);											 
											
											if($key<=$current)
											{  $capping=$val; break;}
											
											
											}
											
											//if($matchingamount>0){echo $matchingamount;}
											if(!empty($capping)){
											$capping1=$matchingamount-$capping; 
											
											}
											
											
							if($capping1<=0 || $capping1==""){ 
										
							$capping1 = 0;					
					}else{
					$matchingamount=$capping;
					}						
								//	echo $matchingamount;		 
											 $totalam2+=$matchingamount;
											}
											
				$infinitybonus=$totalam2;	
				
				 $returnarray['INFINITYBONUS']=$infinitybonus;	
				
				
				
				
				


//End infinity bonus

//TOTAL CREDITS

$mybonus1 = "SELECT SUM(TotalAmount) as Total FROM payments WHERE UserID='".$this->userID."' and TranType='1'";
		$mbonus1=$this->get_one_record($mybonus1);
		
		$credit=$mbonus1[0]['Total'];
		$returnarray['CREDIT']=$credit;

//END TOTAL CREDITS

//Total widthdrawal
$mybonusw = "SELECT SUM(TotalAmount) as Total FROM payments WHERE UserID='".$this->userID."' and PaymentType='Widthdrawl'";
		$mbonusw=$this->get_one_record($mybonusw);
		
		$width=$mbonusw[0]['Total'];
		$returnarray['WIDTH']=$width;

//End

//TOTAL DEBITS

$mybonus = "SELECT SUM(TotalAmount) as Total FROM payments WHERE UserID='".$this->userID."' and TranType='0'";
		$mbonus=$this->get_one_record($mybonus);
		
		$debit=$mbonus[0]['Total'];
		$returnarray['DEBIT']=$debit;

//END TOTAL DEBITS
$TOTAL=$returnarray['CREDIT']+$returnarray['INFINITYBONUS']+$returnarray['REFERRALBONUS']+$returnarray['DAILYBONUS'];
$returnarray['TOTAL']=$TOTAL;
$returnarray['CURRENTBALANCE']=$TOTAL-$returnarray['DEBIT'];

	return $returnarray;

}



function bank_update($array,$userid,$email)
{

$query4 = "SELECT * FROM Registration WHERE UserID = '".$array['UserID']."'";
       
           
       $result4=$this->mysqli2->query($query4);
       $num=$result4->fetch_assoc();

if($num)
{
$this->flash="Email Already Used [Error]";
return false;
}

$query = "update Registration set UserID='".$array['UserID']."' where Id='".$userid."'";

$query2 = "update Registration set ChainID='".$array['UserID']."' where ChainID='".$email."'";


$query3 = "update Registration set DirectID='".$array['UserID']."' where DirectID='".$email."'";

$this->update_data($query);

$this->update_data($query2);

$this->update_data($query3);

	  
    		  $this->flash = "Information Updated Successfully .  [Thanks]";
        
      

} 	

function change_password($array,$userid)
{
	$query4 = "SELECT * FROM Registration WHERE Id = '".$userid."' and Password='".$array['oldpass']."'";
       
           
       $result4=$this->mysqli2->query($query4);
       $num=$result4->fetch_assoc();
	   if($num){

	$query="update Registration set Password='".$_POST['newpassword']."' where Id='".$userid."'";
		   if($this->update_data($query))
        {        
     
    		  $this->flash = "Passowrd Updated Successfully .  [Thanks]";
        
        }
		else{ 
				$this->flash = "Error while updating password . [Error]";
		}
	}else{
	
		$this->flash = "Error Old Password Is Wrong Try Again . [Error]";
	
	}
}



/********************************************************************

PACKAGE FUNCTIONS

********************************************************************/

function make_query($query)
{
$return="";
	foreach($query as $key=>$val)
	{
		$return.=$key."='".$val."',";
	}

	return substr($return, 0, -1);

}

function insert_data($tablename,$array)
{
$values = "";
$keys = "";
	$query = "insert into ".$tablename." (";
	foreach($array as $key=>$val)
	{
		$keys.=$key.",";
		$values.="'".$val."',";
		
	}
$keys=substr($keys,0,-1);
$values=substr($values,0,-1);

$query.=$keys.") values (".$values.")";

$this->mysqli2->query($query);

return $this->mysqli2->insert_id;

}



function create_package($array)
{

	   if($this->insert_data("packages",$array))
        {        
     
    		  $this->flash = "New Package Added Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while creating package .[Error]";
		}
	
}


function update_package($array,$id)
{

$query = "update packages set ".$this->make_query($array)." where packID='".$id."'";




	   if($this->update_data($query))
        {        
     
    		  $this->flash = "Package Updated Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while updating package .[Error]";
		}
	
}


//News and Update


function create_news($array)
{

	   if($this->insert_data("news",$array))
        {        
     
    		  $this->flash = "News Added Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while creating .[Error]";
		}
	
}


function create_news2($array)
{

	   if($this->insert_data("adnews",$array))
        {        
     
    		  $this->flash = "News Added Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while creating .[Error]";
		}
	
}

function update_news($array,$id)
{

$query = "update news set ".$this->make_query($array)." where NewsID='".$id."'";




	   if($this->update_data($query))
        {        
     
    		  $this->flash = "News Updated Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while updating .[Error]";
		}
	
}



function update_news2($array,$id)
{

$query = "update adnews set ".$this->make_query($array)." where NewsID='".$id."'";




	   if($this->update_data($query))
        {        
     
    		  $this->flash = "News Updated Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while updating .[Error]";
		}
	
}


function update_vid($array,$id)
{

$query = "update todaywork  set ".$this->make_query($array)." where vidID='".$id."'";




	   if($this->update_data($query))
        {        
     
    		  $this->flash = "Video Updated Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while updating .[Error]";
		}
	
}



function create_date($array)
{

	   if($this->insert_data("holidays",$array))
        {        
     
    		  $this->flash = "Holiday  Added Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while creating .[Error]";
		}
	
}


function update_dates($array,$id)
{

$query = "update holidays set ".$this->make_query($array)." where holiid='".$id."'";




	   if($this->update_data($query))
        {        
     
    		  $this->flash = "Holiday Updated Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while updating .[Error]";
		}
	
}


//Client Testimonials


//News and Update


function create_client($array)
{

	   if($this->insert_data("client",$array))
        {        
     
    		  $this->flash = "New Client Added Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while creating .[Error]";
		}
	
}


function update_client($array,$id)
{

$query = "update client set ".$this->make_query($array)." where NewsID='".$id."'";




	   if($this->update_data($query))
        {        
     
    		  $this->flash = "Updated Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while updating .[Error]";
		}
	
}



public function load_tree($userid,$leg="")
{
	global $treeusers;
//	global $level;
if(empty($leg)){
 $result3=$this->mysqli2->query("select * from Registration  where UserID='".$userid."'");
}else{
	  $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	
       }
       $row3=$result3->fetch_assoc();
	   
	   if($row3){
	   if($row3['PaidStatus']=="Free")
	  { $row3['img']="img/f.png"; }else{ $row3['img']="img/p.png"; } 
	   }
	 //  print_r($row3);
	   if(empty($row3)){ $row3['UserID']=" "; $row3['img']="img/c.png"; }
	   
	  $treeusers=$row3;
  	
	

}



function delete_payment_request($id)
{
	if($this->mysqli2->query("delete from paymentuploads where PayID='".$id."'"))
        {        
     
    		  $this->flash = "Payment Request Deleted Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while Deleting Request .[Error]";
		}
}



function delete_package($id)
{
	if($this->mysqli2->query("delete from packages where packID='".$id."'"))
        {        
     
    		  $this->flash = "Package Deleted Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while Deleting package .[Error]";
		}
}






/**********************************************************

PACKAGE FUNCTIONS END

**********************************************************/


/********************************************************************

PIN FUNCTIONS

********************************************************************/


function delete_user($id)
{






$this->mysqli2->query("delete from Commitment where UserID='".$id."'");
$this->mysqli2->query("delete from pin_info where userID='".$id."' or useduserID='".$id."'");

	



	if($this->mysqli2->query("delete from Registration where UserID='".$id."'"))
        {        
     
    		  $this->flash = "User Deleted Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error  .[Error]";
		}
		
		
}




function delete_with_request($id)
{
	if($this->mysqli2->query("delete from payments where WithID='".$id."'"))
        {        
     
    		  $this->flash = "Request Deleted Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error  .[Error]";
		}
}




function update_payment_request($array,$updateid)
{

$query="update payments set Status='Paid',PaidDate='".$array['PaidDate']."',TranID='".$array['TranID']."',TotalAmount='".$array['TotalAmount']."' where WithID='".$updateid."'";
if($this->update_data($query))
{

	$this->flash="Updated Successfully ...";

}

}



function update_paymentupload($id,$updateid)
{

$query="update paymentuploads set Status='Active',PinNumber='".$id."' where PayID='".$updateid."'";
if($this->update_data($query))
{

	$this->flash="Updated Successfully ...";

}

}



function create_pin($array)
{

$packid=2;
$num = $array['numbers'];
if($array['amount']<=100){
$packid=1;
}
//$packid = $array['packID'];

$data = $this->get_one_record("select * from packages where packID='".$packid."'");
$data = $data[0];


for($i=0;$i<$num;$i++){

$array1 = array("pin"=>rand(),"create_date"=>$this->today_date,"PackID"=>$packid,"userID"=>"admin","Interest"=>$data['InterestRate'],"Days"=>$data['Days'],"Amount"=>$array['amount']);
	   if($id=$this->insert_data("pin_info",$array1))
        {        
     
    		  $this->flash = "New Url Added Successfully .  [Thanks]";
			  
        
        }
		else{
				$this->flash = "Error while creating Url .[Error]";
		}
		
	}	
	
	
	return $array1['pin'];
	
}



function transfer_pin($array)
{

$transferto = $array['userID'];
//$packID = $array['packID'];
$numbers = $array['transfer'];
$currentuser = $this->userID;






if(empty($numbers))
{
	$this->flash = "Please select url you want to transfer . [Error]";
	return false; 
}


if(empty($transferto))
{
	$this->flash = "Enter USERID . [Error]";
	return false; 
}

if($transferto=="admin")
{
	$this->flash = "You can't tranfer url to yourself . [Error]";
	return false; 
}

$sql=$this->mysqli2->query("select * from Registration where userID='".$transferto."'"); 
      $rows = $this->mysqli2->affected_rows;  
	  
	  if(!$rows)
	  {
	  	$this->flash = "Invalid User ID . [Error]";
	return false;
	  }



  $sql=$this->mysqli2->query("select * from pin_info where userID='admin' and status='un-used'"); 
      $rows = $this->mysqli2->affected_rows;  

if($rows<count($numbers))
{
	$this->flash = "Insufficent URLS . Please check UN USED URLS. [Error]";
	return false;
}
	
	
	$tarray = array("senderID"=>"admin","receiverID"=>$transferto,"senddate"=>$this->today_date,"no"=>count($numbers),"packID"=>$packID);
//print_r($tarray);


foreach($numbers as $val)
{
	 $myq="update pin_info set userID='".$transferto."' where pinID='$val'";
	
$this->mysqli2->query($myq);

}
	if($this->insert_data("pin_transfer_info",$tarray))
	{
		$this->flash = "Successfully Transfer .[Success]";
	}else{ $this->flash = "Error While Transfering URLS. [Error!!]"; }


}



function delete_pin($id)
{
	if($this->mysqli2->query("delete from pin_info where packID='".$id."'"))
        {        
     
    		  $this->flash = "Pin Deleted Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while Deleting Url.[Error]";
		}
}






/**********************************************************

PIN FUNCTIONS END

**********************************************************/





	
	
	 function getChainID($auto,$node)
	{
		
		$result=$this->mysqli2->query("select * from Registration where Position='".$node."' and ChainID='".$auto."'");	
		
		if($fetch=$result->fetch_assoc())
		{
			
			 $memberID=$fetch['UserID'];
			$this->getChainID($memberID,$node);
		
		}
		else
		{
			 $this->chainId=$auto;
		}

		

	}
	
	
/*	 function checkmemberstatus($id)
     {
        $sql=$this->mysqli2->query("select * from Registration where UserEmail='".$id."' and Status='Active'"); 
        return $this->mysqli2->affected_rows;       
     }*/
	
	
	
	/***************
	SENDING HTML EMAIL FUNCTION
	*******************/
	
		
	public function SendMail($subject,$to,$html)
	{

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: '.$to."\r\n";
$headers .= 'From: admin@infinityreferral.us' . "\r\n";


// Mail it
mail($to, $subject, $html, $headers);

	
	}
	
	
	 function checkmemberstatus2($id)
     {
        $sql=$this->mysqli2->query("select * from Registration where UserID='".$id."'"); 
        return $this->mysqli2->affected_rows;       
     }
	
	public function register_member($array)
	{
		  $msg='';
        
    //   print_r($array);
	  if(!$this->checkmemberstatus2($array['DirectID']))
	   {
	   $this->flash='SponserID/DirectID May Be In-Active or not Available';
	    return false;
	   }
        
        if($this->checkmemberstatus2($array['UserID']))
        {
        $this->flash='Your User Id Is Already Used !!';
        return false;
        }
        
		$this->chainID="";
		
        $this->getChainID($array['DirectID'],$array['Position']);
       
      $array['ChainID']=$this->chainId;
	  $array['RegistrationDate']=$this->today_date;
	  
        
        if($this->insert_data("Registration",$array))
        {
        
        	//Email Verification Code
        	
        	$body='<div id="wrapper" style="background-color: #f5f5f5; margin: 0; padding: 70px 0 70px 0; -webkit-text-size-adjust: none !important; width: 100%;">
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%"><tr>
<td align="center" valign="top">
<div id="template_header_image">
</div>
<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important; background-color: #fdfdfd; border: 1px solid #dcdcdc; border-radius: 3px !important;">
<tr>
<td align="center" valign="top">
<!-- Header -->
<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style='."'".'background-color: #557da1; border-radius: 3px 3px 0 0 !important; color: #ffffff; border-bottom: 0; font-weight: bold; line-height: 100%; vertical-align: middle; font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;'."'".'><tr>
<td>
<h1 style='."'".'color: #ffffff; display: block; font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; font-size: 30px; font-weight: 300; line-height: 150%; margin: 0; padding: 36px 48px; text-align: left; text-shadow: 0 1px 0 #7797b4; -webkit-font-smoothing: antialiased;'."'".'>HTML Email Template</h1>
</td>
</tr></table>

</td>
</tr>
<tr>
<td align="center" valign="top">

<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body"><tr>
<td valign="top" id="body_content" style="background-color: #fdfdfd;">

<table border="0" cellpadding="20" cellspacing="0" width="100%"><tr>
<td valign="top" style="padding: 48px;">
<div id="body_content_inner" style='."'".'color: #737373; font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; font-size: 14px; line-height: 150%; text-align: left;'."'".'>

<p style="margin: 0 0 16px;">Your registration procees is completed .</p>
<h2 style='."'".'color: #557da1; display: block; font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; font-size: 18px; font-weight: bold; line-height: 130%; margin: 16px 0 8px; text-align: left;'."'".'>
Welcome to Infinity Referral</h2>
<p style="margin: 0 0 16px;">Now you have permissionn to login with our website . Your username for login is '.$array['UserID'].' and you can use '.$array['Password'].' as password .</p>
</div>
</td>
</tr></table>

</td>
</tr></table>

</td>
</tr>
<tr>
<td align="center" valign="top">

<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer"><tr>
<td valign="top" style="padding: 0; -webkit-border-radius: 6px;">
<table border="0" cellpadding="10" cellspacing="0" width="100%"><tr>
<td colspan="2" valign="middle" id="credit" style="padding: 0 48px 48px 48px; -webkit-border-radius: 6px; border: 0; color: #99b1c7; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;">
<p>Infinity Referral</p>
</td>
</tr></table>
</td>
</tr></table>

</td>
</tr>
</table>
</td>
</tr></table>
</div>';
        
        @$this->SendMail("Registration Mail",$_POST['UserEmail'],$body);
        
        $this->flash = "Registration Is Successfully Done .  [Thanks]";
        
        }
        
        
        
        
        
	}



	/*public function insert_data($table,$data)
	{
		

		$id = $this->mysqli->insert($table, $data);
		
		if($id){
			$this->flash = "Successfully inserted ...";
		}else{
			$this->flash = "Error Try Again Later !!";
		}
		
		
		return $id;
		//$data = $this->mysqli->get('users');
		//print_r($data);
	
	}*/
	
	
	public function update_data($query)
	{
	
	
	if($this->mysqli2->query($query)){
	$arr = array("type"=>"success","message"=>"Successfully Updated your password");
			$this->flash = "Successfully Updated ...";
		}else{
		$arr = array("type"=>"error","message"=>"Please check query");
			$this->flash = "Error Try Again Later !!";
		}
	
		return $arr;
		
	}
	
	public function get_one_record($querySelect)
	{	
		//$querySelect = "SELECT * FROM ".$table." where ".$field."='".$value."'";
		//echo $querySelect;
   		 $resultSet = $this->mysqli2->query($querySelect);
   		 
   		 $data=array();
   		 
   		
    
   			 if($resultSet->num_rows > 0){
			        while($row = $resultSet->fetch_assoc()){
			            $data[]=$row;
			            }
			          }
			          
			          
		return $data;	
	}
	

 public function calculateDiffrence2($firstdate,$lastdate)
    {
        
     $newdate = strtotime($lastdate); 
     $olddate = strtotime($firstdate);
     $datediff = $newdate - $olddate;
      return floor($datediff/(60*60*24));
    }







public function login($email,$password)
{

	$query="select * from Registration where UserID = '".$email."' and Password = '".$password."' and Status='Active'";
	$result = $this->mysqli2->query($query);
	if($result->num_rows>0){ return $result->fetch_assoc();}else{ return array();}
	

}


var $totalmembers=0;
var $totalamount=0;
var $totalcommitment=0;


function getTotalLeg($memid,$leg)
{

  $result=$this->mysqli2->query("select * from Registration where ChainID='".$memid."' and Position='".$leg."'");
  $this->totalmembers=$this->totalmembers+$this->mysqli2->affected_rows;
  $row=$result->fetch_assoc();

      if(!empty($row))
      {        
     
       
        $query3 = "SELECT SUM(TotalAmount) AS Total FROM Commitment WHERE UserID = '".$row['Id']."'"; 
	 
     
       $result3=$this->mysqli2->query($query3);
       $row2=$result3->fetch_assoc();
       
      
      
      $this->totalamount=$this->totalamount+$row2['Total'];
      $this->getTotalLeg($row['Id'],'Left');
      $this->getTotalLeg($row['Id'],'Right');
      }
   
    
}


public function getmemberlegdetail($userid,$leg)
{

  $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	      
	   
  global $data;

 
       
       while($row3=$result3->fetch_assoc())
       {
     // print_r($row3);
	 
	 	$query2 = "SELECT SUM(TotalAmount) AS Amount FROM Commitment WHERE UserID = '".$row3['UserID']."'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 $row1=$result2->fetch_assoc();
	 	$row3['Amount']=$row1['Amount'];
       	$data[]=$row3;
		$this->getmemberlegdetail($row3['UserID'],"Left");
		$this->getmemberlegdetail($row3['UserID'],"Right");	   
      }
  	
	return $data;

}






public function gettotalbusiness($userid,$leg)
{

  $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	      
	   
  global $data;
  global $daterecord;

 
       
       while($row3=$result3->fetch_assoc())
       {
	 
	 	$query2 = "SELECT * FROM Commitment WHERE UserID = '".$row3['UserID']."'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 while($row1=$result2->fetch_assoc())
		 {
		 $date=date('d-m-Y',strtotime($row1['DateTime']));
		 if(array_key_exists($date,$data))
			  {
					$data[$date]+=$row1['TotalAmount'];
			  }
			else
			  {
			  	$daterecord[]=$date;
					 $data[$date]=$row1['TotalAmount'];
			  }
	     }		
		
		$this->gettotalbusiness($row3['UserID'],"Left");
		$this->gettotalbusiness($row3['UserID'],"Right");	   
      }
  	
	return $data;

}


/*********************************************
TOTAL BINERY AND DIRECT INCOME
*********************************************/

public function get_paid_total($userid,$type)
{

	 $query2 = "SELECT SUM(TotalAmount) as Total1 FROM  payments WHERE UserID='".$userid."'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	$row1=$result2->fetch_assoc();
		//$row1['Total1']=0;
		return $row1['Total1'];

}


public function gettotalbinerybusiness($userid,$leg)
{

  $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	      
	   
  global $total;
 
       
       while($row3=$result3->fetch_assoc())
       {
	 
	 $query2 = "SELECT SUM(TotalAmount) as Total FROM Commitment WHERE UserID = '".$row3['UserID']."'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	$row1=$result2->fetch_assoc();
		
		$total+=$row1['Total'];
		
		$this->gettotalbinerybusiness($row3['UserID'],"Left");
		$this->gettotalbinerybusiness($row3['UserID'],"Right");	   
      }
  	
	
}



public function direct_business($userid)
{

  $result3=$this->mysqli2->query("select * from Registration  where DirectID='".$userid."'");  	      
	   
  global $total;
 
       
       while($row3=$result3->fetch_assoc())
       {
	 
	 	$query2 = "SELECT SUM(TotalAmount) as Total FROM Commitment WHERE UserID = '".$row3['UserID']."'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	$row1=$result2->fetch_assoc();
		
		$total+=$row1['Total'];
		   
      }
  	
	
}







public function getdetails($memid)
{
$data = array();
	$result=$this->mysqli2->query("select * from Registration where Id='".$memid."'");
  	$row=$result->fetch_assoc();
  	
  	  $result3=$this->mysqli2->query("select * from Registration where ChainID='".$memid."'");
  	
       
       $data['Leftid'] = "";
       $data['Rightid'] = "";
       
       while($row3=$result3->fetch_assoc())
       {
      
       
       	if($row3['Position']=="Left"){ $data['Leftid']=$row3['Id'];
       	
       //	echo $row3['Id'];
       	}
       	if($row3['Position']=="Right"){$data['Rightid']=$row3['Id'];}
       
       }
  	
  	
  	$data['FirstName']=$row['FirstName'];
  	$data['LastName']=$row['LastName'];
  	$data['Id']=$row['Id'];
  	
  	 $query2 = "SELECT SUM(TotalAmount) AS TotalA FROM Commitment WHERE UserID = '".$memid."'"; 
     
       $result2=$this->mysqli2->query($query2);
       $row1=$result2->fetch_assoc();
       
       
     
       
       
       
       $query4 = "SELECT * FROM Commitment WHERE UserID = '".$memid."' and FullTimeStamp!=''";
       
           
       $result4=$this->mysqli2->query($query4);
       $num=$result4->fetch_assoc();
       
       if($num){ $data['img'] = "images/user1.png";}else{ $data['img'] = "images/user2.png";}
  	
  	
  	$data['commitment'] = $row1['TotalA'];
  	
  	return $data;
  	
}



}

$obj = new Member();

//print_r($_SESSION['User_Array']);
/*
if(!empty($_SESSION['User_Array'])){

$sessionid=$_SESSION['User_Array']['Id'];
$sessionname = $_SESSION['User_Array']['FirstName']." ".$_SESSION['User_Array']['LastName'];
$sessionemail = $_SESSION['User_Array']['UserEmail'];

}*/

//print_r($obj->get_one_record("select * from Registration where Id='$sessionid' and Password='13'"));

?>