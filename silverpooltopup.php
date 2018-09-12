<?php include("header.php"); ?>
<?php

//$obj->flash="Topup is activate now. Thanks for your cooperation .";
$currentincome=0;

$currentincome=$obj->check_current_income();

//print_r($currentincome);

$currentincome=$currentincome['CURRENTBALANCE'];

if(isset($_POST['topup']))
{
    
    $_POST['myamount']=2396;

    $_POST['topupuserid']=$obj->userID;
    
    	$data = $obj->get_one_record("select COUNT(*) as total from Registration where DirectID='".$obj->userID."' and PaidStatus='Paid'");
    	
    	if($data[0]['total']>=5){

//Checking Current Income
 $_POST['topupuserid']=trim(strtolower($_POST['topupuserid']));

$myq111 = "SELECT * FROM Registration WHERE UserID='".$_POST['topupuserid']."' and silverpoolstatus='0'";
		$packdata11=$obj->get_one_record($myq111);
		
	if(empty($packdata11)){
	$obj->flash="Invalid User ID ".$_POST['topupuserid']." Or Already Paid !!";
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
$array['incomestatus']=0;

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


$obj->update_data("update Registration set silverpoolstatus='1' where UserID='".$_POST['topupuserid']."'");

	$obj->flash="Successfully Top Up :- ".$_POST['topupuserid']." [Success]";




}
}

}else{

$obj->flash="Please topup atleast 5 users direct sponsored by you.";    
    
}

}


$currentincome=0;
$currentincome=$obj->check_current_income();

//print_r($currentincome);

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
          <h6 class="slim-pagetitle">Topup Sliver Pool</h6>
        </div><!-- slim-pageheader -->

    
    <!-- ++++++++++++++ TREE ++++++++++++++++++++ -->
    <div class="section-wrapper">
        <?php include("showmessage.php"); ?>
          <label class="section-title">Top up Account</label>
          <p class="mg-b-20 mg-sm-b-40">Top up your account.</p>

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Account Balance: <i class="fa fa-inr" aria-hidden="true"></i></label>
                  <input type="text" value="<?php echo $currentincome; ?>" placeholder="Balance" class="form-control" readonly/>
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