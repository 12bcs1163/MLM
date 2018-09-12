<?php
include("../package/Memberclass.php");
$amount=$_POST['amount']; 

if(!empty($amount))
{
$arr=array("DateTime"=>$obj->today_date_only,"TimeStr"=>strtotime($obj->today_date_only),"userID"=>$obj->userID,"CaptchaCode"=>rand());
$query=$obj->insert_data("dailygrowth",$arr);
}

echo "done";
?>