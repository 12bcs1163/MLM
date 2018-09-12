<?php include'head.php';
 ?>       

<?php
//total incomes

$userid=$_GET['userid'];


if(!empty($_GET['id']))
{$obj->mysqli2->query("delete from payments where WithID='".$_GET['id']."'");}

if(isset($_POST['pay']))
{
$_POST['UserID']=$userid;
$obj->withdrawal_request(array_filter($_POST));

}


//Second Partner Income

$data = $obj->get_one_record("select SUM(TotalAmount) as total from payments where PaymentMode='thirdincome' and UserID='".$userid."'");

$secondpartnerincome=$data[0]['total'];

//End Second Partner Income


$data = $obj->get_one_record("select SUM(TotalAmount) as total from payments where PaymentMode='API' and UserID='".$userid."'");

$apiincome=$data[0]['total'];

//Partner Income

$closing=0;

$data = $obj->get_one_record("select * from Registration where DirectID='".$userid."'");
													foreach($data as $val)
													{
														$query2 = "SELECT SUM(dollarsamount) AS Amount FROM Commitment WHERE UserID = '".$val['UserID']."'"; 				 
														 $row1=$obj->get_one_record($query2);
														 $row1=$row1[0];
														 if(!empty($row1['Amount'])){ $val['amount']=$row1['Amount']; }else{ $val['amount']=0; }
														 
														 $myamount=$val['amount']*25/100;
														
$closing+=$myamount;	

}											

$directincome=$closing;		

$totalincome=$directincome+$apiincome+$partnerincome+$secondpartnerincome;

//Total Paid

$data = $obj->get_one_record("select SUM(TotalAmount) as total from payments where PayMode!='' and UserID='".$userid."'");

$debit=$data[0]['total'];

$due=$totalincome-$debit;
?>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
   $("#enteramount").keyup(function(){
var a=$("#enteramount").val();

//alert(a);
var b=a*90/100;
        $("#showamount").val(b);
    });
});
</script>

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                    
                   <div class="page-title">                    
                    <h2></span> Income Chart <?php echo $userid; ?></h2>
                </div>
                    
				<div class="row">
                       
					
					
					<div class="row">
                        <div class="col-md-6">
                            
                            <form class="form-horizontal" action="" method="post">
                            <div class="panel panel-default">
                                <div class="panel-body">


								<div class="panel-body col-md-4 col-xs-12">
                                     <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span>Overall Income</h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                   
	
									<div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Total Direct Income</label>
                                        <div class="col-md-6 col-xs-6">
                                            <input type="text" placeholder="Direct Income" class="form-control" value="<?php echo $directincome; ?>"/>
											
                                        </div>
                                    </div>

	
									<div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Total Partner Income</label>
                                        <div class="col-md-6 col-xs-6">
                                            <input type="text"  placeholder="Partner Income" class="form-control" value="<?php echo $partnerincome; ?>"/>
											
                                        </div>
                                    </div>

	
									<div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Total Second Partner Income</label>
                                        <div class="col-md-6 col-xs-6">
                                            <input type="text" placeholder="Second Partner Income" class="form-control" value="<?php echo $secondpartnerincome; ?>"/>
											
                                        </div>
                                    </div>
<div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Total API Income</label>
                                        <div class="col-md-6 col-xs-6">
                                            <input type="text" placeholder="Api Income" class="form-control" value="<?php echo $apiincome; ?>"/>
											
                                        </div>
                                    </div>

<div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Total Income</label>
                                        <div class="col-md-6 col-xs-6">
                                            <input type="text"  id="topupuserid" placeholder="Total Income" class="form-control" value="<?php echo $totalincome; ?>"/>
											
                                        </div>
                                    </div>


<div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Total Paid</label>
                                        <div class="col-md-6 col-xs-6">
                                            <input type="text"  id="topupuserid" placeholder="Total Paid" class="form-control" value="<?php echo $debit?>"/>
											
                                        </div>
                                    </div>



<div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Total Due</label>
                                        <div class="col-md-6 col-xs-6">
                                            <input type="text"  id="topupuserid" placeholder="Total Due" class="form-control" value="<?php echo $due; ?>"/>

		
                                        </div>
                                    </div>



<div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Enter Amount</label>
                                        <div class="col-md-6 col-xs-6">
                                            <input type="number" class="form-control" name="TotalAmount" id="enteramount" reqiured/>

		
                                        </div>
                                    </div>


<div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Payable After Deduction 10%</label>
                                        <div class="col-md-6 col-xs-6">
                                            <input type="text" id="showamount" class="form-control" readonly/>

		
                                        </div>
                                    </div>


<div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Mode Of Payment</label>
                                        <div class="col-md-6 col-xs-6">
                                            <select name="PayMode" class="form-control">
<option value="Cash">Cash</option>
<option value="Cheque">Cheque</option>
<option value="Neft">Neft</option>
</select>
		
                                        </div>
                                    </div>


<div class="form-group">
                                        <label class="col-md-6 col-xs-6 control-label">Transaction Number</label>
                                        <div class="col-md-6 col-xs-6">
                                            <input type="text" class="form-control" name="TranID" id="enteramount" reqiured/>

		
                                        </div>
                                    </div>


				 			
									
									
									<div class="form-group">
									<label class="col-md-6 col-xs-6 control-label"></label>
                                        <div class="col-md-6 col-xs-6">
                                            <button type="submit" name="pay" class="btn btn-danger">Pay</button>
                                        </div>
                                       
                                    </div>	
								   
								  
									
									
                                                                           
                                    
                                </div>
                            </div>
                            </form>



                                </div>								
                                    
                                  
                  
                                </div>
                                
                            </div>
                            </form>
                            
                        </div>



   <div class="col-md-6">
                            
                            <form class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">


								<div class="panel-body col-md-6 col-xs-12">
                                    <h2>Pan Card And Adhar Card</h2>

<?php

$userdata=$obj->get_one_record("select * from Registration where UserID='".$userid."'");
$userdata=$userdata[0];

?>
 


<a href="https://lenahai.com/agency/userpanel/users/<?php echo $userdata['pancardpic']; ?>" target="_blank"><img src="https://lenahai.com/agency/userpanel/users/<?php echo $userdata['pancardpic']; ?>" style="height:300px;width:220px;"> </a><a href="https://lenahai.com/agency/userpanel/users/<?php echo $userdata['adharpic']; ?>" target="_blank"><img src="https://lenahai.com/agency/userpanel/users/<?php echo $userdata['adharpic']; ?>" style="height:300px;width:220px;"></a>

<br>

<h3>Bank Name :- <?php echo $userdata['Bank_Name']; ?></h3>
<h3>Bank Address :- <?php echo $userdata['Branch_Name']; ?></h3>
<h3>Account No :- <?php echo $userdata['Bank_Acc_No']; ?></h3>
<h3>Account Holder :- <?php echo $userdata['Acc_Holder_Name']; ?></h3>
<h3>IFSC Code :- <?php echo $userdata['IFSC_Code']; ?></h3>

                                </div>								
                                    
                                  
                  
                                </div>
                                
                            </div>
                            </form>
                            
                        </div>


 <div class="col-md-6">
                            
                            <form class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">


								<div class="panel-body col-md-8 col-xs-12">
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
                                                    <th>User ID</th>
                                                    <th>Amount/Payable</th>
                                                    
                                                    <th>Date</th>
                                                    <th>Pay Mode</th>
                                                    <th>Tran ID</th>
						    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
											
											
											
											<?php



$query2 = "SELECT * FROM payments WHERE UserID = '".$userid."' and PayMode!=''"; 				 
														 $data=$obj->get_one_record($query2);
														


												
													
													foreach($data as $val)
													{
														 
														 
														
												?>
											
											
										
											
											
                                                <tr>
                                                    <td><?php echo $val['UserID']; ?></td>
 <td>Rs. <?php echo $val['TotalAmount']; ?><br>
Rs. <?php echo $val['TotalAmount']*90/100; ?></td>
 <td><?php echo $val['PaymentDate']; ?></td>
 <td><?php echo $val['PayMode']; ?></td>
 <td><?php echo $val['TranID']; ?><br>
<a href="chart.php?id=<?php echo $val['WithID']; ?>&&userid=<?php echo $val['UserID'];?>" onClick="return confirm('Do you really want to delete Tran ID <?php echo $val['TranID']; ?>?')">Delete</a>
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
                                
                            </div>
                            </form>
                            
                        </div>





                    </div>
                   
                    
                   
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
       
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
   <?php include'footer.php' ?>