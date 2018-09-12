<?php include("header.php"); ?>
 <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Team</li>
          </ol>
          <h6 class="slim-pagetitle">Direct Sponsor</h6>
        </div><!-- slim-pageheader -->


        <div class="section-wrapper mg-t-20">
          <label class="section-title">Direct sponsor users</label>
          <p class="mg-b-20 mg-sm-b-40">list of all users direct sponsored by you.</p>

          <div class="table-responsive">
            <table class="table mg-b-0">
           	 <thead>
                                                <tr>
												<th>Serial No.</th>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                   
                                                    <th>Date of Joining</th>
                                                   
                                                    <th>Cell No.</th>
													 <th>Status</th>
													  <th>Silver Pool</th>
                    <th>Prince Pool</th>
                
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
											
											
											
											<?php
												$sno=1;
$closing=0;
$tb=0;
$td=0;
$btcclosing=0;
													$data = $obj->get_one_record("select * from Registration where DirectID='".$obj->userID."' order by Id DESC");
													foreach($data as $val)
													{
													    
												
												?>
											
											
										
											
											
                                                <tr>
												 <td><?php echo $sno++; ?></td>
                                                    <td><?php echo $val['UserID']; ?></td>
                                                    <td><?php echo $val['FirstName']; ?> <?php echo $val['LastName']; ?></td>
                                                  
                                                    <td><?php echo $val['RegistrationDate']; ?></td>
                                  
                                                    <td><?php echo $val['MobileNo']; ?></td>
												
                                                   
                                                    <td>
                                                   
                                                        
                                                        <?php echo "<span class='label label-default'>".$val['PaidStatus']."</span>"; ?>
                                                        
                                                      
                                                        </td>
                                                        
                                                        
                                                             <td><?php if(!empty($val['sliverpoolstatus'])){ echo "<img src='img/ok.png' style='height:30px;width:30px;'>"; }else{ echo "<img src='img/cross.png' style='height:30px;width:30px;'>"; } ?></td>
                  
                  
                     <td><?php if(!empty($val['princepoolstatus'])){ echo "<img src='img/ok.png' style='height:30px;width:30px;'>"; }else{ echo "<img src='img/cross.png' style='height:30px;width:30px;'>"; } ?></td>
                  
                  
                                                        
                                                </tr>
												
												<?php } ?>
												
												
                                                
                                            </tbody>
								</table>
          </div><!-- table-responsive -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

<?php include("footer.php"); ?>