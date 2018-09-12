<?php include("header.php"); ?>
<?php

if(isset($_POST['changepass']))
{

$obj->change_password(array_filter($_POST));

}


if(isset($_POST['tpass']))
{

$obj->change_password1(array_filter($_POST));

}
$logo="";
$userdata=$obj->loaduserinfo();
if(!empty($userdata['profilepic'])){

$logo="users/".$userdata['profilepic'];

}
if(isset($_POST['updatepro']))
{
//print_r($_POST);
	$obj->profile_update(array_filter($_POST),$logo);

}

$logo="";
$userdata=$obj->loaduserinfo();
if(!empty($userdata['profilepic'])){

$logo="users/".$userdata['profilepic'];

}
$userinfo=$userdata;

$male="";
$female="";
if($userinfo['Gender']=="Male"){$male="checked";}
if($userinfo['Gender']=="Female"){$female="checked";}

?>

  <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="slim-pagetitle">Profile</h6>
        </div><!-- slim-pageheader -->

    
    <!-- ++++++++++++++ TREE ++++++++++++++++++++ -->
    <div class="section-wrapper">
        <?php include("showmessage.php"); ?>
          <label class="section-title">Update Account</label>
          <p class="mg-b-20 mg-sm-b-40">update your personal account information.</p>


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
                                <h4 class="title">Account Setting</h4>
                            </div>
	                            <div class="content">
	                                <form action="" method="post" >
	                                
	                                
	                                
	                                
	                            

	                                
	                                
	                                
	                                

	                                     <div class="row">
	                                        
	                                       
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">User ID</label>
													<input type="text" id="userid" class="form-control border-input" value="<?php echo $userinfo['UserID']; ?>" readonly>
												</div>
	                                        </div>
	                                        
	                                        
	                                         <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Passsword </label>
													<input type="password" class="form-control border-input" name="Password" id="password" value="<?php echo $userinfo['Password']; ?>" required>
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
                                                <input type="text" class="form-control border-input" name="Address" placeholder="Home Address" value="<?php echo $userinfo['Address']; ?>">
                                            </div>
                                        </div>
                                        
                                          <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Mobile No</label>
													<input type="text" class="form-control border-input" name="MobileNo" value="<?php echo $userinfo['MobileNo']; ?>" readonly >
												</div>
	                                        </div>
	                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control border-input" placeholder="City" value="<?php echo $userinfo['City']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            
                                            
                                            <div class="form-group">
                                                <label>Country</label>
                                                
                                                
                                          
                                                
                                                
                                                
                                            <input type="text" class="form-control border-input" placeholder="Country" value="<?php echo $userinfo['country']; ?>" name="country" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control border-input" placeholder="ZIP Code" name="Zip" value="<?php echo $userinfo['Zip']; ?>">
                                            </div>
                                        </div>
                                    </div>
                              
	                                    
	                         
	                                   
	                                   
	                               
	                                 <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name="updatepro">UPDATE ACCOUNT</button>
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