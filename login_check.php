<?php
include("package/Memberclass.php");

if(!empty($_SESSION['User_Array'])){ echo '<meta http-equiv="refresh" content="1; url=dashboard.php" />'; exit(); }




if(isset($_POST['signin']))
{



$data = $obj->login($_POST['UserID'],$_POST['Password']);
if(empty($data))
{

$obj->flash="Invalid Login Details !!";

}else{


$_SESSION['User_Array'] = $data;

$obj->flash="Successfully Loged In Wait For Redirection ..";

echo '<meta http-equiv="refresh" content="0; url=dashboard.php" />';




}

}

//$obj->flash.="Sever is under maintenance please cooperate with us. Thanks ";



?>