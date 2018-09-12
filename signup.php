<?php include("package/Memberclass.php");

$userdata=$obj->loaduserinfo();


$mypath=$_SERVER['SCRIPT_NAME'];


?>

<?php

if(isset($_POST['register']))
{


$obj->register_member(array_filter($_POST));



}
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
  <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="slim-pagetitle">New Registration</h6>
        </div><!-- slim-pageheader -->

    
    <!-- ++++++++++++++ TREE ++++++++++++++++++++ -->
    <div class="section-wrapper">
        <?php include("showmessage.php"); ?>
          <label class="section-title">New Account</label>
          <p class="mg-b-20 mg-sm-b-40">Add new account.</p>


		 <div class="content-page"> 
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid"> 
                <!-- Page-Title -->
                
         <div id="dvPageContent" class="page-content"> 
                <div class="row">
                   <div class="col-lg-12 col-md-12">
                    
                         <div class="card" style="padding:20px">

                            <div class="header">
                                <h4 class="title">Register New Account</h4>
                            </div>
	                            <div class="content">
	                                <form action="" method="post" >
	                                
	                                
	                                
	                                
	                            

	                                
	                                
	                                
	                                
	                                
	                                 <div class="row">
	                                        

	                                       
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Sponsor ID</label>
													<input type="text" class="form-control border-input" name="DirectID" id="topupuserid" required>
												</div>
	                                        </div>
	                                        
	                                                
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">ID Verification</label>
													   
													   
													  
                             
                            
                            
													    <button type="button" id="verifytopup" class="btn btn-danger form-control border-input verifytopup" >Click Here For ID Verification</button>
											  
												</div>
	                                        </div>
	                                        
	                                        
	                                          <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
													   
													   
													<spn class="form-control border-input" id="showname" >  </span>
                             
                            
                            
													 
											  
												</div>
	                                        </div>
	                                        
	                                    </div>
	                                        <div classs="row">
	                                       
	                                                      <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Position</label>
													<select class="form-control border-input" name="Position">
													<option value="Right">Right</option>
													<option value="Left">Left</option>
													</select>
												
												</div>
	                                        </div>
	                                        
	                                     
	                                       
	                                       </div>

	                                    
	                                   

	                                
	                                     <div class="row">
	                                        
	                                       
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">User ID</label>
													<input type="text" id="userid" class="form-control border-input" name="UserID" value="<?php echo "BTV".rand(1000,99999); ?>" readonly>
												</div>
	                                        </div>
	                                        
	                                        
	                                         <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Passsword </label>
													<input type="password" class="form-control border-input" name="Password" id="password" required>
												</div>
	                                        </div>
	                                       
	                                        
	                                    </div>
	                                    
	                                    
	                                    	         <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control border-input" placeholder="First Name" name="FirstName"  value="<?php echo $userinfo['FirstName']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Last Name" name="LastName" value="<?php echo $userinfo['LastName']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" name="Address" placeholder="Home Address" >
                                            </div>
                                        </div>
                                        
                                          <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Mobile No</label>
													<input type="text" class="form-control border-input" name="MobileNo"  >
												</div>
	                                        </div>
	                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control border-input" placeholder="City" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            
                                            
                                            <div class="form-group">
                                                <label>Country</label>
                                                
                                                
                                          
                                                
                                                
                                                
                                            <input type="text" class="form-control border-input" placeholder="Country"  name="country" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control border-input" placeholder="ZIP Code" name="Zip" >
                                            </div>
                                        </div>
                                    </div>
                              
	                                    
	                         
	                                   
	                                   
	                               
	                                 <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name="register">CREATE ACCOUNT</button>
                                    </div>
	                                    

	                              <!--   <div class="text-center">
                                        <button type="button" class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#myModalOTP">CREATE ACCOUNT</button>
                                    </div> -->
	                                    
	                                    <div class="clearfix"></div>
	                               
	                            </div>
	                        </div>
	                    


					
					
	                        </div>
								
								
				</div>								
</div>
</div>
	</div>								
</div>
</div>
</div>
<?php include("footer.php"); ?>