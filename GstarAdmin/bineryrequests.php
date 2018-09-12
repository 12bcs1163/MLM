<?php include'head.php' ?>
<?php

if(!empty($_GET['delid']))
{
	$obj->delete_with_request($_GET['delid']);
}






?>
                
                <!-- PAGE TITLE -->
				
				
				<?php 
				
				if(!empty($_GET['id'])){
				$data = $obj->get_one_record("select * from payments where WithID='".$_GET['id']."' and pinrequest='0'");
if(!empty($data)){
$data=$data[0]; 


				
				?>
				
				<?php

if(isset($_POST['generate']))
{
if(empty($_POST['TranID'])){ $obj->flash="Please Fill Transaction Number .";
}else{
	$obj->update_payment_request(array_filter($_POST),$_GET['id']);}
}



?>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Send Payment </h2>
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
                                    <h3><span class="fa fa-pencil"></span> Approve Request : </h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5"></div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">User ID</label>
                                        <div class="col-md-5 col-xs-5">  <input type="text" placeholder="User ID" class="form-control" name="userID" value="<?php echo $data['UserID']; ?>" readonly/ ></div>
                                    </div>
								
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Transaction Number</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="Transaction Number" class="form-control" name="TranID" value="<?php echo $data['TranID']; ?>" reqiured/ >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Amount</label>
                                        <div class="col-md-5 col-xs-5">  <input type="text" placeholder="Amount" class="form-control" value="<?php echo $data['TotalAmount']; ?>" name="TotalAmount" reqiured/ ></div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Pay Date</label>
                                        <div class="col-md-5 col-xs-5">    <input type="text" name="PaidDate" class="form-control" placeholder="<?php echo date("m/d/Y"); ?>" id="dp-4" value="<?php echo date("m/d/Y"); ?>" ></div>
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
				
				
				<div class="row">
					
					
					
					
						
						
						
						
					
					                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Payment History</h3>
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
												  <th>Payment Type</th>
                                                  
                                                  <th>Request Date</th>
                                                     <th>Net Amount</th>
                                                       <th>Deduction %</th>
                                                     <th>Total Amount</th>
													 <th>User ID</th>
													  <th>Payment Mode</th>
													 <th>Account Details</th>
													<th>Approve</th>
                                                
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
											
											<?php
											$sno=1;
											$data = $obj->get_one_record("select * from payments where PaymentMode='Withdraw' and Status='Pending' order by WithID DESC");
											foreach($data as $val)
											{
										$bankinfo="";	
											
											$data2 = $obj->get_one_record("select * from Registration where UserID='".$val['UserID']."'");
											
											$bankinfo="A/C Holder :- ".$data2[0]['Acc_Holder_Name']."<br>";
												$bankinfo.="Bank :- ".$data2[0]['Bank_Name']."<br>";
												$bankinfo.="A/C No :- ".$data2[0]['Bank_Acc_No']."<br>";
													$bankinfo.="IFSC :- ".$data2[0]['IFSC_Code']."<br>";
														$bankinfo.="Pan :- ".$data2[0]['Pan_Number']."<br>";
											$admin=$val['TotalAmount']*10/100;
											
											if($val['TotalAmount']>5000)
											{
											$tds=$val['TotalAmount']*5/100;
											}else{$tds=0;}
											$netamount=$val['TotalAmount']-($admin+$tds);
											
											?>
											
                                                <tr>
												 <td><?php echo $sno++; ?></td>
                                                    <td><?php echo $val['PaymentType']; ?><br><strong><a href="bineryrequests.php?delid=<?php echo $val['WithID']; ?>" onclick="return confirm('Do you really want to delete ?')"> Delete Request</a> </strong> </td>
                                                    <td><?php echo $val['PaymentDate']; ?></td>
                                                   
                                                 <td><strong>Rs <?php echo $netamount; ?> </strong></td>
                                                  <td><strong>Rs <?php echo $tds+$admin; ?> </strong></td>
                                                   <td>Rs <?php echo $val['TotalAmount']; ?></td>
												  <td><strong><?php echo $val['UserID']; ?> <br>
<?php echo $data2[0]['FirstName']; ?></strong> </td>
                                                  <td><strong><?php echo $val['PaymentMode']; ?> </strong> </td>
                                                   <td><?php echo $bankinfo; ?></td>
												 
												    <td><strong><a href="bineryrequests.php?id=<?php echo $val['WithID']; ?>" > Approve Request</a> </strong> </td>
												  
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