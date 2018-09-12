<?php include'head.php' ?>
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> All Top Ups</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                    <?php
                    
                    
                    	if(isset($_POST['update']))
                    	{
                    	$pamount=$_POST['pamount'];
                    	$dueamount=$_POST['DueAmount'];
                    	$tamount=$pamount+$dueamount;
                    	$in=$_POST['in'];
                    	
                    		if($obj->mysqli2->query("update Commitment set PaidAmount='$tamount' where CommitID='".$_GET['CommitID']."'"))
                    		{$obj->flash="Successfuly Paid Sum Amount :- ".$tamount." To Investment No :- ".$in;}
                    	
                    	}
                    
                    
                    ?>
                    
                    <?php include("error.php"); ?>
                    
                    
                    <?php
					
					if(!empty($_GET['CommitID'])){
					
		
						$data1 = $obj->get_one_record("select * from Commitment where CommitID='".$_GET['CommitID']."'");
						$val=$data1[0];
						
						$userid=$val['UserID'];
						$commitment=$val['Commitment'];
						$pamount=$val['TotalAmount'];
						
						
						
						
						
						
						//Get Due Amount
						
						
						$days = $obj->calculateDiffrence2($val['DateTime'],$obj->today_date);
												
												
												
												$data2 = $obj->get_one_record("select * from pin_info where  OrderID='".$val['CommitID']."'");
												
												//print_r($data2);
												
											$leftdays=0;
											$leftdays1=0;
												error_reporting(false);
												$totaldays=$data2[0]['Days'];
												$nowdays=$days;
												$d1=0;
												$mydayleft=0;
												for($i=0;$i<$days;$i++)
												{
												
													$date1=get_date($i);
												$holidate=$date1['date'];
												$holiyear=$date1['year'];										
												$holimonth=$date1['month'];
												$date=$date1['fulldate'];
												
												
												$holidata = $obj->get_one_record("select * from holidays where holidate='".$holidate."' and holimonth='".$holimonth."' and holiyear='".$holiyear."'");
											if(!$holidata){
											$mydayleft++;
			$leftdays1=$nowdays-$i;
			$leftdays=$totaldays-$leftdays1;
			
											$d1+=$val['TotalAmount']*$data2[0]['Interest']/100;
											$in=$d1*5/100; 
											//echo $d=$d1-$d;
											}
											
													}
													
													if(empty($leftdays)){$leftdays=$totaldays;}
													$due=$d1-$val['PaidAmount'];
						
						
						
						
						
						
						?>
						
						
						
						
						
						<div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Pay Daily Bonus : </h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                   <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">User ID</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" class="form-control"  value="<?php echo $userid; ?>" readonly/ >
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Investment Number</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" class="form-control" name="in"  value="<?php echo $commitment; ?>" readonly/ >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Principal Amount</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" class="form-control"  value="<?php echo $pamount; ?>" readonly/ >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Paid Amount</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" class="form-control" name="pamount"  value="<?php echo $val['PaidAmount']; ?>" readonly/ >
                                        </div>
                                    </div>
									
								<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Due Amount</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" class="form-control" name="DueAmount" value="<?php echo $due; ?>" reqiured/ >
                                        </div>
                                    </div>
									
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="update"> PAY </button>
                                        </div>
                                       
                                    </div>
									
									
                                 
                                </div>
                            </div>
                            
                                                                      
                                    </form>
                            

                        </div>
					
					
					<?php } ?>
                    
                    
                    
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">All Top Ups</h3>
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
                                        <table id="customers2" class="table datatable"> <!--  -->
                                            <thead>
										
                                                <tr>
                                                   
                                                    <th>Date</th>
                                                     <th>User ID</th>
                                                    <th>Investment Number</th>
													 <th>Principal Amount</th>
													<th>Profit</th>
													<th>Deduction 5%</th>
													<th>Total Amount</th>
													<th>Paid Amount</th>
													<th>Due Amount</th>
													<th>Pass Days</th>
													<th>Total Days</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											
											<?php
											
											function get_date($i)
											{
											
											error_reporting(false);
											//echo strtotime("-".$i." days");
											
											$date=array();
											
												if(date('Y-m-d',strtotime("-".$i." days")))
												{
												$date['fulldate']=date('Y-m-d',strtotime("-".$i." days"));
												$date['date']=date('d',strtotime("-".$i." days"));
												$date['month']=date('m',strtotime("-".$i." days"));
												$date['year']=date('Y',strtotime("-".$i." days"));
												
													return $date;
												}else{ return null; }
											
											}
											
											$data = $obj->get_one_record("select * from Commitment where  CommitmentStatus='Active'");
											
											
											
											
											foreach($data as $val)
											{
											
												$days = $obj->calculateDiffrence2($val['DateTime'],$obj->today_date);
												
												
												
												$data2 = $obj->get_one_record("select * from pin_info where  OrderID='".$val['CommitID']."'");
												
												//print_r($data2);
												
											$leftdays=0;
											$leftdays1=0;
												error_reporting(false);
												$totaldays=$data2[0]['Days'];
												$nowdays=$days;
												$d1=0;
											$mydayleft=0;
												for($i=0;$i<$days;$i++)
												{
												
													$date1=get_date($i);
												$holidate=$date1['date'];
												$holiyear=$date1['year'];										
												$holimonth=$date1['month'];
												$date=$date1['fulldate'];
												
												
												$holidata = $obj->get_one_record("select * from holidays where holidate='".$holidate."' and holimonth='".$holimonth."' and holiyear='".$holiyear."'");
											if(!$holidata){
											$mydayleft++;
			$leftdays1=$nowdays-$i;
			$leftdays=$totaldays-$leftdays1;
			
											$d1+=$val['TotalAmount']*$data2[0]['Interest']/100;
											$in=$d1*15/100; 
											//echo $d=$d1-$d;
											}
											
													}
													
													if(empty($leftdays)){$leftdays=$totaldays;}
													$due=$d1-$val['PaidAmount'];
													?>
													
													
													   <tr>
                                                    
                                                    <td><?php echo $val['DateTime']; ?></td>
                                                     <td><?php echo $val['UserID']; ?></td>
                                                    <td><?php echo $val['Commitment']; ?></td>
													 <td><?php echo $val['TotalAmount']; ?></td>
													<td><?php echo $d1; ?></td>
													<td><?php echo $in=$d1*5/100; ?></td>
													<td><?php echo $d1-$in; ?></td>
													<td><?php echo $val['PaidAmount']; ?></td>
													<td><?php echo $due; if($due>0){
													
													echo "<br>";
													echo '<a href="all-tops.php?CommitID='.$val['CommitID'].'">Click For Pay</a>';
													
													} ?></td>
													<td><?php echo $mydayleft; ?></td>
													<td><?php echo $totaldays; ?></td>
                                                </tr>
													
													<?php
													
												}
												?>
												
												
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