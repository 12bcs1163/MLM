<?php
include("../package/Memberclass.php");
$amount=$_GET['amount'];

  

if($amount>=20 && $amount<=2000)
{
$query="select * from packages where packID='1'";
}

if($amount>=2001 && $amount<=3000)
{
$query="select * from packages where packID='2'";
}

if($amount>=3001 && $amount<=5000)
{
$query="select * from packages where packID='3'";
}


$data = $obj->get_one_record($query);
echo "<table border='1' width='100%'><tr>
<th>PACKAGE</th><th>INTEREST</th><th>DAYS</th></tr>
<tr><td>".$data[0]['name']."</td><td>".$data[0]['InterestRate']." %</td><td>".$data[0]['Days']."</td></tr>
</table>";

?>