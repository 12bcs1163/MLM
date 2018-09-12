<?php include'head.php' ?>
             
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Ad Panel</h2>
                </div>
                <!-- END PAGE TITLE -->   
				
				<?php



if(isset($_POST['generate']))
{


$numbers=$_POST['transfer'];
foreach($numbers as $val)
{
$array=array();

$array['TimeStr']=strtotime($_POST['DateTime']);
$array['DateTime']=date('F j, Y',$array['TimeStr']);
$array['userID']=$val;
$array['CaptchaCode']=rand();

	$obj->insert_data("dailygrowth",$array);

}

$obj->flash="Successfully Updated";
	 
	
}


?>
                 
                  <form action="" method="post" class="form-horizontal ">
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                    <?php
					include("error.php");
					
					?>
					
					<div class="col-md-10 col-sm-10 col-xs-12">
                            
                          
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span>Work Done : </h3>
                                </div>
                               
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Ad Date</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="date" placeholder="Date" class="form-control" name="DateTime" value="<?php echo $obj->today_date_only; ?>" reqiured/ >
                                        </div>
                                    </div>
									
								
									
									
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="generate"> COMPLETE WORK </button>
                                        </div>
                                       
                                    </div>
									
					<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                           
                                        </div>
                                       
                                    </div>				
                                 
                                </div>
                            </div>
                            
                                                                      
                                 
                            

                        </div>
						
						
						
						
					
					                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">All Un Used Urls</h3>
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
                                        <table id="customers2" style="width:100%">
                                            <thead>
                                                <tr>
												<th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Reg Date</th>
                                                  <th>Mobile Number</th>
                                                   
													
                                                  
                                                   <th>CheckBox</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
											
											<?php
											
											$data = $obj->get_one_record("select * from Registration where DirectID='".$_GET['id']."'");
											//echo $obj->userID;
											foreach($data as $val)
											{
											
											$data2 = $obj->get_one_record("select * from dailygrowth where userID='".$val['UserID']."' and DateTime='".$obj->today_date_only."'");
											if(empty($data2)){
											?>
											
                                                <tr>
												 <td><?php echo $val['UserID']; ?></td>
                                                    <td><?php echo $val['FirstName']; ?></td>
                                                     <td><?php echo $val['RegistrationDate']; ?></td>
                                                   
                                                    <td><?php echo $val['MobileNo']; ?></td>
                                                  <td><input type="checkbox" name="transfer[]" value="<?php echo $val['UserID']; ?>"></td>                                                  
                                                </tr>
                                             
											 <?php } } ?>
											 
                                               
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
                
                   </form>
                
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