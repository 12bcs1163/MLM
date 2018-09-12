<?php
session_start();



if(empty($_SESSION['user_array']) || $_SESSION['user_array']['UserID']!="admin"){

header("location: index.php");
die;

}
include("Mysqli/Memberclass.php");

echo "<pre>";

$data = $obj->get_one_record("select UserID from Registration where princepoolstatus!='1' and silverpoolstatus='1' order by Id DESC");

foreach($data as $val)
{
    
    
    $dd=$obj->get_one_record("select COUNT(*) as total from Registration where DirectID='".$val['UserID']."' and silverpoolstatus='1'");
    
    $total=0;
    $total=$dd[0]['total'];
    
    if($total>=3)
    {
        
        $obj->mysqli2->query("update Registration set princepoolstatus='1' where UserID='".$val['UserID']."'");
        
        echo "<br>--------------------------------------</br>";
        echo $val['UserID']." Achieved Prince Pool";
        echo "<br>--------------------------------------</br>";
    }
    
    
}


?>