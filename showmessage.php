<?php
					
					if(!empty($obj->flash))
					{
					
					
					?>	
					
					<div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert" >
                               
                               <strong>Important!</strong>  <span > <?php echo $obj->flash; ?></span>
                            </div>                            
                        </div>
                    </div>    
					
					
					<?php
					}
					
					?>