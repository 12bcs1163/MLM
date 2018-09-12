<?php
session_start();



if(empty($_SESSION['user_array']) || $_SESSION['user_array']['UserID']!="admin"){

header("location: index.php");
die;

}
include("Mysqli/Memberclass.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>        
        <!-- META SECTION -->
        <title>Administrator</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->        
        
       
        	<script>
function myFunction() {
  return confirm("Do you really want to delete this entry !");
}
</script>
        	
    
                          
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                  <li class="xn-logo">
                      
                    </li>
					
					 <!-- 
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/avatar.jpg" alt="Image"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/avatar.jpg" alt="Image"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">Client Name</div>
                                <div class="profile-data-title">Id No : </div>
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li> 
                    <li class="xn-title">Navigation</li> -->                   
                    <li  class="xn-openable">
                        <a href="indexx.php"><span class="fa fa-desktop"></span> <span class="xn-text">Profile</span></a> 
						<ul>
                                    <li><a href="indexx.php"><span class="fa fa-inbox"></span>Dashbord</a></li>
                             <li><a href="changepassword.php"><span class="fa fa-inbox"></span>Change Password</a></li>
                                    <li><a href="allusers.php"><span class="fa fa-pencil"></span>All Users</a></li>

			
                                </ul>

						
                    </li>

 
			
                    
                

             
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Incomes</span></a>
                        <ul>
                           

<li><a href="bineryrequests.php"><span class="fa fa-pencil"></span>Due Income</a></li>
<li><a href="approvedrequests.php"><span class="fa fa-pencil"></span>Paid Income</a></li>
<li><a href="pension.php"><span class="fa fa-pencil"></span>Silver Achiever</a></li>
		<li><a href="pension2.php"><span class="fa fa-pencil"></span>Prince Achiever</a></li>							 

                        </ul>
                    </li> 
              
              
              
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-inr"></span> <span class="xn-text">Rewards</span></a>
                        <ul>
                           

<li><a href="#"><span class="fa fa-pencil"></span>Due Rewards</a></li>
<li><a href="#"><span class="fa fa-pencil"></span>Paid Rewards</a></li>
								 
							 
	
							 
                           
                        </ul>
                    </li> 
                  
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-table"></span> <span class="xn-text">Generate Funds</span></a>
                        <ul>                            
                           <li><a href="admingenratefund.php"><span class="fa fa-align-justify"></span>Generate Fund</a></li>                            
													
                        </ul>
                    </li>

 <li class="xn-openable">
                        <a href="#"><span class="fa fa-table"></span> <span class="xn-text">Registration Pins</span></a>
                        <ul>                            
                           <li><a href="admingeneratepin.php"><span class="fa fa-align-justify"></span>Generate Pins</a></li>                            
													
                        </ul>

                    </li>

 <li class="xn-openable">
                        <a href="#"><span class="fa fa-table"></span> <span class="xn-text">Funds</span></a>
                        <ul>                            
                           <li><a href="accounthistory.php"><span class="fa fa-align-justify"></span>Account History</a></li>  
                      
													
                        </ul>
                    </li>
                    
             
                                       
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH 
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="signout.php" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->
                    
                    
                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL --> 