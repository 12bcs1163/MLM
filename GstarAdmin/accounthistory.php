<?php include'head.php' ?> 
<?php $currentincome=$obj->check_current_income(); 

$total=$currentincome['CURRENTBALANCE']; 
$width=$currentincome['WIDTH'];

$widthbalance=($total+$width)/2;
$widthbalance=$widthbalance-$width;

if(isset($_POST['transfer']))
{
$flag=2;
	
	
	$_POST['TotalAmount']=$_POST['Transferamount'];
	
	
	
	
	
	$myq111 = "SELECT * FROM Registration WHERE UserID='".$_POST['TUserID']."'";
		$packdata11=$obj->get_one_record($myq111);
	if(empty($packdata11)){
	$obj->flash="Invalid User ID ".$_POST['TUserID'];
	}else{
	
	/*$myq11 = "SELECT * FROM payments WHERE UserID='".$obj->userID."' and PaymentDate='".$obj->today_date_only."'";
		$packdata1=$obj->get_one_record($myq11);
	if(!empty($packdata1)){
	
	$obj->flash="You can only process your request once a day please try tomorrow .";
	
	}else{ */
	
	
	
	if($_POST['TotalAmount']<10)
	{
	
	$obj->flash="Total amount should be atleast $10.";
	
	}else{
	
	if($_POST['TotalAmount']>$total)
	{
	$obj->flash="Total amount should be greater then or equal current income.";
	}else{
	
	
	
	
	
	
	
	$mytotal=$_POST['TotalAmount'];
	
	
	$tid=rand();
	$requestarray=array();
	$requestarray['TotalAmount']=$_POST['TotalAmount'];
	$requestarray['pinrequest']=1;
	$requestarray['PaymentType']="Transfer Fund to ".$_POST['TUserID'];
	$requestarray['Status']='Approved';
	$requestarray['TranID']=$tid;
	$requestarray['PaymentMode']="Infinity Balance";
	
	$obj->withdrawal_request(array_filter($requestarray));
	
	$requestarray=array();
	$requestarray['TotalAmount']=$_POST['TotalAmount'];
	$requestarray['pinrequest']=1;
	$requestarray['PaymentType']="Received Fund from ".$obj->userID;
	$requestarray['Status']='Approved';
	$requestarray['TranID']=$tid;
	$requestarray['Trantype']="1";
	$requestarray['UserID']=$_POST['TUserID'];
	$requestarray['PaymentMode']="Infinity Balance";
	
	$obj->withdrawal_request(array_filter($requestarray));
	
	
	
	$obj->flash="Successfully Transfered your Infinity Balance to ".$requestarray['TUserID'];
	
	}
	}
	//}
	}
	
	
	
	
}


if(isset($_POST['request']))
{

$flag=2;
	$_POST['request']="";
	
	$totalamount=$widthbalance;
	
	
	
	if($_POST['TotalAmount']<20 || $_POST['TotalAmount']>$totalamount)
	{
	
	$obj->flash="Total amount should not be greater then  ".$totalamount." and it should be greater then 20.";
	
	}else{
	
	
	
	
	
	$array=array();
	$array['TotalAmount']=$_POST['TotalAmount'];
	$array['PaymentType']="Widthdrawl";
	//$array['TranID']=rand();
	$array['PaymentMode']="Infinity Balance";
	
	$obj->withdrawal_request(array_filter($array));
	
	}
	
	
	
	
}



 $currentincome=$obj->check_current_income(); 

$total=$currentincome['CURRENTBALANCE']; 
$widthbalance=($total+$width)/2;
$widthbalance=$widthbalance-$width;

?>      


           <div class="page-title">                    
                    <h2><span class="fa fa-dollar"></span> Infinity History</h2>
                </div>

               <div class="page-content-wrap">
                    
                    
                    
                    <div class="row">             
         		           
         
         
         
         
         			 <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Your Account History</h3>
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
                                <?php include("error.php"); ?>
                                    <div class="table-responsive">
                                        <table id="customers2" class="table datatable">
                                            <thead>
											
                                                <tr>
                                                    <th>S.no</th>
                                                    <th>Narration</th>
                                                    <th>Infinity Ref No</th>
                                                    <th>Value Date</th>
                                                   <th style="color:#79A82B;">Credit</th> 
						<th style="color:#F51715;">Debit</th> 
						 
                                                </tr>
                                            </thead>
                                            <tbody>
											
											
											<?php
											$sno=1;
											
											$data = $obj->get_one_record("select * from payments where UserID='".$obj->userID."' order by WithID DESC");
											$closing=0;
											foreach($data as $val)
											{
											
											$credit="";
											$debit="";
											if($val['TranType']=="1")
											{$credit=" ".$val['TotalAmount'];  }else{$debit=' '.$val['TotalAmount'];  }
											
											?>
											
                                                <tr>
												 <td><?php echo $sno++; ?></td>
												   <td><?php echo $val['PaymentType']; ?></td>
                                                    <td><?php echo $val['TranID']; ?> </td>
                                                    <td><?php echo $val['PaymentDate']; ?></td>                                                   
                                                 <td style="color:#79A82B;"><strong> <?php echo $credit; ?></strong></td>
												  <td style="color:#F51715;"><strong> <?php echo $debit; ?></strong> </td>
                                                  
                                                </tr>
                                             
											 <?php } ?>
											
                                               
                                            </tbody>
                                        </table> 
                                                 <table id="customers2" class="table">
                                         
                                            <tbody>
											
											
											
											
                                                <tr>
												 
												   <td style="opacity:0;">-------------------------------------------</td>
                                                    <td style="opacity:0;">@@@@@@@@@@@@@@@@@@@@@@@@</td>
                                                    <td style="opacity:0;">@@@@@@@</td>                                                   
                                                 <td style="opacity:0;">@@@@@@@</td>
												  <td style="color:#79A82B;"><strong>Closing Balance</strong> </td>
                                                  <td><strong> <?php echo $total; ?></strong> </td>
                                                </tr>
                                             
											
											
                                               
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
                    
                    
                    
                    
                    
                    
                    
                  
                    
                    
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                
                                <div class="panel-body form-group-separated">
								
								
								
                                    
                                    
                                    
                                     <div class="panel-body">
                                    <h3><span class="fa fa-sign-out"></span> Transfer Infinity Balance <span style="color:#F51715;"> <?php echo $total; ?></span></h3>
                                </div>
                                <div class="panel-body form-group-separated">
                                
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Enter   </label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text"  placeholder="eg:-10" name="Transferamount" class="form-control" /> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">User ID</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text"  value="" name="TUserID" class="form-control" id="topupuserid"/> 
                                            
                                        </div>
                                    </div>
                                    
                                    
                                 
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5" id="myformdata">
                                           
                                            <div id="showname"></div>
                                            <button type="button" id="verifytopup" class="btn btn-danger">Verify</button>
											 
											  
					<button type="submit" class="btn btn-danger" name="transfer" >
                                            
                                            Transfer Infinity Balance</button>
                                            
                                        </div>
                                    </div>
                                  
                                   
                            </form>
                            
                        </div>

                    </div>
                   
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
     
                    
                    
                   
                    </div>
                   
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
     
        
                    
                    
                    
                    
                    
                    

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
                    
                               
                        
                        
                          
        
   <?php include'footer.php' ?>