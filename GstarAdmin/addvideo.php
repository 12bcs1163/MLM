<?php include'head.php' ?>
             
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Videos</h2>
                </div>
                <!-- END PAGE TITLE -->   
				
				<?php

if(!empty($_GET['delid']))
{
$obj->mysqli2->query("delete from todaywork where vidID='".$_GET['delid']."'");
$obj->flash="successfully deleted !";
}


if(isset($_POST['update']))
{
$_POST['update']="";


$id=$_GET['vidid'];
	 $obj->update_vid(array_filter($_POST),$id);

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

	 $obj->insert_data("todaywork",array_filter($_POST));
	 $obj->flash="Successfully Inserted Video";

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
					
					if(empty($_GET['vidid'])){
					
					?>
					
					<div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Add Video: </h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                   
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Video Url</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="Url" class="form-control" name="vidurl" reqiured/ >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Video Image Url</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="Image Url" class="form-control" name="vidimg" reqiured/ >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Video Date</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" value="<?php echo $obj->today_date_only; ?>" class="form-control" name="viddate" reqiured/ >
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
						$data1 = $obj->get_one_record("select * from todaywork where vidID='".$_GET['vidid']."'");
						$data1=$data1[0];
						$title=$data1['vidurl'];
						$img=$data1['vidimg'];
						$Description=$data1['viddate'];
						
						
						?>
						
						
						
						
						
						<div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Update Video : </h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                   
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">video url</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="Url" class="form-control" name="vidurl" value="<?php echo $title; ?>" reqiured/ >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">video image url</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="Image Url" class="form-control" name="vidimg" value="<?php echo $img; ?>" reqiured/ >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">video date</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="" name="viddate" class="form-control" value="<?php echo $Description; ?>" name="InterestRate" reqiured/ >
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
                                    <h3 class="panel-title">All Videos</h3>
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
                                                <th>Serial No</th>
                                                    <th>Url</th>
                                                    
                                                    <th>Date</th>
                                                    
													<th>Update</th>
													<th>Delete</th>
                                                    
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
											
											<?php
											
											$data = $obj->get_one_record("select * from todaywork order by vidID DESC");
											//print_r($data);
											$sno=1;
											foreach($data as $val)
											{
											
											?>
											
                                                <tr>
                                                 <td><?php echo $sno++; ?></td>
                                                    <td><?php echo $val['vidurl']; ?></td>
                                                   
                                                    <td><?php echo $val['viddate']; ?> </td>
                                                   
                                                    <td> <a href="addvideo.php?vidid=<?php echo $val['vidID']; ?>"><button type="button" class="btn btn-danger" name="generate"> UPDATE </button></a></td>
                                                     <td> <a href="addvideo.php?delid=<?php echo $val['vidID']; ?>"><button type="button" class="btn btn-danger" name="generate"> DELETE </button></a></td>
                                                     
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