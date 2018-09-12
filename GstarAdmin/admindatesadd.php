<?php include'head.php' ?>
             
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Holidays</h2>
                </div>
                <!-- END PAGE TITLE -->   
				
				<?php


if(isset($_POST['update']))
{
$_POST['update']="";

$id=$_GET['newsid'];
	 $obj->update_dates(array_filter($_POST),$id);

	echo '
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                <strong>MESSAGE ! </strong>'.$obj->flash.'
                            </div>                            
                        </div>
                   ';
}




if(isset($_POST['generate']))
{
$_POST['generate']="";


	 $obj->create_date(array_filter($_POST));

	echo '
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                <strong>MESSAGE ! </strong>'.$obj->flash.'
                            </div>                            
                        </div>
                   ';
}


?>
                 
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
					
					
					<?php
					
					if(empty($_GET['newsid'])){
					
					?>
					
					<div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Add New Date: </h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                   
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Date</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="01" class="form-control" name="holidate" reqiured/ >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Month</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="03" class="form-control" name="holimonth" reqiured/ >
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Year</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="2015" class="form-control" name="holiyear" reqiured/ >
                                        </div>
                                    </div>
								
									
									
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="generate"> SAVE </button>
                                        </div>
                                       
                                    </div>
									
									
                                 
                                </div>
                            </div>
                            
                                                                      
                                    </form>
                            

                        </div>
						
						
						<?php
						}
						else{
						$data1 = $obj->get_one_record("select * from holidays where holiid='".$_GET['newsid']."'");
						$data1=$data1[0];
						$holidate=$data1['holidate'];
						$holimonth=$data1['holimonth'];
						$holiyear=$data1['holiyear'];
						
						?>
						
						
						
						
						
						<div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Update Date : </h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                   
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Date</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="01" class="form-control" name="holidate" value="<?php echo $holidate; ?>" reqiured/ >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Month</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="01" class="form-control" value="<?php echo $holimonth; ?>" name="holimonth" reqiured/ >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Year</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="2015" class="form-control" value="<?php echo $holiyear; ?>" name="holiyear" reqiured/ >
                                        </div>
                                    </div>
								
									
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="update"> SAVE </button>
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
                                    <h3 class="panel-title">All News</h3>
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
                                                    <th>Date</th>
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    
													<th>Update</th>
                                                    
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
											
											<?php
											
											$data = $obj->get_one_record("select * from holidays");
											//print_r($data);
											foreach($data as $val)
											{
											
											?>
											
                                                <tr>
                                                    <td><?php echo $val['holidate']; ?></td>
                                                    <td><?php echo $val['holimonth']; ?></td>
                                                    <td><?php echo $val['holiyear']; ?> </td>
                                                   
                                                    <td> <a href="admindatesadd.php?newsid=<?php echo $val['holiid']; ?>"><button type="button" class="btn btn-danger" name="generate"> UPDATE </button></a></td>
                                                     
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