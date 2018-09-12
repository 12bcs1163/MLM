<?php
include("package/Memberclass.php");
if(empty($_SESSION['User_Array'])){ ?><meta http-equiv="refresh" content="0; url=login.php" /> <?php  exit(); }

//$userdata=$_SESSION['User_Array'];
$userdata=$obj->loaduserinfo();


$mypath=$_SERVER['SCRIPT_NAME'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Slim">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/slim/img/slim-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/slim">
    <meta property="og:title" content="Slim">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>G Star Marketing Admin</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">   
    <link href="lib/rickshaw/css/rickshaw.min.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="css/slim.css">
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="js/myjs.js"></script>

  </head>
  <body class="dashboard-3">
    <div class="slim-header">
      <div class="container">
        <div class="slim-header-left">
          <h2 class="slim-logo"><a href="index.html"><img src="img/logo.png"></a></h2>

          
        </div><!-- slim-header-left -->
        <div class="slim-header-right">

        
          <div class="dropdown dropdown-c">
            <a href="#" class="logged-user" data-toggle="dropdown">
              <img src="user.png" alt="">
              <span style="color: #fff"><?php echo $userdata['FirstName']; ?></span>
              <i class="fa fa-angle-down" style="color: #fff"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <nav class="nav">
              
                <a href="profile.php" class="nav-link"><i class="icon ion-compose"></i> Edit Profile</a>
              
               <!-- <a href="#" class="nav-link"><i class="icon ion-ios-upload-outline"></i> Upload KYC</a> -->
               <!-- <a href="bank.php" class="nav-link"><i class="icon ion-ios-gear"></i> Bank Details</a>-->
                <a href="signout.php" class="nav-link"><i class="icon ion-locked"></i> Sign Out</a>
               
              </nav>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </div><!-- header-right -->
      </div><!-- container -->
    </div><!-- slim-header -->

    <div class="slim-navbar">
      <div class="container-fluid">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">
              <i class="icon ion-ios-speedometer-outline"></i>
              <span>Dashboard</span>
            </a>
           
          </li>
          
          <li class="nav-item with-sub">
            <a class="nav-link" href="#">
              <i class="icon ion-card"></i>
              <span>My Wallet</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="binary.php">Business Details</a></li>
               
                <li><a href="#">Withdrawl</a></li>
                
               
              </ul>
            </div><!-- dropdown-menu -->
          </li>

          

          <li class="nav-item  with-sub">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="icon ion-android-contacts"></i>
              <span>My Circle</span>
              </a>
              <div class="sub-item">
              <ul>
                <li><a href="direct.php">My Direct Sponsor</a></li>                
                <li><a href="leftteam.php">My Left Team</a></li> 
                
                  <li><a href="rightteam.php">My Right Team</a></li>
                <li><a href="tree.php">My Network Tree</a></li>                
                             
              </ul>
            </div><!-- dropdown-menu -->
            
          </li>

          <li class="nav-item  with-sub">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="icon ion-social-dropbox"></i>
              <span>My Fund</span>
              </a>
              <div class="sub-item">
              <ul>
                <li><a href="accounttopup.php">Top Up</a></li>                
                      <li><a href="silverpooltopup.php">Top Up Silver Pool</a></li>
                        <li><a href="fundtransfer.php">Transfer Fund</a></li>
                    
              </ul>
            </div><!-- dropdown-menu -->            
          </li>
          
            <li class="nav-item  with-sub">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="icon ion-social-dropbox"></i>
              <span>Statements</span>
              </a>
              <div class="sub-item">
              <ul>
                <li><a href="accounts.php">Fund Statement</a></li>                
                  
                    
              </ul>
            </div><!-- dropdown-menu -->            
          </li>
          
          
            <li class="nav-item with-sub">
            <a class="nav-link" href="signup.php" data-toggle="dropdown">
              <i class="icon ion-social-dropbox"></i>
              <span>New User</span>
              </a>
                       <div class="sub-item">
              <ul>
                <li><a href="signup.php">Add New</a></li>                
                      
                    
              </ul>
            </div><!-- dropdown-menu -->           
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="icon ion-ios-cart"></i>
              <span>RePurchase</span>
              </a>

          </li>


          <li class="nav-item">
            <a class="nav-link" href="signout.php">
              <i class="icon ion-locked"></i>
              <span>Log-out</span>
              </a>  
          </li>

        <!--  <li class="nav-item  with-sub">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="icon ion-ios-people"></i>
              <span> Support</span>
              </a>
              <div class="sub-item">
              <ul>
                <li><a href="form-elements.html">Message to Admin</a></li>                
                <li><a href="form-elements.html">Message Center</a></li>                
                    
              </ul>
            </div><!--dropdown-menu         
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="dropdown">
              <i class="icon ion-wrench"></i>
              <span>Maintenance</span>
              </a>
            
          </li>
-->
          

        </ul>
      </div><!-- container -->
    </div><!-- slim-navbar -->
