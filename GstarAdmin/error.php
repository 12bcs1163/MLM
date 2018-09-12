<div class="row">
                        <div class="col-md-12">
                            <div class="alert" role="alert" id="error" style="display:none;">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                               <strong>Important!</strong>  <span id="showerror"></span>
                            </div>                            
                        </div>
                    </div>      
					
					
					<?php
					
					if(!empty($obj->flash))
					{
					
					
					?>
					<div class="row">
                        <div class="col-md-12">
                            <div class="alert" role="alert" >
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                               <strong>Important!</strong>  <span > <?php echo $obj->flash; ?></span>
                            </div>                            
                        </div>
                    </div>    
					
					
					<?php
					}
					
					?>