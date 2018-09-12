<?php include'head.php' ?>
<?php

if(isset($_POST['uploadpayment']))
{
	$obj->upload_payment(array_filter($_POST));
}

if(!empty($_GET['id']))
{
    
    $obj->mysqli2->query("delete from admincontest where uniqueid='".$_GET['id']."'");
    
    
}

?>

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>CONTEST REQUEST</h2>
					
						
					</header>


					<!-- start: page -->
					<div class="row">


 

   
					
						
						<div class="col-md-12">

						
							<div class="panel-body">
<h2> REQUEST</h2>
					
										  <form class="form-horizontal " method="post" action="" enctype="multipart/form-data">


   <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Target Agency</label>
                                        <div class="col-md-5 col-xs-5">
                                           <input type="number" name="targeta" class="form-control"  >
                                            
                                        </div>
                                    </div>
                                    
                                   
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Start Date</label>
                                        <div class="col-md-5 col-xs-5">
                                           <input type="text" name="startdate" class="form-control" value="<?php echo date('m/d/Y'); ?>" id="dp-4" >
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">End Date</label>
                                        <div class="col-md-5 col-xs-5">
                                           <input type="text" name="enddate" class="form-control" value="<?php echo date('m/d/Y'); ?>" id="dp-4" >
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Banner</label>
                                        <div class="col-md-5 col-xs-5">
                                         <input type="file" class="fileinput" name="cphoto" id="Slip" required> 
                                            
                                        </div>
                                    </div>
                                    
                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Type</label>
                                        <div class="col-md-5 col-xs-5">
                                           <select name="ctype" class="form-control select">
                                           
<option>Direct Sales</option>
<option>Team Sales</option>
                                           </select>
                                            
                                        </div>
                                    </div>
                                 
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5" id="myformdata">
                                           <button type="submit" class="btn btn-success" name="uploadpayment" >
                                            
                                           SEND</button>
                                        </div>
                                    </div>


											
										</form>
							</div>
						</div>
							
					</div>
				
				 <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="color:#000;"> History</h3>
                                                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="customers2" class="table datatable">
                                            <thead>
                                                <tr>
												 <th>Serial No.</th>
												  <th>Target Agencies</th>
                                                   
                                                  <th>Start Date</th>
  <th>End Date</th>
                                                   
													 <th>Banner</th>
													  <th>Type</th>
													  
                                                  
                                                 
                                                </tr>
                                            </thead>
                                            <tbody>
											
											<?php
											$sno=1;
											$data = $obj->get_one_record("select * from admincontest order by uniqueid DESC");
											foreach($data as $val)
											{
											    
											   
											
											?>
											
                                                <tr>
												 <td><?php echo $sno++; ?></td>
                                                   <td><?php echo $val['targeta']; ?></td>
                                                    <td><?php echo $val['startdate']; ?></td>
 <td><?php echo $val['enddate']; ?></td>
                                                    <td><a href="../banner/<?php echo $val['cphoto']; ?>" target="_blank"> Show Banner</a>
                                                    <br>
                                                    
                                                    <a href="admincontest.php?id=<?php echo $val['uniqueid']; ?>"><button class="btn btn-danger">Delete</button></button>
                                                    </td>
													
                                                 <td><strong><?php echo $val['ctype']; ?> </strong></td>
												 
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
				
					<!-- end: page -->
				</section>
			</div>

		
		</section>
<?php include'footer.php' ?>