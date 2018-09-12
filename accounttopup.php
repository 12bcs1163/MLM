<?php include("header.php"); ?>
<?php

// print_r($_SESSION['User_Array']);
// die;
//$obj->flash="Topup is activate now. Thanks for your cooperation .";
$currentincome=0;

$currentincome=$obj->check_current_income();

   

$currentincome=$currentincome['CURRENTBALANCE'];

if(isset($_POST['topup']))
{
    
    

//Checking Current Income
 $_POST['topupuserid']=trim(strtolower($_POST['topupuserid']));

$myq111 = "SELECT * FROM Registration WHERE UserID='".$_POST['topupuserid']."' and PaidStatus='Free'";
		$packdata11=$obj->get_one_record($myq111);
		
	if(empty($packdata11)){
	$obj->flash="Invalid User ID ".$_POST['TUserID']." Or Already Paid !!";
	}else{


$amount=$_POST['myamount'];

//End Current Income

if($amount>$currentincome)
{$obj->flash="Invalid Amount ?? !! [Error]";}else{


$flag=0;



$dollaramount=$amount;

$totalamount=$amount;
$array['Commitment']=rand();
$array['DateTime']=date("F j, Y",strtotime("+5 day"));
$array['OrDateTime']=date("F j, Y");
$array['DateTimeStr']=strtotime(date("F j, Y"));
$array['PinID']=$pin;
$array['TotalAmount']=$totalamount;
$array['UserID']=$_POST['topupuserid'];
$array['dollarsamount']=$dollaramount;

//Add commitment

	$requestarray=array();
	$requestarray['TotalAmount']=$totalamount;
	$requestarray['pinrequest']=1;
$requestarray['PaymentDate']=$obj->today_date;
	$requestarray['PaymentType']="Successfully topup id ".$_POST['topupuserid']." with ".$dollaramount;
	$requestarray['Status']='Approved';
	$requestarray['TranID']=$array['Commitment'];
	$requestarray['TransferUserID']=$_POST['topupuserid'];
	$requestarray['PaymentMode']="Fund";
        $requestarray['UserID']=$obj->userID;


	
	
$obj->insert_data("payments",$requestarray);

$obj->insert_data("Commitment",$array);
$lastid=$obj->mysqli2->insert_id;


$obj->update_data("update Registration set PaidStatus='Paid' where UserID='".$_POST['topupuserid']."'");

//$obj->withdrawal_request(array_filter($requestarray));

	$obj->flash="Successfully Top Up :- ".$_POST['topupuserid']." [Success]";

//$obj->flash="Sever is under maintenance please cooperate with us. Thanks ";


}
}



}


$currentincome=0;
$currentincome=$obj->check_current_income();

$currentincome=$currentincome['CURRENTBALANCE'];
?>

<form action="" method="post">
  <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="slim-pagetitle">Topup Account</h6>
        </div><!-- slim-pageheader -->

    
    <!-- ++++++++++++++ TREE ++++++++++++++++++++ -->
    <div class="section-wrapper">
        <?php include("showmessage.php"); ?>
          <label class="section-title">Top up Account</label>
          <p class="mg-b-20 mg-sm-b-40">Top up your or your team accounts.</p>

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Account Balance: <i class="fa fa-inr" aria-hidden="true"></i></label>
                  <input type="text" value="<?php echo $currentincome; ?>" placeholder="Balance" class="form-control" readonly/>
                </div>
              </div><!-- col-4 -->
               <!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Package: </label>
                     
  
<select class="form-control" name="myamount">
<?php

$data = $obj->get_one_record("select * from packages order by packID ASC");
											foreach($data as $val)
											{
echo "<option value='".$val['amount']."'>".$val['name']."</option>";
}

?>
</select>

                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">User ID: </label>
               <input type="text" name="topupuserid" id="topupuserid" placeholder="User ID" class="form-control" reqiured/>
											  <button type="button" id="verifytopup" class="btn btn-info" style="margin-top:10px">Verify</button>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">User Name: </label>
               <spn class="form-control border-input" id="showname" >  </span>  </div>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-primary bd-0" type="submit" name="topup">Topup Account</button>
             <a href="index.php"> <button class="btn btn-secondary bd-0">Cancel</button></a>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div>
      </div><!-- container -->
    </div><!-- slim-mainpanel -->
</form>

<?php include("footer.php"); ?>