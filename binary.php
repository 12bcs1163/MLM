<?php include("header.php"); ?>


<?php

$obj->currency='<i class="fa fa-inr" aria-hidden="true"></i>';

//print_r($cappingwithtime);


$obj->data=array();
$obj->daterecord=array();
$left = $obj->gettotalbusiness($obj->userID,"Left");

$leftdates = $obj->daterecord;



$obj->data=array();
$obj->daterecord=array();
$right = $obj->gettotalbusiness($obj->userID,"Right");

$rightdates = $obj->daterecord;


$totaldates1 = array_merge($rightdates,$leftdates);


//print_r($totaldates1);

$totaldates=array_unique($totaldates1);
$sequence=array();

foreach($totaldates as $dd1)
{

$sequence[]=strtotime($dd1);

}
sort($sequence);

$totaldates=array();
foreach($sequence as $vv)
{
$totaldates[]=date('d-m-Y',$vv);
}





if(isset($_POST['search']))
{
    
   $d1=strtotime($_POST['d1']);
   $d2=strtotime($_POST['d2']);
   
}


?>
 <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Team</li>
          </ol>
          <h6 class="slim-pagetitle">Binary Detail</h6>
        </div><!-- slim-pageheader -->


        <div class="section-wrapper mg-t-20">
          <label class="section-title">Binary Business</label>
          <p class="mg-b-20 mg-sm-b-40">Chart of all investment in your downline.</p>

          <div class="table-responsive">
            <table class="table mg-b-0">
           	 <thead>
                                                <tr>
											 <th>Date</th>
                                                    <th align="center">Left Users</th>
                                                    <th align="center">Right Users</th>
                                                   <th align="center">Left carry </th>
                                                    <th align="center">Right carry</th> 
                                                   <!-- <th align="center">Capping</th> -->
                                                      <th align="center">Daily Capping</th>
                                                    <th align="center">Revenue</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
											
											
											
										
											
											<?php
											$leftcarry=0;
											$rightcarry=0;
											$capping=0;
											$totalam=0;
											$leftdollar=0;
											$rightdollar=0;
											$flag=0;
										
											
											//print_r($totaldates);
											
											foreach($totaldates as $dates)
											{
											$leftshow=0;
											if(!empty($left[$dates])){$leftshow=$left[$dates];}
											$rightshow=0;
											if(!empty($right[$dates])){$rightshow=$right[$dates];}
											
											//echo $leftcarry;
											
		 $leftcarry+=$leftshow;
		 $rightcarry+=$rightshow;
		 
		 
	$leftshow1="";
											$rightshow1="";
											
		 
						
								if($leftcarry>$rightcarry){
								    
								    if(empty($flag))
								    {
								        
								        $leftcarry=$leftcarry-1;
								        $leftshow--;
								        $leftshow1="(2:1)";
								        $flag++;
								        
								    }
								    
								 $matching = min($leftcarry,$rightcarry);
								 $matching1 = $leftcarry-$matching;
								
									if($leftcarry>=$matching1){  $leftcarry=$leftcarry-$matching; $rightcarry=0; }else{$leftcarry=0; }
									
									//echo $leftcarry;
								}else{
								    
								    	    
								    if(empty($flag))
								    {
								        
								        $rightcarry=$rightcarry-1;
								        $rightshow--;
								        $rightshow1=" (2:1)";
								        $flag++;
								        
								    }
								
									 $matching = min($rightcarry,$leftcarry);
									 $matching1 = $rightcarry-$matching;
				
										if($rightcarry>=$matching1){ $rightcarry=$rightcarry-$matching; $leftcarry=0; }else{ $rightcarry=0; }
											
											
								}		
								
							
											
											
											$matchingamount=$matching*50;
											
										
											
											foreach($cappingwithtime as $key=>$val)
											{
											
											 $current=strtotime($dates);											 
											//echo $key;
											if($key<=$current)
											{$capping=$val; break;}
											
											
											}
											
											//echo $capping;
											$capping1 = $matchingamount-$capping; 
											
											
											
											
							if($capping1<=0){ 
										
							$capping1 = 0;					
					}else{
					$matchingamount=$capping;
					}						
					
					$showflag=0;
					
					if(!empty($d1) && !empty($d2))
					{
					    if(strtotime($dates)>=$d1 && strtotime($dates)<=$d2)
					    { $showflag=1; }
					    
					}else{$showflag=1;}
					
					if(!empty($showflag))
					{
											?>
											
                                                <tr>
                                                    <td><?php echo $dates; ?></td>
                                                    <td> <?php echo $leftshow,$leftshow1; ?></td>
                                                    <td> <?php echo $rightshow.$rightshow1; ?></td>
                                                    
                                                    <td> <?php echo $leftcarry; ?></td>
                                                    <td> <?php echo $rightcarry; ?></td> 
                                                    
                                              
                                                               <td> <?php echo $obj->currency." ".$capping; ?></td>                                        
                                                    <td> <?php echo $obj->currency." ".$matchingamount; ?></td>
                                                </tr>
											
											<?php 
											
											$leftdollar+=$leftshow;
											$rightdollar+=$rightshow;
											
											$totalam+=$matchingamount;
											
											
					}				
											}
											
											?>
											
											   <tr>

												

												
												
                                                
                                            </tbody>
								</table>
          </div><!-- table-responsive -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

<?php include("footer.php"); ?>