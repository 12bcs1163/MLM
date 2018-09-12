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
													<label class="control-label">Bank Name</label>
													<input type="text" id="userid" class="form-control border-input" value="<?php echo $userinfo['Bank_Name']; ?>" name="Bank_Name">
												</div>
	                                        </div>
	                                        
	                                        
	                                         <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Branch </label>
														<input type="text" id="userid" class="form-control border-input" value="<?php echo $userinfo['Branch_Name']; ?>" name="Branch_Name">
											
												</div>
	                                        </div>
	                                       
	                                        
	                                    </div>
	                                    
	                                    
	                                    	         <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Account Holder Name</label>
                                             		<input type="text" id="userid" class="form-control border-input" value="<?php echo $userinfo['Acc_Holder_Name']; ?>" name="Acc_Holder_Name">
											    </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Account Number</label>
                                                		<input type="text" id="userid" class="form-control border-input" value="<?php echo $userinfo['Bank_Acc_No']; ?>" name="Bank_Acc_No">
											</div>
                                        </div>
                                    </div>

                                        
	                          <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>IFSC Code</label>
                                             		<input type="text" id="userid" class="form-control border-input" value="<?php echo $userinfo['IFSC_Code']; ?>" name="Acc_Holder_Name">
											    </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pan Number</label>
                                                		<input type="text" id="userid" class="form-control border-input" value="<?php echo $userinfo['Pan_Number']; ?>" name="Pan_Number">
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