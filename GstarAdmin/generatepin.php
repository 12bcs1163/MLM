<?php include'head.php' ?>       


           <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> Generate Pin</h2>
                </div>

               <div class="page-content-wrap">
                    
                       
                    
                    <div class="row">                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                            
                           
                            
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="#" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Generate Pin : </h3>
                                </div>
                                <div class="panel-body form-group-separated">
								<form>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Wallet Balance</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" value="0 INR" class="form-control" readonly/>
                                        </div>
                                    </div>
								
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">No Of Pins</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="No Of Pins" class="form-control" reqiured/>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Amount</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="Amount" class="form-control" reqiured/>
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">E-Pin Type</label>
                                            <div class="col-md-5 col-xs-5">                                                                                
                                                <select class="form-control select" data-live-search="true">
													<option value="Silver" >Silver</option>
													<option value="Gold" >Gold</option>
													<option value="Daimond" >Daimond</option>
													<option value="Platinum" >Platinum</option>
													
                                                </select>
                                            </div>
                                        </div>
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger">Generate</button>
                                        </div>
                                       
                                    </div>
									
									
                                                                           
                                    </form>
                                </div>
                            </div>
                            </form>
                            
                            

                        </div>
                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                    
                        </div>
                        
                    </div>
                    

                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        
        
        <!-- BLUEIMP GALLERY -->
            
        <!-- END BLUEIMP GALLERY -->        
        
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                      
        
   <?php include'footer.php' ?>