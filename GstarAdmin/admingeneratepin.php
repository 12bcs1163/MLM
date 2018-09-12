<?php include'head.php' ?>       


           <div class="page-title">                    
                    <h2><span class="fa fa-cogs"></span> Generate Url</h2>
                </div>
<?php

if(isset($_POST['generate']))
{

	 $obj->create_pin($_POST);

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
               <div class="page-content-wrap">
                    
                       
                    
                    <div class="row">                        
                        <div class="col-md-1 col-sm-1 col-xs-12">
                            
                           
                            
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            
                            <form action="" method="post" class="form-horizontal ">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Generate Pin : </h3>
                                </div>
                                <div class="panel-body form-group-separated">
								
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5"></div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">User ID</label>
                                        <div class="col-md-5 col-xs-5">  <input type="text" placeholder="User ID" class="form-control" name="userID" value="admin" readonly/ ></div>
                                    </div>
								
									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">No Of Urls</label>
                                        <div class="col-md-5 col-xs-5">
                                            <input type="text" placeholder="No Of Urls" class="form-control" name="numbers" reqiured/ >
                                        </div>
                                    </div>
									
									 <input type="hidden" placeholder="Amount" class="form-control" name="amount" value="1000" / >
									
									
									
									
                                    
									<div class="form-group">
									<label class="col-md-3 col-xs-5 control-label"></label>
                                        <div class="col-md-5 col-xs-5">
                                            <button type="submit" class="btn btn-danger" name="generate">Generate</button>
                                        </div>
                                       
                                    </div>
									
									
                                 
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