<?php

//exit();
 //Connect to Database

 $db=mysql_connect("localhost","alkensma_lenahai","harman!@#");
 mysql_select_db("alkensma_lenahai",$db) or die("conn error");
 

$query = "SELECT rewards.userID,rewards.rewardLevel,rewards.reward_date,Registration.FirstName,Registration.MobileNo,Registration.RegistrationDate,Registration.DirectID
FROM rewards
INNER JOIN Registration
ON rewards.userID=Registration.UserID where rewards.status='".$_GET['type']."' and rewards.rewardLevel='".$_GET['reward']."' and rewards.timeinnumber>='".strtotime($_GET['from'])."' and rewards.timeinnumber<='".strtotime($_GET['to'])."'";
//$query = "SELECT * FROM rewards_info where rewardStatus='pending' and rewardLevel='1'";
$header = '';
$data ='';

$filename = "Lifetimerewards-".$_GET['type'].$_GET['reward'];
 
$export = mysql_query($query) or die(mysqli_error($con));


// extract the field names for header 

$myarray=array("USER ID","REWARD","DATE","USER NAME","CONTACT NUMBER","JOINING DATE","SPONSER BY");




 
foreach($myarray as $key=>$val)
{
	$header.= $val."\t";
}
 
// export data 
while( $row = mysql_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );
 
if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}
 
// allow exported file to download forcefully
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";


 
?>