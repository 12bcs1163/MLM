<?php include("header.php"); ?>
 <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Team</li>
          </ol>
          <h6 class="slim-pagetitle">Account Overall</h6>
        </div><!-- slim-pageheader -->


        <div class="section-wrapper mg-t-20">
          <label class="section-title">Account Details</label>
          <p class="mg-b-20 mg-sm-b-40">list of all transactions of my account.</p>

          <div class="table-responsive">
            <table class="table mg-b-0">
           										<thead>
										<tr>
											<th>Date</th>
											<th>Details</th>
											<th>Credit</th>
										<th>Debit</th>
										</tr>
									</thead>
									<tbody>
									
										
										
										
										
										<?php
										
				$tcredit=0;
				$tdebit=0;
										//ROI Income
										
										
											$sno=1;
											
											$data = $obj->get_one_record("SELECT * FROM payments WHERE UserID like '".$obj->userID."' order by WithID DESC");
											
											
											
											
											foreach($data as $val)
											{

if(empty($val['TranType'])){
    $credit="-";
    $debit=$val['TotalAmount'];
    
}else{
 $credit=$val['TotalAmount']; 
 $debit="-";
}
		?>						
						
						
						
						
				 <tr class="gradeX">
						
                                                  
                                                    <td><?php echo $val['PaymentDate']; ?></td>
                                  
                                                 <td><?php echo $val['PaymentType']; ?></td>
												
                                                    <td><span style="color: green;"> <?php echo "$"." ".$credit; ?></span></td>
										   <td> <span style="color: red;"><?php echo  "$"." ".$debit; ?></span></td>
                                                  
                                                </tr>
				
				<?php
				
				
				}
				
				?>
										
									
						
							
									</tbody>
								</table>
								 
          </div><!-- table-responsive -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

<?php include("footer.php"); ?>