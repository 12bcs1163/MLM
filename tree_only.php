<?php
//include("../Mysqli/Memberclass.php");
if(!empty($_GET['resett'])){
$_SESSION['treesession']=array();
}
$id=@$_POST['id'];
if(empty($id))
{
	$myuserid=$obj->userID;
}else{

$myuserid=$_POST['id'];
/*	$query2 = "SELECT Id FROM Registration WHERE UserID = '".$myuserid."' and Id>".$obj->userauto; 				 
	$row1=$obj->get_one_record($query2);
	if(!empty($row1)){*/
	//$myuserid=$row1[0]['Id'];
	$obj->checkuser=$myuserid;
	$obj->checkuserok="";
	$re=$obj->checkuser($obj->userID,"Left");
	
	if($obj->checkuserok!="ok"){
	
	$re=$obj->checkuser($obj->userID,"Right");
	
	if($obj->checkuserok!="ok"){$myuserid=$obj->userID;}
	
	}
	
 //}else{$myuserid=$obj->userID;}
}

$_SESSION['treesession'][]=$myuserid;
$keyval=count($_SESSION['treesession'])-1;

if($_POST['backbtn']){
$keyval=$_POST['keyval']-1;

$myuserid=$_SESSION['treesession'][$keyval];
}
//print_r($_SESSION['treesession']);

$treeusers=array();
$obj->load_tree($myuserid);
$mainuserid=$treeusers;

$userdata1=$obj->getuinfo($mainuserid['UserID']);




$left1=$userdata1['totalleft'];
$right1=$userdata1['totalright'];


$treeusers=array();
$obj->load_tree($mainuserid['UserID'],"Left");
$mainleftuserid=$treeusers;
$userdata2=$obj->getuinfo($mainleftuserid['UserID']);

//print_r($mainleftuserid);

$left2=$userdata2['totalleft'];
$right2=$userdata2['totalright'];

//print_r($mainleftuserid);
$treeusers=array();
$obj->load_tree($mainuserid['UserID'],"Right");
$mainrightuserid=$treeusers;
$userdata3=$obj->getuinfo($mainrightuserid['UserID']);

$left3=$userdata3['totalleft'];
$right3=$userdata3['totalright'];


$treeusers=array();
$obj->load_tree($mainleftuserid['UserID'],"Left");
$mainleftleftuserid=$treeusers;
$userdata4=$obj->getuinfo($mainleftleftuserid['UserID']);

$left4=$userdata4['totalleft'];
$right4=$userdata4['totalright'];

$treeusers=array();
$obj->load_tree($mainleftuserid['UserID'],"Right");
$mainleftrightuserid=$treeusers;
$userdata5=$obj->getuinfo($mainleftrightuserid['UserID']);

$left5=$userdata5['totalleft'];
$right5=$userdata5['totalright'];

$treeusers=array();
$obj->load_tree($mainrightuserid['UserID'],"Left");
$mainrightleftuserid=$treeusers;
$userdata6=$obj->getuinfo($mainrightleftuserid['UserID']);

$left6=$userdata6['totalleft'];
$right6=$userdata6['totalright'];

$treeusers=array();
$obj->load_tree($mainrightuserid['UserID'],"Right");
$mainrightrightuserid=$treeusers;
$userdata7=$obj->getuinfo($mainrightrightuserid['UserID']);


$left7=$userdata7['totalleft'];
$right7=$userdata7['totalright'];





//Settings for end row 

$treeusers=array();
$obj->load_tree($mainleftleftuserid['UserID'],"Left");
$end1=$treeusers;
$userdata8=$obj->getuinfo($end1['UserID']);
$left8=$userdata8['totalleft'];
$right8=$userdata8['totalright'];


$treeusers=array();
$obj->load_tree($mainleftleftuserid['UserID'],"Right");
$end2=$treeusers;
$userdata9=$obj->getuinfo($end2['UserID']);

$left9=$userdata9['totalleft'];
$right9=$userdata9['totalright'];



$treeusers=array();
$obj->load_tree($mainleftrightuserid['UserID'],"Left");
$end3=$treeusers;
$userdata10=$obj->getuinfo($end3['UserID']);

$left10=$userdata10['totalleft'];
$right10=$userdata10['totalright'];

$treeusers=array();
$obj->load_tree($mainleftrightuserid['UserID'],"Right");
$end4=$treeusers;
$userdata11=$obj->getuinfo($end4['UserID']);


$left11=$userdata11['totalleft'];
$right11=$userdata11['totalright'];


$treeusers=array();
$obj->load_tree($mainrightleftuserid['UserID'],"Left");
$end5=$treeusers;
$userdata12=$obj->getuinfo($end5['UserID']);

$left12=$userdata12['totalleft'];
$right12=$userdata12['totalright'];

$treeusers=array();
$obj->load_tree($mainrightleftuserid['UserID'],"Right");
$end6=$treeusers;
$userdata13=$obj->getuinfo($end6['UserID']);

$left13=$userdata13['totalleft'];
$right13=$userdata13['totalright'];


$treeusers=array();
$obj->load_tree($mainrightrightuserid['UserID'],"Left");
$end7=$treeusers;
$userdata14=$obj->getuinfo($end7['UserID']);

$left14=$userdata14['totalleft'];
$right14=$userdata14['totalright'];

$treeusers=array();
$obj->load_tree($mainrightrightuserid['UserID'],"Right");
$end8=$treeusers;
$userdata15=$obj->getuinfo($end8['UserID']);

$left15=$userdata15['totalleft'];
$right15=$userdata15['totalright'];


for($i=1;$i<=15;$i++)
{
$user="";
$query2="";
$row1="";
$v2="userdata".$i;
$var="directleft".$i;
$balle=$$v2;
$user=$balle['UserID'];

//print_r($$v2);
 $query2 = "SELECT COUNT(*) as total from Registration WHERE DirectID = '".$user."' and Position='Left'"; 				 
	$row1=$obj->get_one_record($query2);
	
	
	

$$var=$row1[0]['total'];

$user="";
$query2="";
$row1="";
$v2="userdata".$i;
$var="directright".$i;
$balle=$$v2;
$user=$balle['UserID'];


$query2 = "SELECT COUNT(*) as total from Registration WHERE DirectID = '".$user."' and Position='Right'"; 				 
$row1=$obj->get_one_record($query2);
	

$var=$row1[0]['total'];

}

//print_r($mainrightrightuserid);

?>


				
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tbody><tr>
<td align="left" ></td>
		<td align="right" width="65%"></td>
<form name="myform" action="tree.php" method="post">		
<td align="right">
				<input type="text"  name="id" class="form-control border-input" placeholder="Enter User ID">
		</td>		
		<td align="right"> 
			<input type="submit" value="Search" name="Search" class="btn btn-primary">
		</td>
</form>
	  </tr>
	</tbody></table>

	<center>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">

		<tbody>
									


<tr>
<td colspan="10">
  
                  <div class="col-lg-12 col-md-12 col-xs-12">
            <div>
                          
                            <div class="content">
     

 <div class="row">
 <hr>
	                                      
	                                          <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input type="text" value="<?php echo $userdata1['FirstName']." ".$userdata1['LastName']; ?>" placeholder="Balance" class="form-control border-input" />
												</div>
	                                        </div>
	                                          
  

</div>



 <div class="row">
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Total Left Downline</label>
													<input type="text" value="<?php echo $userdata1['totalleft']; ?>" placeholder="Balance" class="form-control border-input" />
												</div>
	                                        </div>
	                                          <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Total Right Downline</label>
													<input type="text" value="<?php echo $userdata1['totalright']; ?>" placeholder="Balance" class="form-control border-input" />
												</div>
	                                        </div>
	                                          <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Total Left Investment</label>
													<?php 
													$totalleftb=$userdata1['totalleftb'];
													$totalleftb=trim($totalleftb,"INR");
													
													
													
													?>
													
													
													
													<input type="text" value="<?php echo "$"." ".$totalleftb;?>" placeholder="Balance" class="form-control border-input" />
												</div>
	                                        </div>
	                                          <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Total Right Investment</label>
													<?php 
													$totalrightb=$userdata1['totalrightb'];
													$totalrightb=trim($totalrightb,"INR");
													
													
													
													?>
													
													
													
													<input type="text" value="<?php echo "$"." ". $totalrightb;?>" placeholder="Balance" class="form-control border-input" />
												</div>
	                                        </div>

  

</div>




</td>

</tr>

								 
								  <tr>
								  
                                    <td colspan="8" style="padding-top:5px;" align="center">
									<div align="center">
									<a id="trigger0">	
									</a><form name="tree_v" action="tree.php" method="post"><a id="trigger0">
										<input type="hidden" name="id" value="<?php echo $mainuserid['UserID']; ?>">
										<input type="submit" name="tree"  style="background:url(<?php echo $mainuserid['img']; ?>) no-repeat; height:100px; width:72px; border:none;" value="">
									
									<br>
                                        <strong></strong></a><strong><a id="trigger0" > <?php echo $mainuserid['UserID']; ?><br>( <?php echo $mainuserid['FirstName']; ?> )</a></strong>
									  </form>
									  
									 </div>
 									</td>
									<td></td>
                                  </tr>
                                  <tr>
                                    <td colspan="8"><div align="center"><img src="img/arrow1.png" width="550" height="35"></div></td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="width:480px; height:100px; padding-top:10px; vertical-align:top;">
									<div align="center">
									<a id="trigger1">	</a><form name="tree_v" action="tree.php" method="post"><a id="trigger1">
										<input type="hidden" name="id" value="<?php echo $mainleftuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainleftuserid['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
																			
									</a><br>
                                        <strong><a id="trigger1"><?php echo $mainleftuserid['UserID']; ?><br> ( <?php echo $mainleftuserid['FirstName']; ?> )</a>
										
										</strong></form></div>
										
									  </td>
                                    <td colspan="4" style="width:480px; height:100px; padding-top:10px; vertical-align:top;">
									<div align="center">
									<form name="tree_v" action="tree.php" method="post">
									<a id="trigger2">	
										<input type="hidden" name="id" value="<?php echo $mainrightuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainrightuserid['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									
									</a><br>
                                        <strong><a id="trigger2"><?php echo $mainrightuserid['UserID']; ?><br>( <?php echo $mainrightuserid['FirstName']; ?> )</a>
										</strong>
										</form>
										</div>
									</td>
                                  </tr>
                                  <tr>
                                    <td colspan="4"><div align="center"><img src="img/arrow2.png" width="325" height="35"></div></td>
                                    <td colspan="4"><div align="center"><img src="img/arrow2.png" width="325" height="35"></div></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="width:240px; height:100px; padding-top:10px; vertical-align:top;">
										<div align="center">
									<a id="trigger3">	<form name="tree_v" action="tree.php" method="post">
										<input type="hidden" name="id" value="<?php echo $mainleftleftuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainleftleftuserid['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</form>
									</a>
                                        <strong><a id="trigger3"><?php echo $mainleftleftuserid['UserID']; ?><br> ( <?php echo $mainleftleftuserid['FirstName']; ?> )</a></strong></div>
										</td>
                                    <td colspan="2" style="width:240px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger4">	
										<input type="hidden" name="id" value="<?php echo $mainleftrightuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainleftrightuserid['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger4"><?php echo $mainleftrightuserid['UserID']; ?><br> ( <?php echo $mainleftrightuserid['FirstName']; ?> )</a></strong>
									</div>
									</form>
									</td>
                                    <td colspan="2" style="width:240px; height:100px; padding-top:10px; vertical-align:top;">
									<div align="center">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger5">	
										<input type="hidden" name="id" value="<?php echo $mainrightleftuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainrightleftuserid['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger5"> <?php echo $mainrightleftuserid['UserID']; ?><br>( <?php echo $mainrightleftuserid['FirstName']; ?> )</a></strong>
									</div>
									</form>
									</div></td>
                                    <td colspan="2" style="width:240px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger6">	
										<input type="hidden" name="id" value="<?php echo $mainrightrightuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainrightrightuserid['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger6"><?php echo $mainrightrightuserid['UserID']; ?><br> ( <?php echo $mainrightrightuserid['FirstName']; ?> )</a></strong>
									</div>
									</form>
									</td>
                                  </tr>
                                 <tr>
                                    <td colspan="2"><div align="center"><a href="#"><img src="img/arrow3.png" width="125" height="35"></a></div></td>
                                    <td colspan="2"><div align="center"><a href="#"><img src="img/arrow3.png" width="125" height="35"></a></div></td>
                                    <td colspan="2"><div align="center"><a href="#"><img src="img/arrow3.png" width="125" height="35"></a></div></td>
                                    <td colspan="2"><div align="center"><a href="#"><img src="img/arrow3.png" width="125" height="35"></a></div></td>
                                  </tr>
                                  <tr>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
										<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger7">	
										<input type="hidden" name="id" value="<?php echo $end1['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $end1['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger7"><?php echo $end1['UserID']; ?><br> ( <?php echo $end1['FirstName']; ?> )</a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger8">	
										<input type="hidden" name="id" value="<?php echo $end2['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $end2['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger8"><?php echo $end2['UserID']; ?><br>( <?php echo $end2['FirstName']; ?> )</a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger9">	
										<input type="hidden" name="id" value="<?php echo $end3['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $end3['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger9"><?php echo $end3['UserID']; ?><br> ( <?php echo $end3['FirstName']; ?> )</a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger10">	
										<input type="hidden" name="id" value="<?php echo $end4['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $end4['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger10"><?php echo $end4['UserID']; ?><br>( <?php echo $end4['FirstName']; ?> )</a>
									
									</strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
								<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger11">	
										<input type="hidden" name="id" value="<?php echo $end5['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $end5['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger11"><?php echo $end5['UserID']; ?><br> ( <?php echo $end5['FirstName']; ?> )</a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger12">	
										<input type="hidden" name="id" value="<?php echo $end6['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $end6['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger12"><?php echo $end6['UserID']; ?><br>( <?php echo $end6['FirstName']; ?> )</a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
								<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger13">	
										<input type="hidden" name="id" value="<?php echo $end7['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $end7['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger13"> <?php echo $end7['UserID']; ?><br>( <?php echo $end7['FirstName']; ?> )</a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger14">	
										<input type="hidden" name="id" value="<?php echo $end8['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $end8['img']; ?>) no-repeat; height:100px; width:100px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger14"><?php echo $end8['UserID']; ?><br>( <?php echo $end8['FirstName']; ?> )</a></strong>
									</div>
									</form>
									</td>
                                  </tr> 
                                  
								  
                                </tbody></table>
			</td>
	</tr></tbody></table>		
						