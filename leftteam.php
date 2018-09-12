<?php include("header.php"); ?>

<?php


$obj->dataarray=array();
$right = $obj->getmemberlegdetail($obj->userID,"Left");

//print_r($obj->dataarray);
$right=$data;
if(empty($right)){$right=array();}



?>
    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Team</li>
          </ol>
          <h6 class="slim-pagetitle">Left Side</h6>
        </div><!-- slim-pageheader -->


        <div class="section-wrapper mg-t-20">
          <label class="section-title">Left side users</label>
          <p class="mg-b-20 mg-sm-b-40">list of all users in left side.</p>

          <div class="table-responsive">
            <table class="table mg-b-0">
              <thead>
                <tr>
                    <th>S. No</th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                   <th>Silver Pool</th>
                    <th>Prince Pool</th>
                </tr>
              </thead>
              <tbody>
                  	<?php
											$sno=1;
											foreach($right as $data){
														if(!empty($data['UserID'])){							?>
                <tr>
                  <th scope="row"><?php echo $sno++; ?></th>
                  <td><?php echo $data['UserID']; ?></td>
                  <td><?php echo $data['FirstName']." ".$data['LastName']; ?></td>
                  <td><?php echo $data['PaidStatus']; ?></td>
                  
                                    <td><?php if(!empty($data['sliverpoolstatus'])){ echo "<img src='img/ok.png' style='height:50px;width:50px;'>"; }else{ echo "<img src='img/cross.png' style='height:50px;width:50px;'>"; } ?></td>
                  
                  
                     <td><?php if(!empty($data['princepoolstatus'])){ echo "<img src='img/ok.png' style='height:50px;width:50px;'>"; }else{ echo "<img src='img/cross.png' style='height:50px;width:50px;'>"; } ?></td>
                  
                  
                </tr>
                <?php  } } ?>
                
              </tbody>
            </table>
          </div><!-- table-responsive -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- slim-mainpanel -->


<?php include("footer.php"); ?>