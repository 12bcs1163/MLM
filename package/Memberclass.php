<?php
@session_start();

//Image Resize


include("imgresizer.php");


class Member
{






	public function __construct()
	{
		error_reporting(false);
		
		
		//@date_default_timezone_set("Asia/Kolkata");
@date_default_timezone_set("Asia/Kuala_Lumpur");

		
		//ini_set("memory_limit","512M");
		
		//Configration of Database ....
		
		//$this->mysqli = new mysqli('localhost', 'root', '', 'trading');
		
		$this->mysqli2 = new mysqli('localhost', 'root', '', 'gstarmar_mlm');
	
//	$this->mysqli2 = new mysqli('localhost', 'rkmeasyw_trade', 'harman@123', 'rkmeasyw_trade');
		
				
			//	$this->userID = $_SESSION['User_Array']['userID'];
		$this->userID = $_SESSION['User_Array']['UserID'];
		$this->userauto = $_SESSION['User_Array']['Id'];
		if (mysqli_connect_errno()) {
			    printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			}
			
			$this->node_array=array();
			$this->today_date=date("F j, Y, g:i a");
			$this->today_date_only=date("F j, Y");
			
			$this->referal_percent="10";
			$this->binery_percent="10";
			$this->free_amount="0.01";
$this->currency='<i class="fa fa-inr" aria-hidden="true"></i>';
			
			/*$query4 = "SELECT * FROM settings WHERE settingid='1'";
       
           
       $result4=$this->mysqli2->query($query4);
       $row=$result4->fetch_assoc();
       */
		//$this->tds=$row['tds'];	
		//$this->admin=$row['admincharges'];
		$this->tds=0;	
		$this->admin=0;
					
	}



public function getuinfo($userid)
{

 $q="select RegistrationDate,UserID,FirstName,DirectID from Registration where UserID='".$userid."'";
	$result3=$this->mysqli2->query($q);  	
       
       $row3=$result3->fetch_assoc();
	
	   
	   $result4=$this->mysqli2->query("select FirstName from Registration where UserID='".$row3['DirectID']."'");  	
       
       $row4=$result4->fetch_assoc();
	   
	   
	   $directname=$row4['FirstName'];
	   
	   $left=0;
	   $right=0;
	  if(!empty($userid)){
	   $this->totalmem=0;
	   $this->load_total_binary($userid,"Left");
	   $left=$this->totalmem;
	   
	    $this->totalmem=0;
	   $this->load_total_binary($userid,"Right");
	   $right=$this->totalmem;
	   }
	   
//geting business

$totalbusiness=0;

  $result33=$this->mysqli2->query("select userid from treestructuredata where suserid='".$userid."' and position='Left'");  	
       
      while($row33=$result33->fetch_assoc())
      {
          
           $result4=$this->mysqli2->query("select SUM(dollarsamount) as total from Commitment where UserID='".$row33['userid']."'");  	
       
            $row4=$result4->fetch_assoc();
            
            $totalbusiness+=$row4['total'];
          
      }
       
$totalbusinessr=0;

  $result33=$this->mysqli2->query("select userid from treestructuredata where suserid='".$userid."' and position='Right'");  	
       
      while($row33=$result33->fetch_assoc())
      {
          
           $result4=$this->mysqli2->query("select SUM(dollarsamount) as total from Commitment where UserID='".$row33['userid']."' and incomestatus='1'");  	
       
            $row4=$result4->fetch_assoc();
            
            $totalbusinessr+=$row4['total'];
          
      }


//end getting business
	   
	   
	   
	   
	   $return=array("JoiningDate"=>$row3['RegistrationDate'],"UserID"=>$row3['UserID'],"FirstName"=>$row3['FirstName'],"DirectID"=>$row3['DirectID'],"DirectName"=>$directname,"totalleft"=>$left,"totalright"=>$right,"totalleftb"=>"INR ".$totalbusiness,"totalrightb"=>"INR ".$totalbusinessr);
	   
	   return $return;
	   
}


public function load_total_binary($userid,$leg)
{
    
    
    $result3=$this->mysqli2->query("select COUNT(*) as total from treestructuredata where suserid='".$userid."' and position='".$leg."'");  	
       
       $row3=$result3->fetch_assoc();
       
       $this->totalmem=$row3['total'];

	/*  $result3=$this->mysqli2->query("select UserID,PaidStatus from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	
       
       $row3=$result3->fetch_assoc();
	   
	   if($row3){  
	   $this->load_total_binary($row3['UserID'],"Left");
	    $this->load_total_binary($row3['UserID'],"Right");

if($row3['PaidStatus']=="Paid"){
	   $this->totalmem++;	} }
	*/

}



public function checkuser($userid,$leg)
{

 $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	
  while($row3=$result3->fetch_assoc())
       {
	   			if($row3['UserID']==$this->checkuser)
				{
				
					$this->checkuserok="ok";
					
					return false;
				
				}
				
				$this->checkuser($row3['UserID'],"Left");
				$this->checkuser($row3['UserID'],"Right");
	   }    


}


public function get_members_info($auto,$node="")
{

if(!empty($node))
{
$query = "select * from Registration INNER JOIN Commitment ON Registration.UserID=Commitment.UserID where Registration.ChainID='".$auto."' and Registration.Position='".$node."'";
}else{
	$query = "select * from Registration INNER JOIN Commitment ON Registration.UserID=Commitment.UserID where Registration.ChainID='".$auto."'";
	}

	 $resultSet = $this->mysqli2->query($query);
   		 
   		// $data=array(); 	
   		 
    
   			 if($resultSet->num_rows>0){
			        while($row=$resultSet->fetch_assoc()){
			            $this->node_array[]=$row;
			            
			            $this->get_members_info($row['UserID']);
			            
			            }
			          }
			        
			          
			         
		

}



function check_current_income()
{

$returnarray=array();
//TOTAL CREDITS

$mybonus1 = "SELECT SUM(TotalAmount) as Total FROM payments WHERE UserID='".$this->userID."' and TranType='1' and PaymentMode='Infinity Balance'";
		$mbonus1=$this->get_one_record($mybonus1);
		
		$credit=$mbonus1[0]['Total'];
		

//END TOTAL CREDITS

//Total widthdrawal
$mybonusw = "SELECT SUM(TotalAmount) as Total FROM payments WHERE UserID='".$this->userID."' and PaymentMode='Fund' and TranType='0'";
		$mbonusw=$this->get_one_record($mybonusw);
		
		$width=$mbonusw[0]['Total'];
		


$returnarray['CURRENTBALANCE']=$credit-$width;

	return $returnarray;

}



function loaduserinfo()
{

	 $query4 = "SELECT * FROM Registration WHERE UserID = '".$this->userID."'";
       
           
       $result4=$this->mysqli2->query($query4);
       $num=$result4->fetch_assoc();
	   
	   return $num;

}

function totaldirect2($userid)
{

$myq1 = "SELECT * FROM Registration WHERE DirectID='".$userid."'";
		$packdata=$this->get_one_record($myq1);
		
		$total=0;
		
		foreach($packdata as $val)
		{
		
			$myq2 = "SELECT SUM(TotalAmount) as total FROM Commitment WHERE UserID='".$val['UserID']."' and OrDateTime like 'January %' and incomestatus='1'";
			$packdata2=$this->get_one_record($myq2);
			
			$total+=$packdata2[0]['total'];
		
		}
		
		return $total;

}




function totaldirect()
{

$myq1 = "SELECT * FROM Registration WHERE DirectID='".$this->userID."'";
		$packdata=$this->get_one_record($myq1);
		
		$total=0;
		
		foreach($packdata as $val)
		{
		
			$myq2 = "SELECT SUM(TotalAmount) as total FROM Commitment WHERE UserID='".$val['UserID']."' and OrDateTime like '".date('F')." %' and incomestatus='1'";
			$packdata2=$this->get_one_record($myq2);
			
			$total+=$packdata2[0]['total'];
		
		}
		
		return $total;

}

function getotaldownline($userid,$leg)
{

$result3=$this->mysqli2->query("select UserID from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	      
	   
  global $data;

 
       
       while($row3=$result3->fetch_assoc())
       {
     // print_r($row3);
	 
	 	$query2 = "SELECT SUM(TotalAmount) AS Amount FROM Commitment WHERE UserID = '".$row3['UserID']."' and OrDateTime like '".date('F')." %' and incomestatus='1'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 $row1=$result2->fetch_assoc();
	 	$row3['Amount']=$row1['Amount'];
       	$data[]=$row3;
		$this->getotaldownline($row3['UserID'],"Left");
		$this->getotaldownline($row3['UserID'],"Right");	   
      }
  	
	return $data;

}








function getotaldownline2($userid,$leg)
{

$result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	      
	   
  global $data;

 
       
       while($row3=$result3->fetch_assoc())
       {
     // print_r($row3);
	 
	 	$query2 = "SELECT SUM(TotalAmount) AS Amount FROM Commitment WHERE UserID = '".$row3['UserID']."' and OrDateTime like 'January %' and incomestatus='1'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 $row1=$result2->fetch_assoc();
	 	$row3['Amount']=$row1['Amount'];
       	$data[]=$row3;
		$this->getotaldownline($row3['UserID'],"Left");
		$this->getotaldownline($row3['UserID'],"Right");	   
      }
  	
	return $data;

}




function genrate_pin($perurl)
{
 $pin=rand();


if($perurl>=20 && $perurl<=2000)
{$packid=1;}
if($perurl>=2001 && $perurl<=3000)
{$packid=2;}
if($perurl>=3001 && $perurl<=5000)
{$packid=3;}
	
		$myq1 = "SELECT * FROM packages WHERE packID='".$packid."'";
		$packdata=$this->get_one_record($myq1);
		$packdata=$packdata[0];
		$array=array("create_date"=>$this->today_date,"pin"=>$pin,"userID"=>$this->userID,"PackID"=>$packid,"Interest"=>$packdata['InterestRate'],"Days"=>$packdata['Days'],"Amount"=>$perurl);
		
		
		
		$this->insert_data("pin_info",$array);
		$lastid=$this->mysqli2->insert_id;
		
		
		
	
	return $lastid;


}

function resize_photo($photo,$savepath,$height,$width)
{

	$image = new image();

$image->load($photo);			           
$image->resize($width,$height);
$image->save($savepath); 

}		

function upload_process()
{

		$file = current($_FILES);
		
		if(empty($file)){return "";}

	$dir = "users/";
	$arr = array(

		'error' => $file['error'], 

		'file' => "{$dir}/{$file['name']}",

		'file_name' => $file['name'], 

		'size' => $file['size']

		);


	$photo=rand().strtolower($arr['file_name']);


	if($file['error'] == UPLOAD_ERR_OK)

	 {

		if(@move_uploaded_file($file['tmp_name'], $dir.$photo))
		{				
			$this->resize_photo($dir.$photo,$dir.$photo,200,200);	
			
			
				
			return $photo;			
		}	

	}

		
		return "";

	
	
	
}


function upload_payment($tarray)
{
	

	
	
	$tarray['Slip']=$this->upload_process();

if(empty($tarray['Slip'])){
	$this->flash="Please select slip !!";
	return false;
	}
	$tarray['UserID']=$this->userID;
	if($this->insert_data("paymentuploads",$tarray))
	{
		$this->flash = "Successfully Uploaded Your Payment Wait For Admin Approvel .[Success]";
	}else{ $this->flash = "Error While Uploading Payment . [Error!!]"; }


}


function profile_update($array,$profilepic)
{


$makequery=$this->make_query(array_filter($array));

if(!empty($_FILES['profilepic']['name']))
{
if(!empty($profilepic)){
@unlink($profilepic);}
$logo=$this->upload_process();
if(empty($array)){$makequery="profilepic='".$logo."'";}else{
$makequery.=",profilepic='".$logo."'";}
}

	$query = "update Registration set ".$makequery." where UserID='".$this->userID."'";




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
$array['PaymentDate']=$this->today_date;


	   if($this->insert_data("payments",$array))
        {        
     
    		  $this->flash = "Withdrawal Request is Successfully 
    		  d Wait for Admin Approvel.  [Thanks]";
        
        }
		else{
				$this->flash = "Error  .[Error]";
		}
}


function bank_update($array)
{

	$query = "update Registration set ".$this->make_query(array_filter($array))." where UserID='".$this->userID."'";




	   if($this->update_data($query))
        {        
     
    		  $this->flash = "Bank Information Updated Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while updating .[Error]";
		}

}

function change_password($array)
{
	$query4 = "SELECT * FROM Registration WHERE UserID = '".$this->userID."' and Password='".$array['oldpass']."'";
       
           
       $result4=$this->mysqli2->query($query4);
       $num=$result4->fetch_assoc();
	   if($num){

	$query="update Registration set Password='".$_POST['newpassword']."' where UserID='".$this->userID."'";
		   if($this->update_data($query))
        {        




     
    		  $this->flash = "Password Updated Successfully .  [Thanks]";
        
        }
		else{ 
				$this->flash = "Error while updating password . [Error]";
		}
	}else{
	
		$this->flash = "Error Old Password Is Wrong Try Again . [Error]";
	
	}
}


function change_password1($array)
{
	$query4 = "SELECT * FROM Registration WHERE UserID = '".$this->userID."' and TPassword='".$array['oldpass']."'";
       
           
       $result4=$this->mysqli2->query($query4);
       $num=$result4->fetch_assoc();
	   if($num){

	$query="update Registration set TPassword='".$_POST['newpassword']."' where UserID='".$this->userID."'";
		   if($this->update_data($query))
        {        
     
    		  $this->flash = "Password Updated Successfully .  [Thanks]";
        
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
       
       
	 	$query2 = "SELECT SUM(TotalAmount) AS Amount FROM Commitment WHERE UserID = '".$row3['UserID']."'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 $row1=$result2->fetch_assoc();
      	 if($row1['Amount']<=0)
      	 { $row3['Amount']=0; }else{
	 	$row3['Amount']=$row1['Amount']; }
	 	
	   
	   if($row3){
	   
	  $row3['img']="img/tree_black.png";
	   
	   if($row3['Amount']>0)
	  { $row3['img']="img/green.png"; } 
	   
	  }
	   
	 //  print_r($row3);
	   if(empty($row3['UserID'])){ $row3['UserID']=" "; $row3['img']="img/tree_black.png"; }
	   
	  $treeusers=$row3;
  	
	

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




function create_pin($array)
{

$num = $array['numbers'];
$packid = $array['packID'];

$data = $this->get_one_record("select * from packages where packID='".$packid."'");
$data = $data[0];


for($i=0;$i<$num;$i++){

$array1 = array("pin"=>rand(),"create_date"=>$this->today_date,"PackID"=>$packid,"userID"=>"admin","Interest"=>$data['InterestRate'],"Days"=>$data['Days']);
	   if($this->insert_data("pin_info",$array1))
        {        
     
    		  $this->flash = "New Pins Added Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while creating pins .[Error]";
		}
		
	}	
}



function transfer_pin($array)
{

$transferto = $array['userID'];
$numbers = $array['numbers'];
$currentuser = $this->userID;


if(empty($numbers))
{
	$this->flash = "Enter number of pins you want to transfer . [Error]";
	return false; 
}


if(empty($transferto))
{
	$this->flash = "Enter USERID . [Error]";
	return false; 
}

if($currentuser==$transferto)
{
	$this->flash = "You can't tranfer pins to yourself . [Error]";
	return false; 
}

$sql=$this->mysqli2->query("select * from Registration where userID='".$transferto."'"); 
      $rows = $this->mysqli2->affected_rows;  
	  
	  if(!$rows)
	  {
	  	$this->flash = "Invalid User ID . [Error]";
	return false;
	  }



  $sql=$this->mysqli2->query("select * from pin_info where userID='".$currentuser."' and status='un-used'"); 
      $rows = $this->mysqli2->affected_rows;  

if($rows<$numbers)
{
	$this->flash = "Insufficent Pins . Please check UN USED Pins. [Error]";
	return false;
}
	
	
	$tarray = array("senderID"=>$currentuser,"receiverID"=>$transferto,"senddate"=>$this->today_date,"no"=>$numbers);
//print_r($tarray);
	$myq="update pin_info set userID='".$transferto."' where userID='".$currentuser."' and status='un-used' LIMIT ".$numbers;
	
if($this->mysqli2->query($myq))
{

	if($this->insert_data("pin_transfer_info",$tarray))
	{
		$this->flash = "Successfully Transfer .[Success]";
	}else{ $this->flash = "Error While Transfering Pin . [Error!!]"; }

}	
else{ $this->flash = "Query Error  . [Error!!]"; }		


} 

/*
function transfer_pin($array)
{

$transferto = $array['userID'];
//$packID = $array['packID'];
$numbers = $array['transfer'];
$currentuser = $this->userID;






if(empty($numbers))
{
	$this->flash = "Please select pins you want to transfer . [Error]";
	return false; 
}


if(empty($transferto))
{
	$this->flash = "Enter USERID . [Error]";
	return false; 
}

if($currentuser==$transferto)
{
	$this->flash = "You can't tranfer pins to yourself . [Error]";
	return false; 
}

$sql=$this->mysqli2->query("select * from Registration where userID='".$transferto."'"); 
      $rows = $this->mysqli2->affected_rows;  
	  
	  if(!$rows)
	  {
	  	$this->flash = "Invalid User ID . [Error]";
	return false;
	  }



  $sql=$this->mysqli2->query("select * from pin_info where userID='".$currentuser."' and status='un-used'"); 
      $rows = $this->mysqli2->affected_rows;  

if($rows<count($numbers))
{
	$this->flash = "Insufficent Pins . Please check UN USED Pins. [Error]";
	return false;
}
	
	
	$tarray = array("senderID"=>$currentuser,"receiverID"=>$transferto,"senddate"=>$this->today_date,"no"=>count($numbers),"packID"=>$packID);
//print_r($tarray);


foreach($numbers as $val)
{
	 $myq="update pin_info set userID='".$transferto."' where pinID='$val'";
	
$this->mysqli2->query($myq);

}
	if($this->insert_data("pin_transfer_info",$tarray))
	{
		$this->flash = "Successfully Transfer .[Success]";
	}else{ $this->flash = "Error While Transfering Pin . [Error!!]"; }


}

*/


function delete_pin($id)
{
	if($this->mysqli2->query("delete from pin_info where packID='".$id."'"))
        {        
     
    		  $this->flash = "Pin Deleted Successfully .  [Thanks]";
        
        }
		else{
				$this->flash = "Error while Deleting Pin .[Error]";
		}
}






/**********************************************************

PIN FUNCTIONS END

**********************************************************/





	

	
	
/*	 function checkmemberstatus($id)
     {
        $sql=$this->mysqli2->query("select * from Registration where UserEmail='".$id."' and Status='Active'"); 
        return $this->mysqli2->affected_rows;       
     }*/
	
	
	
	/***************
	SENDING HTML EMAIL FUNCTION
	*******************/
	
	
	
	/*public function SendMail($subject,$receiver,$html)
	{

	
	
	}*/
	
	public function lostpassword($emailid)
	{
	
		$sql=$this->mysqli2->query("select * from Registration where UserID='".$emailid."'"); 
		$data=$this->mysqli2->affected_rows;
		if(empty($data)){ return ""; }
		
	
		return "ok";
		
        
	}
	
	
	 function checkmemberstatus2($id)
     {
        $sql=$this->mysqli2->query("select * from Registration where UserID='".$id."'"); 
        return $this->mysqli2->affected_rows;       
     }

function checkpin($userid,$pin)
     {
        $sql=$this->mysqli2->query("select * from pin_info where status='un-used' and pin='".$pin."'"); 
        return $this->mysqli2->affected_rows;    

   
     }
     
      function checkmemberstatus3($id)
     {
        $sql=$this->mysqli2->query("select * from Registration where MobileNo='".$id."'"); 
        $row=$this->mysqli2->affected_rows;
        
        if($row>=3){return 1; }else{ return 0; }
        
     }
     
     public function chainid($id,$leg)
	{
	
		 $result3=$this->mysqli2->query("select * from Registration where ChainID='".$id."' and Position='".$leg."'");  	      
	   
 
       
      $row3=$result3->fetch_assoc();
      
      if(!empty($row3))
       { $this->chainid($row3['UserID'],$leg);   }else{  $this->chainid=$id; }
  	
	

	}
	
	public function get_direct_valid($id)
	{
	
		$sql=$this->mysqli2->query("select * from Registration where UserID='".$id."' and EmailVerify='1'"); 
        	return $this->mysqli2->affected_rows;  
	
	}
	
	public function register_member($array)
	{
		  $msg='';
        
    //   print_r($array);
	 /* if(!$this->checkmemberstatus2($array['DirectID']))
	   {
	   $this->flash='SponserID/DirectID May Be In-Active or not Available';
	    return false;
	   }
	   

        
        if(empty($array['MobileNo']))
        {
        $this->flash='Enter Mobile Number !!';
        return false;
        }*/
    
    	    if($this->checkmemberstatus3($array['MobileNo']))
        {
        $this->flash='Mobile Already Used 3 Time !!';
        return false;
        }
      
        if($this->checkmemberstatus2($array['UserID']))
        {
        $this->flash='User ID  Already In Use !!';
        return false;
        }
        
// if($array['DirectID']==""){$array['DirectID']="admin";}
		$this->chainid="";
		 $this->chainid($array['DirectID'],$array['Position']);
		 $array['terms']="";
		 
		 $array['DirectName']="";
		 $array['ChainID']=$this->chainid;
		 
		 $i=$this->get_direct_valid($array['DirectID']);
		 if(empty($i)){ 
		 
		 $this->flash="Invalid Sponser ID Or Not Active";
		 return false;
		 }
       
     // $array['ChainID']=$this->chainId;
	  $array['RegistrationDate']=$this->today_date;
	  $array['EmailCode']=md5($array['UserID'].$array['RegistrationDate']);
	  
	  $array['EPassword']=$array['Password'];
	  $array['ETPassword']=$array['TPassword'];
     		
     		$array=array_filter($array);



        
        if($this->insert_data("Registration",$array))
        {
        
 $this->flash = "Registration Is Successfully Done . UserID :- ".$array['UserID']." and Password :- ".$array['Password']." [Thanks] . "; 
 
 

$message="Welcome Dear ".$array['FirstName']."\n"; 
		$message.="Thank you for choosing G Star Marketing.\n";
		$message.="User ID ".$array['UserID']."\n";
		$message.="Password ".$array['Password']."\n";
		$message.="www.gstarmarketing.co.in";
 

$this->send_sms($array['MobileNo'],$message);
        
        }
        
        
$this->gettotaltopids($array['UserID']);

	  foreach($this->insertmemberslist as $userid)
	  {
	      
	      $qarray=array();
	      $qarray['userid']=$array['UserID'];
	      $qarray['suserid']=$userid['userid'];
	      $qarray['position']=$userid['position'];
	      $this->insert_data("treestructuredata",array_filter($qarray));
	      
	      
	  }
        
        
        
	}
	
	
	
	
	
	
function send_sms($mobilenumber,$message)
     {
         
         $param['uname'] = "speedy"; 

$param['password'] = "abcdef"; 

$param['sender'] = "GSMKET"; 

$param['receiver'] = $mobilenumber; 

$param['route'] = "TA"; 

$param['msgtype'] = "1"; 

$param['sms']=$message;
 $parameters = http_build_query($param); 

$url="http://146.88.26.101/index.php/Bulksmsapi/httpapi"; 


$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch,CURLOPT_HEADER, false); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded')); 
curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters); 
$result = curl_exec($ch);
         
     }
	


	
	
	public function gettotaltopids($id)
	{
	    
	    $result=$this->mysqli2->query("select ChainID,Position from Registration where UserID='".$id."'");	
		
		if($fetch=$result->fetch_assoc())
		{
		
			 $this->insertmemberslist[]=array("userid"=>$fetch['ChainID'],"position"=>$fetch['Position']);
			$this->gettotaltopids($fetch['ChainID']);
			
		
		
		}
	
	    
	}
	
	public function usepin($packid,$topupid)
	{
	
		$data = $this->get_one_record("select * from pin_info where userID='".$this->userID."' and PackID='".$packid."' and status='un-used'");
if(!empty($data)){
$totalamount=$data[0]['Amount'];
$pin=$data[0]['pin'];
$array['Commitment']=rand();
$array['DateTime']=$this->today_date;
$array['PinID']=$pin;
$array['TotalAmount']=$totalamount;
$array['UserID']=$topupid;

//Add commitment

$this->insert_data("Commitment",$array);
$lastid=$this->mysqli2->insert_id;

$this->update_data("update pin_info set use_date='".$this->today_date."',OrderID='".$lastid."',status='used',useduserID='".$topupid."' where pinID='".$data[0]['pinID']."'");
return "ok";
}else{

$this->flash="Insufficent Pin Balance !! Please Contact Your Sponser For Pin !";
return "error";

}
	
	}
	
	
	public function update_points($helper,$direct,$useduserid)
	{
	
	$arry=explode(",", $helper);
	$count=count($arry);
	if(in_array($direct, $arry)){$count--;}
	 $perheadpoints=5/$count;
	
	
	
	
	foreach($arry as $helper)
	{
	
	if($direct!=$helper)
	{
		
	$data = $this->get_one_record("select totalpoints from Registration where UserID='".$helper."'");
	$totalhelper=$data[0]['totalpoints'];
	$totalhelper+=$perheadpoints;	
	$query = "update Registration set totalpoints='".$totalhelper."' where UserID='".$helper."'";
	$myd=array("UserID"=>$helper,"EntryDate"=>$this->today_date,"Type"=>"Help","Points"=>$perheadpoints,"UsedUserID"=>$useduserid);
	$this->insert_data("mypoints",$myd);

	  $this->update_data($query);
	  
	   
	
	}
	
	}
	
	
	$data2 = $this->get_one_record("select totalpoints as totalpoints from Registration where UserID='".$direct."'");
	$totaldirect=$data2[0]['totalpoints'];
	$totaldirect+=10;
	 $query1 = "update Registration set totalpoints='".$totaldirect."' where UserID='".$direct."'";
$myd1=array("UserID"=>$direct,"EntryDate"=>$this->today_date,"Points"=>"10","UsedUserID"=>$useduserid);

//print_r($myd1);

	$this->insert_data("mypoints",$myd1);

	   $this->update_data($query1);
	
	
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
     
       
        $query3 = "SELECT SUM(TotalAmount) AS Total FROM Commitment WHERE UserID = '".$row['UserID']."'"; 
	 
     
       $result3=$this->mysqli2->query($query3);
       $row2=$result3->fetch_assoc();
       
      
if($row['DirectID']==$this->userID)
{ $this->totaldirectsp++;

$this->directsp[]=$row['UserID'];
}
      
      $this->totalamount=$this->totalamount+$row2['Total'];
      $this->getTotalLeg($row['UserID'],'Left');
      $this->getTotalLeg($row['UserID'],'Right');
      }
   
    
}


public function getmemberlegdetail($userid,$leg)
{

  $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'"); 

 	         
  global $data;
  
 
       
       while($row3=$result3->fetch_assoc())
       {
     // print_r($row3);
	 
	 	$query2 = "SELECT SUM(dollarsamount) AS Amount FROM Commitment WHERE UserID like '".$row3['UserID']."' and incomestatus='1'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 $row1=$result2->fetch_assoc();


	 	$row3['Amount']=$row1['Amount'];

       	$data[]=$row3;

$this->userids[]=$row3['UserID'];

		$this->getmemberlegdetail($row3['UserID'],"Left");
		$this->getmemberlegdetail($row3['UserID'],"Right");	   
      }
  	
	return $data;

}



public function getmemberlegdetailnew($userid,$leg)
{

  $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'"); 

 	         
  global $data;
  
 
       
       while($row3=$result3->fetch_assoc())
       {
     
       	$data[]=$row3;

$this->userids[]=$row3['UserID'];

		$this->getmemberlegdetailnew($row3['UserID'],"Left");
		$this->getmemberlegdetailnew($row3['UserID'],"Right");	   
      }
  	
	return $data;

}





public function gettotalbusinessdashboard($userid,$leg)
{

  $result3=$this->mysqli2->query("select UserID from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	      
	   
 

 
       
       while($row3=$result3->fetch_assoc())
       {
	 
	 	$query2 = "SELECT * FROM Commitment WHERE UserID = '".$row3['UserID']."' and incomestatus='1'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 while($row1=$result2->fetch_assoc())
		 {
		 $date=date('d-m-Y',strtotime($row1['OrDateTime']));
		 if(array_key_exists($date,$this->data))
			  {
					$this->data[$date]+=$row1['TotalAmount'];
			  }
			else
			  {
			  	$this->daterecord[]=$date;
					 $this->data[$date]=$row1['TotalAmount'];
			  }
	     }		
		
		$this->gettotalbusinessdashboard($row3['UserID'],"Left");
		$this->gettotalbusinessdashboard($row3['UserID'],"Right");	   
      }
  	
	return $this->data;

}




public function gettotalbusiness($userid,$leg)
{

  $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	      
	   
 

 
       
       while($row3=$result3->fetch_assoc())
       {
	 
	 	$query2 = "SELECT * FROM Commitment WHERE UserID = '".$row3['UserID']."' and incomestatus='1'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 while($row1=$result2->fetch_assoc())
		 {
		 $date=date('d-m-Y',strtotime($row1['OrDateTime']));
		 if(array_key_exists($date,$this->data))
			  {
					$this->data[$date]+=1;
			  }
			else
			  {
			  	$this->daterecord[]=$date;
					 $this->data[$date]=1;
			  }
	     }		
		
		$this->gettotalbusiness($row3['UserID'],"Left");
		$this->gettotalbusiness($row3['UserID'],"Right");	   
      }
  	
	return $this->data;

}




public function gettotalbtcbusiness($userid,$leg)
{

  $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	      
	   
 

 
       
       while($row3=$result3->fetch_assoc())
       {
	 
	 	$query2 = "SELECT * FROM Commitment WHERE UserID = '".$row3['UserID']."' and incomestatus='1'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 while($row1=$result2->fetch_assoc())
		 {
		 $date=date('d-m-Y',strtotime($row1['OrDateTime']));
		 if(array_key_exists($date,$this->data))
			  {
					$this->data[$date]+=$row1['TotalAmount'];
			  }
			else
			  {
			  	$this->daterecord[]=$date;
					 $this->data[$date]=$row1['TotalAmount'];
			  }
	     }		
		
		$this->gettotalbtcbusiness($row3['UserID'],"Left");
		$this->gettotalbtcbusiness($row3['UserID'],"Right");	   
      }
  	
	return $this->data;

}


/*********************************************
TOTAL BINERY AND DIRECT INCOME
*********************************************/

public function get_paid_total($userid,$type)
{

	 $query2 = "SELECT SUM(TotalAmount) as Total1 FROM  payments WHERE UserID='".$userid."' and PaymentType='".$type."'"; 
     
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
      	//print_r($row1);
		
		$total=$total+$row1['Total'];
		
		$this->gettotalbinerybusiness($row3['UserID'],"Left");
		$this->gettotalbinerybusiness($row3['UserID'],"Right");	   
      }
  	
	
}



public function direct_business($userid)
{
 $q="select * from Registration  where DirectID='".$userid."'";
  $result3=$this->mysqli2->query($q);  	      
	   
  global $total;
 
       
       while($row3=$result3->fetch_assoc())
       {
	 
	 	$query2 = "SELECT SUM(TotalAmount) as Total FROM Commitment WHERE UserID = '".$row3['UserID']."'"; 

     
      	 $result2=$this->mysqli2->query($query2);
      	$row1=$result2->fetch_assoc();
      	
		
		$total=$total+$row1['Total'];
		   
      }
  	
	
}

public function getbinaryincomelatest($userid)
{

$query="select SUM(binaryamount) as total from binaryhistory where userid='".$userid."'";

 $result2=$this->mysqli2->query($query);
      	$row1=$result2->fetch_assoc();		
		return $row1['total'];

}

public function getbinaryincome($userid)
{
global $cappingwithtime;

$this->data=array();
$this->daterecord=array();
$left = $this->gettotalbusiness($userid,"Left");

$leftdates = $this->daterecord;



$this->data=array();
$this->daterecord=array();
$right = $this->gettotalbusiness($userid,"Right");

$rightdates = $this->daterecord;


$totaldates1 = array_merge($rightdates,$leftdates);


//print_r($totaldates1);

$totaldates=array_unique($totaldates1);
$sequence=array();

foreach($totaldates as $dd1)
{

$sequence[]=strtotime($dd1);

}
sort($sequence);

$totaldates=array();
foreach($sequence as $vv)
{
$totaldates[]=date('d-m-Y',$vv);
}


					$leftcarry=0;
											$rightcarry=0;
											
											$totalam=0;
											
											
											
											//print_r($totaldates);
											
											foreach($totaldates as $dates)
											{
											$leftshow=0;
											if(!empty($left[$dates])){$leftshow=$left[$dates];}
											$rightshow=0;
											if(!empty($right[$dates])){$rightshow=$right[$dates];}
											
											//echo $leftcarry;
											
		 $leftcarry+=$leftshow;
		 $rightcarry+=$rightshow;
		 
		 
		/* echo "<pre>";
		 echo $leftcarry."-".$rightcarry;
		 
		 
		 echo "</pre>";*/
		 
						
								if($leftcarry>$rightcarry){
								 $matching = $leftcarry-$rightcarry;
								 $matching1 = $leftcarry-$matching;
								
									if($leftcarry>=$matching1){  $leftcarry=$leftcarry-$matching1; $rightcarry=0; }else{$leftcarry=0; }
									
									//echo $leftcarry;
								}else{
								
									 $matching = $rightcarry-$leftcarry;
									 $matching1 = $rightcarry-$matching;
				
										if($rightcarry>=$matching1){ $rightcarry=$rightcarry-$matching1;  $leftcarry=0;}else{ $rightcarry=0; }
											
											
								}				
											
											
											
											
											$matchingamount=$matching1*10/100;
											
										
											//echo $capping;
											
											//print_r($cappingwithtime);
											
											foreach($cappingwithtime as $key=>$val)
											{
											
											 $current=strtotime($dates);											 
											//echo $key;
											if($key<=$current)
											{$capping=$val; break;}
											
											
											}
											
											//echo $capping;
											$capping1 = $matchingamount-$capping; 
											
											
											
											
							if($capping1<=0){ 
										
							$capping1 = 0;					
					}else{
					$matchingamount=$capping;
					}				
					
						//echo "Date - ".$dates."left - ".$leftshow." right - ".$rightshow." leftcarry - ".$leftcarry." rightcarry - ".$rightcarry." matching - ".$matchingamount."<br>";
$totalam+=$matchingamount;
											}

return $totalam;
}







public function getbinaryincomenew($userid)
{
global $cappingwithtime;

$this->data=array();
$this->daterecord=array();
$left = $this->gettotalbusiness($userid,"Left");

$leftdates = $this->daterecord;



$this->data=array();
$this->daterecord=array();
$right = $this->gettotalbusiness($userid,"Right");

$rightdates = $this->daterecord;


$totaldates1 = array_merge($rightdates,$leftdates);


//print_r($totaldates1);

$totaldates=array_unique($totaldates1);
$sequence=array();

foreach($totaldates as $dd1)
{



if(strtotime($dd1)<=strtotime("January 31, 2017"))
{
$sequence[]=strtotime($dd1);
}


}
sort($sequence);

$totaldates=array();
foreach($sequence as $vv)
{
$totaldates[]=date('d-m-Y',$vv);
}


					$leftcarry=0;
											$rightcarry=0;
											
											$totalam=0;
											
											
											
											//print_r($totaldates);
											
											foreach($totaldates as $dates)
											{
											$leftshow=0;
											if(!empty($left[$dates])){$leftshow=$left[$dates];}
											$rightshow=0;
											if(!empty($right[$dates])){$rightshow=$right[$dates];}
											
											//echo $leftcarry;
											
		 $leftcarry+=$leftshow;
		 $rightcarry+=$rightshow;
		 
		 
		/* echo "<pre>";
		 echo $leftcarry."-".$rightcarry;
		 
		 
		 echo "</pre>";*/
		 
						
								if($leftcarry>$rightcarry){
								 $matching = $leftcarry-$rightcarry;
								 $matching1 = $leftcarry-$matching;
								
									if($leftcarry>=$matching1){  $leftcarry=$leftcarry-$matching1; $rightcarry=0; }else{$leftcarry=0; }
									
									//echo $leftcarry;
								}else{
								
									 $matching = $rightcarry-$leftcarry;
									 $matching1 = $rightcarry-$matching;
				
										if($rightcarry>=$matching1){ $rightcarry=$rightcarry-$matching1;  $leftcarry=0;}else{ $rightcarry=0; }
											
											
								}				
											
											
											
											
											$matchingamount=$matching1*10/100;
											
										
											//echo $capping;
											
											//print_r($cappingwithtime);
											
											foreach($cappingwithtime as $key=>$val)
											{
											
											 $current=strtotime($dates);											 
											//echo $key;
											if($key<=$current)
											{$capping=$val; break;}
											
											
											}
											
											//echo $capping;
											$capping1 = $matchingamount-$capping; 
											
											
											
											
							if($capping1<=0){ 
										
							$capping1 = 0;					
					}else{
					$matchingamount=$capping;
					}				
					
		//echo "Date - ".$dates."left - ".$leftshow." right - ".$rightshow." leftcarry - ".$leftcarry." rightcarry - ".$rightcarry." matching - ".$matchingamount."<br>";
$totalam+=$matchingamount;
											}

return $totalam;
}







public function getdirectincome($userid)
{


$data = $this->get_one_record("select * from Registration where DirectID='".$userid."'");
													foreach($data as $val)
													{
														$query2 = "SELECT SUM(dollarsamount) AS Amount FROM Commitment WHERE UserID = '".$val['UserID']."' and incomestatus='1'"; 				 
														 $row1=$this->get_one_record($query2);
														 $row1=$row1[0];
														 if(!empty($row1['Amount'])){ $val['amount']=$row1['Amount']; }else{ $val['amount']=0; }
														 
														 $myamount=$val['amount']/$this->referal_percent;
														
$closing+=$myamount;												



}

return $closing;

}

public function getlevelincome($userid)
{


return 0;

}

public function getbidincome($getuserid)
{

$totalprofit=0;
$harmanj=1;
											
											$data = $this->get_one_record("select * from Commitment where userID='".$getuserid."' and CommitmentStatus='Active'");
											
											
											
											
											foreach($data as $val)
											{
											
											
											
												$data2 = $this->get_one_record("select * from packages where amount='".$val['TotalAmount']."'");
												
												
												
												//echo $data2[0]['Interest'];
												
											
											 
											 
												
												
											$leftdays=0;
											$leftdays1=0;
												error_reporting(false);
												$totaldays=$data2[0]['Days'];
												$nowdays=$days;
												$ddd=$val['DateTime'];

//if($counter==1){ $ddd=$val['OrDateTime']; }

		$dailygrowth = $this->get_one_record("select * from dailygrowth where userID='".$getuserid."' and TimeStr>='".strtotime($ddd)."'");
												
												$i=0;
											//	$harmanj=0;
												foreach($dailygrowth as $val2)
												{
												
											
												$mydays=0;
												
												$amount=$val2['CaptchaCode']*$val['TotalAmount'];
												
												 $profit=$amount*$data2[0]['InterestRate']/100;
												
												$date1=date('Y-m-d',strtotime($val['DateTime']));
												$date2=date('Y-m-d',strtotime($val2['DateTime']));
												
												 $mydays = $this->calculateDiffrence2($date1,$date2);
												 
												 	$i=$mydays;	
									
							//		$i++;			
												
			$leftdays1=$i;
			$leftdays=$totaldays-$leftdays1;
			
			
			
												
												$date=$val2['DateTime'];
												
												 $abc=$days-$i;
												 
												 if($leftdays<=0 && $harmanj<$totaldays){ $leftdays=$totaldays-$harmanj; }
												 
										//		 echo $leftdays;

if($leftdays>0){

	$harmanj++;

$totalprofit+=number_format($profit, 2, '.', '');
												
										
												
												}
												
												
												}
												
												

}

return $totalprofit;

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




$cappingwithtime=array();




function get_capping($packid)
											{
											
											global $obj;
											global $cappingwithtime;
											$data2 = $obj->get_one_record("SELECT * FROM packages order by Capping DESC");
											/*echo "<pre>";
												print_r($data2);
												echo "</pre>"; */
												$capping=array();
												$timearray=array();
												
												
												
											foreach($data2 as $val)
											{
											
												if(array_key_exists($val['packID'],$packid))
												{
												$id=$packid[$val['packID']];
												if(!in_array($id,$timearray)){
												$timearray[]=$id;
													$capping[$val['packID']]=$val['Capping'];
													$cappingwithtime[$id]=$val['Capping'];
													}
													
													//echo $val['Capping'];
												}
											
											}
											
											
												return $capping;
											
											}
											
											





											$data = $obj->get_one_record("SELECT DISTINCT TotalAmount,DateTime FROM Commitment WHERE UserID='".$obj->userID."' order by CommitID DESC");
											
											$packarray=array();
											
											foreach($data as $val)
											{
											
											
												$d1=$obj->get_one_record("select packID from packages where amount='".$val['TotalAmount']."'");

												$packarray[$d1[0]['packID']]=strtotime(date('F j, Y',strtotime($val['OrDateTime'])));

											}


											
											/*$data = $obj->get_one_record("SELECT DISTINCT packID,use_date FROM pin_info WHERE useduserID='".$obj->userID."'");
											
											$packarray=array();
											foreach($data as $val)
											{
											//echo $val['create_date'].":-".$val['packID'];
											  
												$packarray[$val['packID']]=strtotime(date('Y-m-d',strtotime($val['use_date'])));
											}
											//print_r($packarray);
											*/
											
											$cappingdone = get_capping($packarray);
											
										//print_r($cappingdone);
											foreach($cappingdone as $val)
											{
											$capping=$val;
											break;
											}
											


?>