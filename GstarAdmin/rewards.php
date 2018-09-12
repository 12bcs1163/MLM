<?php include'head.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#download").click(function(){

var from=$(".from").val();
var to=$(".to").val();
var reward=$("#reward").val();

if(from=="" || to=="" || reward=="")
{
$("#downloadlink").html("<font color='red'>Please fill all field showing in search form .</font>");
return false;
}

var type=$('#type').val();
$("#downloadlink").html("<a href='downloadxls.php?from="+from+"&&to="+to+"&&reward="+reward+"&&type="+type+"' target='_blank'>Download Here</a>");


});
});
</script>
<?php



	$rewardarray=array("1"=>"25000 or branded led","2"=>"I Phone + Domestic Trip","3"=>"International Trip + Alto k10","4"=>"Brand New Swift Desire","5"=>"Brand New Maruti Brezza","6"=>"Mahindra xuv 500 or 18 Lac","7"=>"Toyota Fortuner or 30 Lac","8"=>"Get Rs. 60 Lac  or Well Furnished House","9"=>"Get Rs. 1 Cr   or  ( MDT + 1 % Extra benefits ) ");
										
if(!empty($_GET['delid']))
{
	$obj->mysqli2->query("delete from rewards where rewardID='".$_GET['delid']."'");
	$obj->flash="Successfully Deleted";
}






?>
                
                <!-- PAGE TITLE -->
				
				
				<?php 
				
				if(!empty($_GET['id'])){
				$data = $obj->get_one_record("select * from rewards where status='Pending' and rewardID='".$_GET['id']."'");
if(!empty($data)){
$data=$data[0]; 


				
				?>
				
				<?php

if(isset($_POST['generate']))
{
if(empty($_POST['approve_date'])){ $obj->flash="Please Fill Approve Date .";
}else{
$obj->mysqli2->query("update rewards set status='Approved',approve_date='".$_POST['approve_date']."' where rewardID='".$_GET['id']."'");
	$obj->flash="Successfully Approved Reward";}
}



?>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Rewards </h2>
                </div>
                <!-- END PAGE TITLE -->                
              
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                  <?php include("error.php"); ?>
				 
                
           <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> Approvel Form</h2>
                </div>

               <div class="page-content-wrap">
                    
                       
                    
                    <div class="row">                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                            
                           
                            
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Approve Reward : </h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5"></div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">User ID</label>
                                        <div class="col-md-5 col-xs-5">  <input type="text" placeholder="User ID" class="form-control" name="userID" value="<?php echo $data['userID']; ?>" readonly/ ></div>
                                    </div>
								
									
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Level</label>
                                        <div class="col-md-5 col-xs-5">  <input type="text" placeholder="Level" class="form-control" value="<?php echo $data['rewardlevel']; ?>"  reqiured/ ></div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Pay Date</label>
                                        <div class="col-md-5 col-xs-5">    <input type="text" name="approve_date" class="form-control" placeholder="<?php echo date("m/d/Y"); ?>" id="dp-4" value="<?php echo date("m/d/Y"); ?>" ></div>
                                    </div>
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="generate">Send</button>
                                        </div>
                                       
                                    </div>
									
									
                                 
                                </div>
                            </div>
                            
                                                                      
                                    </form>
                            

                        </div>
                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                    
                        </div>
                        
                    </div>
                    

                </div>
				
				
				
				
				
                   

                </div>  
				
				<?php } } ?>




<!--  Search Form -->
<div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Rewards </h2>
                </div>
                <!-- END PAGE TITLE -->                
              
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                  <?php include("error.php"); ?>
				 
                
          
               <div class="page-content-wrap">
                    
                       
                    
                    <div class="row">                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                            
                           
                            
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Search : </h3>
                                </div>
                                <div class="panel-body form-group-separated">
				
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">From</label>
                                        <div class="col-md-5 col-xs-5">   <input type="text" name="from" class="form-control from" placeholder="Eg:- <?php echo date("m/d/Y"); ?>" id="dp-3" value="<?php echo $_POST['from']; ?>" ></div>
                                    </div>
								
									
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">To</label>
                                        <div class="col-md-5 col-xs-5">  <input type="text" name="to" class="form-control to" placeholder="Eg:- <?php echo date("m/d/Y"); ?>" id="dp-4" value="<?php echo $_POST['from']; ?>"></div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Reward </label>
                                        <div class="col-md-5 col-xs-5"> <select name="reward" class="form-control" id="reward"><option value="">--All--</option>
<?php

foreach($rewardarray as $key=>$val)
{
if($_POST['reward']==$key){
echo "<option value='".$key."' selected>".$val."</option>";}else{echo "<option value='".$key."'>".$val."</option>";}
}

?>
 </select> 

<input type="hidden" value="<?php if(empty($_GET['app'])){echo "Pending";}else{ echo "Approved"; } ?>" id="type"></div>
                                    </div>
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="search">Search</button>
 <button type="button" class="btn btn-info pull-right" id="download">Genrate Download .XLS Link</button>
<span id="downloadlink"></span>
                                        </div>
                                       
                                    </div>
									
									
                                 
                                </div>
                            </div>
                            
                                                                      
                                    </form>
                            

                        </div>
                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                    
                        </div>
                        
                    </div>
                    

                </div>
				
				
				
				
				
                   

                </div>  




				
				
				<div class="row">
					
					
					
					
						
						
						
						
					
					                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Direct Rewards History</h3>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src='img/icons/json.png' width="24"/> JSON</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'true'});"><img src='img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='img/icons/xml.png' width="24"/> XML</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='img/icons/png.png' width="24"/> PNG</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="customers2" class="table datatable">
                                            <thead>
                                                <tr>
												 <th>Serial No.</th>
												  <th>Reward Level</th>
                                                  
                                                  <th>Request Date</th>
                                                    
                                                     
													 <th>User ID</th>
													
													<th>Approve Date</th>
                                                <th>Status</th>

                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
											
											<?php
											$sno=1;
											if(empty($_GET['app'])){
											

if(isset($_POST['search']))
{
		if(!empty($_POST['from']) && empty($_POST['to']))
		{
			if(!empty($_POST['reward'])){
			$data = $obj->get_one_record("select * from rewards where timeinnumber='".strtotime($_POST['from'])."' and rewardLevel='".$_POST['reward']."' and status='Pending' order by rewardID DESC");
			}else{
			$data = $obj->get_one_record("select * from rewards where timeinnumber='".strtotime($_POST['from'])."' and status='Pending' order by rewardID DESC");
			}
		}

		if(!empty($_POST['from']) && !empty($_POST['to']))
		{
			if(!empty($_POST['reward'])){
			$data = $obj->get_one_record("select * from rewards where timeinnumber>=".strtotime($_POST['from'])." and timeinnumber<=".strtotime($_POST['to'])." and rewardLevel='".$_POST['reward']."' and status='Pending' order by rewardID DESC");
			}else{
			$data = $obj->get_one_record("select * from rewards where timeinnumber>=".strtotime($_POST['from'])." and timeinnumber<=".strtotime($_POST['to'])." and status='Pending' order by rewardID DESC");
			}
		
		
		}




}else{
$data = $obj->get_one_record("select * from rewards where status='Pending' order by rewardID DESC");
}
											}else{
											
											
											if(isset($_POST['search']))
{
		if(!empty($_POST['from']) && empty($_POST['to']))
		{
			if(!empty($_POST['reward'])){
			$data = $obj->get_one_record("select * from rewards where timeinnumber='".strtotime($_POST['from'])."' and rewardLevel='".$_POST['reward']."' and status='Approved' order by rewardID DESC");
			}else{
			$data = $obj->get_one_record("select * from rewards where timeinnumber='".strtotime($_POST['from'])."' and status='Approved' order by rewardID DESC");
			}
		}

		if(!empty($_POST['from']) && !empty($_POST['to']))
		{
			if(!empty($_POST['reward'])){
			$data = $obj->get_one_record("select * from rewards where timeinnumber>=".strtotime($_POST['from'])." and timeinnumber<=".strtotime($_POST['to'])." and rewardLevel='".$_POST['reward']."' and status='Approved' order by rewardID DESC");
			}else{
			$data = $obj->get_one_record("select * from rewards where timeinnumber>=".strtotime($_POST['from'])." and timeinnumber<=".strtotime($_POST['to'])." and status='Approved' order by rewardID DESC");
			}
		
		
		}




}else{
$data = $obj->get_one_record("select * from rewards where status='Approved' order by rewardID DESC");
}
											
											
											
											}
											foreach($data as $val)
											{
										
											?>
											
                                                <tr>
												 <td><?php echo $sno++; ?></td>
                                                  
                                                    <td><?php echo $rewardarray[$val['rewardlevel']]; ?></td>
                                                   
                                                
                                                   <td><strong><?php echo $val['reward_date']; ?> </strong> </td>
												  <td><strong><?php echo $val['userID']; ?> </strong> </td>
                                                 
                                                   <td><?php echo $val['approve_date']; ?></td>
												 
												    <td>
												    <?php if(empty($_GET['app'])){
												    ?>
												    <strong><a href="rewards.php?id=<?php echo $val['rewardID']; ?>" > Approve Request</a> </strong>
												    <?php
												     }else{ $rewardid=$val['rewardID']; ?>
Approved <br> <a href="rewards.php?delid=<?php echo $val['rewardID']; ?>" onclick="return confirm('Do you really want to delete ?')"><button class='btn btn-danger'>Delete</button></a>
<?php } ?>
												     </td>
												  
                                                </tr>
                                             
											 <?php } ?>
											 
                                               
                                            </tbody>
                                        </table>                                    
                                    </div>
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            
                            
                            <!-- START DEFAULT TABLE EXPORT -->
                           
                            <!-- END DEFAULT TABLE EXPORT -->

                        </div>
                    </div>
				
				
				       
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->        
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                      
<?php include'footer.php' ?>