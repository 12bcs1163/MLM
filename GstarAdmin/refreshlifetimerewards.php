<?php
session_start();

if(empty($_SESSION['user_array']) || $_SESSION['user_array']['UserID']!="admin"){

header("location: index.php");
die;

}


include("Mysqli/Memberclass.php");


$sno=1;
//Setting Function


$qu="SELECT UserID FROM Registration order by Id DESC";

$packinfo=$obj->get_one_record($qu);


echo "<table border='1' width='100%' >";

foreach($packinfo as $myuserval){
$obj->userID="";
$obj->userID=$myuserval['UserID'];
$myuserid=$myuserval['UserID'];
$userid=$myuserid;

$left = $obj->getmemberlegdetail1($myuserid,"Left");
if(empty($left)){$left=array();}
$data="";
$legdata=array();

$right = $obj->getmemberlegdetail1($myuserid,"Right");
if(empty($right)){$right=array();}


$totalpaidleft=0;
											$totalinvestleft=0;
											$totalunpaidleft=0;
											foreach($left as $data){
											
											if(!empty($data['Amount']))
											{
											$totalpaidleft+=1;
											}
											
											}
											
											$totalpaidright=0;
											
											foreach($right as $data){
											
											if(!empty($data['Amount']))
											{
											$totalpaidright+=1;
											}
										
											
												}
												$totall=$totalpaidleft;
												$totalr=$totalpaidright;


echo "<tr><td colspan='2'><h2 align='center'>".$userid."</h2></td><td>Total Left:- ".$totall."</td><td>Total Right:- ".$totalr."</td></tr>";


if($totalflag>0 && empty($error)){

					

	$array=array(
						array("sales"=>50,"img"=>"TEAM CO-ORDINATOR","cash"=>"25000 or branded led"),
						array("sales"=>150,"img"=>"SALES OFFICER","cash"=>"I Phone + Domestic Trip"),
						array("sales"=>300,"img"=>"ASST. MARKETING OFFICER","cash"=>"International Trip + Alto k10"),
						array("sales"=>600,"img"=>"MARKETING OFFICER","cash"=>"Brand New Swift Desire"),
						array("sales"=>1200,"img"=>"SENIOR MARKETING OFFICER","cash"=>"Brand New Maruti Brezza"),
						array("sales"=>2400,"img"=>"ASST. MANAGER","cash"=>"Mahindra xuv 500 or 18 Lac"),
						array("sales"=>4800,"img"=>"MANAGER","cash"=>"Toyota Fortuner or 30 Lac"),
						array("sales"=>7000,"img"=>"ASST. MARKETING DIRECTOR","cash"=>"Get Rs. 60 Lac  or Well Furnished House"),
						array("sales"=>10000,"img"=>"MARKETING DIRECTOR","cash"=>"Get Rs. 1 Cr   or  ( MDT + 1 % Extra benefits )")
						);
						
						
						
$totalmem=0;
						foreach($array as $val)
						{
						
						$totalmem+=$val['sales'];
						
						
						if($totall>=$totalmem && $totalr>=$totalmem){$status="<button class='btn btn-success'> Achived </button>";
			
$sdata=$obj->get_one_record("select * from rewards where userID='$userid' and rewardlevel='$sno'");
if(empty($sdata))
{

$obj->mysqli2->query("insert into rewards (userID,rewardlevel,reward_date,timeinnumber) value ('$userid','$sno','".$obj->today_date_only."','".strtotime($obj->today_date_only)."')");

}
		
			
						
						?>				
											
                                                <tr>
                                                   
                                                   
                                                     <td><?php echo $myuserid; ?></td>
                                                    <td><strong><?php echo $val['sales'];?></strong></td>
                                                 
                                                    <td><strong><?php echo $val['cash']; ?></strong> </td>
													
													<td><?php echo $status; ?></td>
                                                </tr>
						<?php
						}else{
						break;
						}
						
						}
						
						}
						
						
			}			
						


//Setting Function End


?>