<?php include'head.php'; 


if(isset($_POST['search']))
{
    
   $q="select SUM(TotalAmount) as total from Commitment where DateTimeStr>='".strtotime($_POST['from'])."' and DateTimeStr<='".strtotime($_POST['to'])."'";
   
    $totalcollection = $obj->get_one_record($q);
    
}else{

$totalcollection = $obj->get_one_record("select SUM(TotalAmount) as total from Commitment");
}
$totalcollection=$totalcollection[0]['total'];
$threepercent=$totalcollection*21/100;

$data = $obj->get_one_record("select * from Registration where silverpoolstatus='1' order by Id DESC");


if(!empty($_GET['delpayid']))
{
    
    $obj->mysqli2->query("delete from campains where payid='".$_GET['delpayid']."' and type='Pension'");
    
      $obj->mysqli2->query("delete from payments where TranID='".$_GET['delpayid']."' and PaymentMode='Pension'");
    
}

if(isset($_POST['send']))
{

$amount=$_POST['amount'];
$payid=$_POST['payid'];
$perhead=$amount/count($data);
$d=$obj->get_one_record("select * from campains where payid='".$payid."' and type='Pension'");

if(empty($d))
{
    
  $q="insert into campains (amount,datetime,payid,type,perhead,totalusers) values ('".$amount."','".strtotime('NOW')."','".$payid."','Pension','".$perhead."','".count($data)."')";
  $obj->mysqli2->query($q);

foreach($data as $v)
{
$userid=$v['UserID'];
$tid=$payid;




	$requestarray=array();
	$requestarray['TotalAmount']=$perhead;
	$requestarray['pinrequest']=1;
	$requestarray['PaymentType']="Silver Pool Income";
	$requestarray['Status']='Approved';
	$requestarray['TranID']=$tid;
$requestarray['Trantype']="1";
	$requestarray['UserID']=$userid;
	$requestarray['PaymentMode']="Pension";
	
	$obj->withdrawal_request(array_filter($requestarray));
$obj->flash="Amount Distribute Successfully";
}

}else{
    
    $obj->flash="Error Duplicate Campain !!";
}

}


?>
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>All Silver Pool Holder</h2>
                    <?php include("error.php"); ?>
                </div>
                <!-- END PAGE TITLE -->        
                
                        
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">All Users</h3>
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
                                                <form action="" method="post">
                                                <tr>
                                                    <th colspan="3">Select From <input type="date" name="from"></th>
                                                   <th colspan="3">Select To <input type="date" name="to"> <button class="btn btn-success" type="submit" name="search"> Search </button></th>
                                                     
                                                    
                                                </tr>
                                                </form>
 <tr>
                                                    <th colspan="3">Total Collection (Rs. <?php

echo $totalcollection;

?>) </th>
                                                   <th colspan="3">Total 21 % Amount (Rs. <?php

echo $threepercent;

?> )</th>
                                             
                                                   
                                                   
                                                    
                                                </tr>

                                                <tr>
                                                    <th>User Name</th>
                                                    <th>Name</th>
                                                     <th>Sponser Details</th>
                                                    <th>Date of Joining</th>
                                                    <th>Password</th>
                                                    <th>Mobile</th>
						  
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
											
											
											
											<?php





												
													
													foreach($data as $val)
													{
													
												?>
											
                                                <tr>
                                                    <td><?php echo $val['UserID']; ?></td>
                                                    <td><?php echo $val['FirstName']; ?> <?php echo $val['LastName']; ?></td>
                                                      <td><?php echo $val['DirectID']."[ ".$row11[0]['FirstName']." ]"; ?> </td>
                                                    
                                                    <td><?php echo $val['RegistrationDate']; ?></td>
                                                    <td><?php echo $val['Password']; ?>
                                                    </td>
                                                    <td><?php echo $val['MobileNo']; ?></td>
												
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
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                           <div class="col-md-6">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">All Campains Record</h3>
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
                                                <form action="" method="post">

 <tr>
                                                    <th>Campain ID</th>
                                                    <th><input type="text" placeholder="P-1" name="payid" class="form-control"></th>
                                                     <th>Total Amount</th>
                                                    <th><input type="text" placeholder="10000" name="amount" class="form-control"></th>
                                                    <th colspan="2"><button class="btn btn-success" name="send" type="submit"> Distribute </button></th>
                                                    
                                                    
                                                </tr>
                                                </form>
                                                <tr>
                                                    <th>Campain ID</th>
                                                    <th>Date</th>
                                                     <th>Total Amount</th>
                                                    <th>Total Users</th>
                                                    <th>Per Head</th>
                                                    <th>Chat</th>
						  
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
											
											
											
											<?php




$data2 = $obj->get_one_record("select * from campains where type='pension' order by Id DESC");


												
													
													foreach($data2 as $val)
													{
													
												?>
											
                                                <tr>
                                                    <td><?php echo $val['payid']; ?><br>
                                                    <a href="pension.php?delpayid=<?php echo $val['payid']; ?>" onclick="return confirm('Do you really want to delete <?php echo $val['payid']; ?>')">Delete</a>
                                                    </td>
                                                    <td><span class="label label-danger"><?php echo date('F j, Y',$val['datetime']); ?></span></td>
                                                      <td ><span class="label label-success">Rs. <?php echo $val['amount']; ?></span> </td>
                                                    
                                                    <td><?php echo $val['totalusers']; ?></td>
                                                    <td > <span class="label label-success">Rs. <?php echo $val['perhead']; ?>
</span>                                                    </td>
                                                    <td><a href="pchart.php?payid=<?php echo $val['payid']; ?>">List Users</a></td>
												
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