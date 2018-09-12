<?php
@session_start();
error_reporting(0);
class Member
{
	public function __construct()
	{
date_default_timezone_set('Asia/Kuala_Lumpur');
	     	$this->mysqli2 = new mysqli('localhost', 'root', '', 'gstarmar_mlm');		
	    	$this->userID = $_SESSION['user_array']['UserID'];
$this->userauto=$_SESSION['user_array']['Id'];
	    	if (mysqli_connect_errno()) {
			    printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			}	
$this->joiningdate=$_SESSION['user_array']['RegistrationDate'];		
			$this->node_array=array();
			$this->today_date=date("F j, Y, g:i a");	
$this->today_date_only=date("F j, Y");		
			$this->referal_percent="10";
			$this->binery_percent="10";					
	}


function loaduserinfo()
{
	$query4 = "SELECT * FROM Registration WHERE UserID = '".$this->userID."'";          
       $result4=$this->mysqli2->query($query4);
       $num=$result4->fetch_assoc();	   
	   return $num;
}


function upload_process()
{

		$file = current($_FILES);
		
		if(empty($file)){return "";}

	$dir = "slip/";
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
	$tarray['UserID']=$this->userID;
	$tarray['Slip']=$this->upload_process();
	if($this->insert_data("paymentuploads",$tarray))
	{
		$this->flash = "Successfully Uploaded Your Payment Wait For Admin Approvel .[Success]";
	}else{ $this->flash = "Error While Uploading Payment . [Error!!]"; }


}



function create_ticket($tarray)
{
	$tarray['UserID']=$this->userID;
	$tarray['Slip']=$this->upload_process();
$tarray['TokenNo']=rand(1000,100000);
$tarray['SendDate']=$this->today_date;


	if($this->insert_data("helpdesk",$tarray))
	{
		$this->flash = "Successfully created your ticket your token Number is :- ".$tarray['TokenNo']." .[Success]";
	}else{ $this->flash = "Error . [Error!!]"; }


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

/*

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
*/

//end getting business
	   
	   
	   
	   
	   $return=array("JoiningDate"=>$row3['RegistrationDate'],"UserID"=>$row3['UserID'],"FirstName"=>$row3['FirstName'],"DirectID"=>$row3['DirectID'],"DirectName"=>$directname,"totalleft"=>$left,"totalright"=>$right,"totalleftb"=>"$".$totalbusiness,"totalrightb"=>"$".$totalbusinessr);
	   
	   return $return;
	   
}



public function load_total($userid,$leg)
{

	  $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	
       
       $row3=$result3->fetch_assoc();
	   
	   if($row3){  
	   $this->load_total($row3['UserID'],"Left");
	    $this->load_total($row3['UserID'],"Right");

//if($row3['PaidStatus']=="Paid"){
	   $this->totalmem++;	} //}
	

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



function profile_update($array)
{

	$query = "update Registration set ".$this->make_query(array_filter($array))." where UserID='".$this->userID."'";




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
     
    		  $this->flash = "Withdrawal Request is Successfully Genrated Wait for Admin Approvel.  [Thanks]";
        
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


public function load_tree($userid,$leg="")
{
/*	global $treeusers;
//	global $level;
if(empty($leg)){
 $result3=$this->mysqli2->query("select * from Registration  where UserID='".$userid."'");
}else{
	  $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	
       }
       $row3=$result3->fetch_assoc();
	   
	   if($row3){
	   $row3['img']="img/y.png";


 $result3331=$this->mysqli2->query("select * from Registration  where DirectID='".$row3['UserID']."' and Position='Left' limit 0,1");
$result333=$result3331->fetch_assoc();

$result33331=$this->mysqli2->query("select * from Registration  where DirectID='".$row3['UserID']."' and Position='Right' limit 0,1");

$result3333=$result33331->fetch_assoc();

if(!empty($result3333) && !empty($result333))
{
$row3['img']="img/p.png";
}





	   }
	 //  print_r($row3);

	   if(empty($row3)){ $row3['UserID']=" "; $row3['img']="img/c.png"; }
	   
	  $treeusers=$row3;
  */
  
  
	global $treeusers;
//	global $level;
if(empty($leg)){
 $result3=$this->mysqli2->query("select FirstName,UserID,DirectID from Registration  where UserID='".$userid."'");
}else{
	  $result3=$this->mysqli2->query("select FirstName,UserID,DirectID from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	
       }
       $row3=$result3->fetch_assoc();
       
	 	$query2 = "SELECT SUM(TotalAmount) AS Amount FROM Commitment WHERE UserID = '".$row3['UserID']."'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 $row1=$result2->fetch_assoc();
      	 if($row1['Amount']<=0)
      	 { $row3['Amount']=0; }else{
	 	$row3['Amount']=$row1['Amount']; }
	 	
	   
	   if($row3){
	   
	  $row3['img']="img/joining.jpg";
	   
	   if($row3['Amount']>0)
	  { $row3['img']="img/slot1.jpg"; } 
	   
 if($row3['Amount']>=1)
	  { $row3['img']="img/slot2.jpg"; } 
	   
 if($row3['Amount']>=5)
	  { $row3['img']="img/slot3.jpg"; } 
	   
 if($row3['Amount']>=15)
	  { $row3['img']="img/slot4.jpg"; } 
	  
	  	   
 if($row3['Amount']>=30)
	  { $row3['img']="img/slot5.jpg"; } 
	  
	  }
	   
	 //  print_r($row3);
	   if(empty($row3['UserID'])){ $row3['UserID']=" "; $row3['img']="img/c.png"; }
	   
	  $treeusers=$row3;
  	
	

	

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



function old_check_current_income()
{

$returnarray=array();
//TOTAL CREDITS

$mybonus1 = "SELECT SUM(TotalAmount) as Total FROM oldpayments WHERE UserID='".$this->userID."' and TranType='1' and PaymentMode='Infinity Balance'";
		$mbonus1=$this->get_one_record($mybonus1);
		
		$credit=$mbonus1[0]['Total'];
		

//END TOTAL CREDITS

//Total widthdrawal
$mybonusw = "SELECT SUM(TotalAmount) as Total FROM oldpayments WHERE UserID='".$this->userID."' and PaymentMode='Fund' and TranType='0'";
		$mbonusw=$this->get_one_record($mybonusw);
		
		$width=$mbonusw[0]['Total'];
		


$returnarray['CURRENTBALANCE']=$credit-$width;

	return $returnarray;

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

$array1 = array("pin"=>rand(),"create_date"=>$this->today_date,"PackID"=>$packid,"userID"=>"admin","Interest"=>$data['InterestRate'],"Days"=>$data['Days'],"Amount"=>$array['amount']);
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
$packID = $array['packID'];
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



  $sql=$this->mysqli2->query("select * from pin_info where userID='".$currentuser."' and status='un-used' and packID='".$packID."'"); 
      $rows = $this->mysqli2->affected_rows;  

if($rows<$numbers)
{
	$this->flash = "Insufficent Pins . Please check UN USED Pins. [Error]";
	return false;
}
	
	
	$tarray = array("senderID"=>$currentuser,"receiverID"=>$transferto,"senddate"=>$this->today_date,"no"=>$numbers,"packID"=>$packID);
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





	
	
	 function getChainID($auto,$node)
	{
		
		$result=$this->mysqli2->query("select * from Registration where Position='".$node."' and ChainID='".$auto."'");	
		
		if($fetch=$result->fetch_assoc())
		{
			
			 $memberID=$fetch['UserID'];
		//	 $this->insertmemberslist[]=$memberID;
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
	
	
	
	public function SendMail($subject,$receiver,$html)
	{


$to = $receiver;
$from = "admin@tradecoinworld.com";
//$subject = "My Email";

$body = $html;

if (@mail($to, $subject, $body,
    "From: " . $from . "\n" .
    "MIME-Version: 1.0\n" .
    "Content-Type: multipart/alternative;\n" .
    "     boundary=" . $mime_boundary_header))
    echo "Email sent successfully.";
else
    echo "Email NOT sent successfully!";
	
	}
	
	
	 function checkmemberstatus2($id)
     {
        $sql=$this->mysqli2->query("select * from Registration where UserID='".$id."'"); 
        return $this->mysqli2->affected_rows;       
     }
	
	public function register_member($array)
	{
		  $msg='';
		  
		  $this->insertmemberslist=array();
        
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
	  $array['PaidStatus']="Paid";
	  
	  
	  //Expiring pin
$data = $this->get_one_record("select * from pin_info where userID='".$this->userID."' and PackID='".$array['packID']."' and status='un-used'");
if(empty($data)){ $this->flash="Please purchase pins from admin !!"; return false; }
$commitarray=array();
$totalamount=$data[0]['Amount'];
$pin=$data[0]['pin'];
$commitarray['Commitment']=rand();
$commitarray['DateTime']=$this->today_date;
$commitarray['PinID']=$pin;
$commitarray['TotalAmount']=$totalamount;
$commitarray['UserID']=$array['UserID'];
//Add commitment
$this->insert_data("Commitment",$commitarray);
$lastid=$this->mysqli2->insert_id;
$retun=$this->update_data("update pin_info set timeinstringuse='".strtotime($this->today_date_only)."',use_date='".$this->today_date."',OrderID='".$lastid."',status='used',useduserID='".$array['UserID']."' where pinID='".$data[0]['pinID']."'");
//$array['packID']="";
//$array['pv']=$data[0]['Interest'];
  // print_r($array);
        if($this->insert_data("Registration",array_filter($array)))
        {           
        $this->flash = "Registration Is Successfully Done . UserID :- ".$array['UserID']." and Password :- ".$array['Password']." [Thanks] . ";        
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
	
	
	
	public function gettotaltopids($id)
	{
	    
	    $result=$this->mysqli2->query("select ChainID,Position from Registration where UserID='".$id."'");	
		
		if($fetch=$result->fetch_assoc())
		{
		
			 $this->insertmemberslist[]=array("userid"=>$fetch['ChainID'],"position"=>$fetch['Position']);
			$this->gettotaltopids($fetch['ChainID']);
			
		
		
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
/*
  $result3=$this->mysqli2->query("select FirstName,LastName,RegistrationDate,UserID from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	      
	   
  global $data;

 
       
       while($row3=$result3->fetch_assoc())
       {
     // print_r($row3);
	 
	 	$query2 = "SELECT SUM(TotalAmount) AS Amount FROM Commitment WHERE UserID = '".$row3['UserID']."'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 $row1=$result2->fetch_assoc();
	 	$row3['Amount']=$row1['Amount'];
if(isset($_POST['datesearch']))
{


$from=strtotime($_POST['datesearchfrom']);
$to=strtotime($_POST['datesearchto']);

if($row3['timeinstring']>=$from && $row3['timeinstring']<=$to){
       	$data[]=$row3;
}
}else{
$data[]=$row3;
}
	//	$this->getmemberlegdetail($row3['UserID'],"Left");
	//	$this->getmemberlegdetail($row3['UserID'],"Right");	   
      }
  */
  
  
  $result3=$this->mysqli2->query("select u.FirstName,u.LastName,u.RegistrationDate,u.UserID from treestructuredata as t join Registration as u on t.userid=u.UserID  where t.suserid='".$userid."' and t.position='".$leg."'");  	      
	   
  global $data;

 
       
       while($row3=$result3->fetch_assoc())
       { 
           
        $data[]=$row3;   
           
       }
      // print_r($data);
  
	return $data;

}







public function gettotalbusiness($userid,$leg)
{

 // $result3=$this->mysqli2->query("select * from Registration  where ChainID='".$userid."' and Position='".$leg."'");  	      
	   
  $result3=$this->mysqli2->query("select u.FirstName,u.LastName,u.RegistrationDate,u.UserID from treestructuredata as t join Registration as u on t.userid=u.UserID  where t.suserid='".$userid."' and t.position='".$leg."'");  	      
	   


 
       
       while($row3=$result3->fetch_assoc())
       { 
           
         	$query2 = "SELECT * FROM Commitment WHERE UserID = '".$row3['UserID']."' and incomestatus='1'"; 
     
      	 $result2=$this->mysqli2->query($query2);
      	 while($row1=$result2->fetch_assoc())
		 {
		 $date=date('d-m-Y',strtotime($row1['OrDateTime']));
		 if(array_key_exists($date,$this->data))
			  {
					$this->data[$date]+=$row1['dollarsamount'];
			  }
			else
			  {
			  	$this->daterecord[]=$date;
					 $this->data[$date]=$row1['dollarsamount'];
			  }
	     }		
           
       }
  
  	
	return $this->data;

}




/*


public function getlevelbusiness($userid,$leg)
{

echo $query="select u.FirstName,u.LastName,u.RegistrationDate,u.UserID from treestructuredata as t join Registration as u on t.userid=u.UserID  where t.suserid='".$userid."' and t.position='".$leg."'";	   
  $result3=$this->mysqli2->query($query);  	      
	   
$totalrightworking=0
       while($row3=$result3->fetch_assoc())
       { 
           
         	$query2 = "SELECT SUM(TotalAmount) as total FROM Commitment WHERE UserID = '".$row3['UserID']."' and incomestatus='1'"; 
     
      	    $result2=$this->mysqli2->query($query2);
      	    $totalrightworking+=$result2[0]['total'];  
       }
  
  	
	return $totalrightworking;

}

*/


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