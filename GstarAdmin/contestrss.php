<?php
error_reporting(0);
include("Mysqli/Memberclass.php");
										$sno=1;
											$data = $obj->get_one_record("select * from admincontest order by uniqueid DESC");
											$jdata=json_encode(array_values($data));

echo $jdata;

?>