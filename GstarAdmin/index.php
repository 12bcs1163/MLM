<?php
session_start();
if(!empty($_SESSION['user_array'])){
header("location: indexx.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    

<head>        
        <!-- META SECTION -->
        <title>Administrator</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
       
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->    
    </head>
    <body>
        
        <div class="registration-container">            
            <div class="registration-box animated fadeInDown">
               <div class="registration-logo animated zoomIn"></div>
                <div class="registration-body">
                    <div class="registration-title"><strong>Login</strong></div>
					<?php
					if(!empty($_GET['error'])){
					?>
                    <div class="registration-subtitle" style="color:#FF3300;">Please Fill Login Detail Correctly </div>
					<?php } ?>
                    <form action="login_check.php" class="form-horizontal" method="post">
                        
                    <h4>Login Detail</h4>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="UserID" placeholder="Username" required/>
                        </div>
                    </div>
                        <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="Password" placeholder="Password" required />
                        </div>
                    </div>
                      <div class="col-md-6">
                            <button class="btn btn-danger btn-block" type="submit" name="submit">Login</button>
                        </div>
                    </div>
                    </form>
                </div>
                
            </div>
            
        </div>
        
    </body>


</html>





