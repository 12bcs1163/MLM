<?php include'head.php' ?> 



           <div class="page-title">                    
                    <h2><span class="fa fa-dollar"></span> Renew History</h2>
                </div>

               <div class="page-content-wrap">
                    
                    
                    
                    <div class="row">             
         		           
         
         
         
         
         			 <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Account History</h3>
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
 <th>User ID</th>
                                                    <th> Ref No</th>
                                                    <th>Value Date</th>
                                                   
						<th style="color:#F51715;">Debit</th> 
						 
                                                </tr>
                                            </thead>
                                            <tbody>
											
											
											<?php
											$sno=1;
											
											$data = $obj->get_one_record("select * from payments where PaymentMode='Fund' and TotalAmount='1000' and PayMode='' order by WithID DESC");
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
<td><?php echo $val['UserID']; ?> </td>
                                                    <td><?php echo $val['TranID']; ?> </td>
                                                    <td><?php echo $val['PaymentDate']; ?></td>                                                   
                                              
												  <td style="color:#F51715;"><strong> <?php echo $debit; ?></strong> </td>
                                                  
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
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
     
                    
                    
                   
                    </div>
                   
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
     
        
                    
                    
                    
                    
                    
                    

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
                    
                               
                        
                        
                          
        
   <?php include'footer.php' ?>