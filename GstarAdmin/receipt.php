<?php include'head.php' ?>
<?php

if(!empty($_GET['delid']))
{
	$obj->delete_payment_request($_GET['delid']);
}



 if(!empty($_GET['id'])){
$id="";
	$obj->update_paymentupload($id,$_GET['id']);
	
	}


?>




                
                <!-- PAGE TITLE -->
				
				
				<?php 
				
				if(!empty($_GET['id1'])){
				$data = $obj->get_one_record("select * from paymentuploads where Status='InActive' and PayID='".$_GET['id']."'");
if(!empty($data)){
$data=$data[0]; 


				
				?>
				
				
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Send Payment </h2>
                </div>
                <!-- END PAGE TITLE -->                
              
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                  <?php include("error.php"); ?>
				 
                
           <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> Generate Url</h2>
                </div>

               <div class="page-content-wrap">
                    
                       
                    
                    <div class="row">                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                            
                           
                            
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Generate Url : </h3>
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
                                        <label class="col-md-3 col-xs-5 control-label">No Of Urls</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="No Of Urls" class="form-control" name="numbers" value="1" reqiured/ >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Amount</label>
                                        <div class="col-md-5 col-xs-5">  <input type="text" placeholder="Amount" class="form-control" value="<?php echo $data['Amount']; ?>" name="amount" reqiured/ ></div>
                                    </div>
									
									
									
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="generate">Generate</button>
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
												   <th>User ID</th>
                                                    <th>Amount</th>
                                                    
                                                  <th>Send Date</th>
                                                   
													 <th>Slip</th>
													  <th>Details</th>
													   <th>Status</th>
													<th>Change Status</th>
                                                  <th>Delete</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
											
											<?php
											$sno=1;
											$data = $obj->get_one_record("select * from paymentuploads where Status='InActive' order by PayID DESC");
											foreach($data as $val)
											{
											
											?>
											
                                                <tr>
												 <td><?php echo $sno++; ?></td>
												  <td><?php echo $val['UserID']; ?></td>
                                                    <td><?php echo $val['Amount']; ?></td>
                                                    <td><?php echo $val['PayDate']; ?></td>
                                                    <td><a href="../userpanel/users/<?php echo $val['Slip']; ?>" target="_blank"> Show Slip</a></td>
													
                                                 <td><strong><?php echo $val['BankDetails']; ?> </strong></td>
												  <td><strong><?php echo $val['Status']; ?> </strong> </td>
                                                  <td><strong><a href="receipt.php?id=<?php echo $val['PayID']; ?>" > Active</a> </strong> </td>
												    <td><strong><a href="receipt.php?delid=<?php echo $val['PayID']; ?>" > Delete Request</a> </strong> </td>
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