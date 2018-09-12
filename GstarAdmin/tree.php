<?php include'head.php' ?>
<?php

$id=@$_POST['id'];
if(empty($id))
{
	$myuserid=$obj->userID;
}else{
	$myuserid=$_POST['id'];
}

$treeusers=array();
$obj->load_tree($myuserid);
$mainuserid=$treeusers;
$treeusers=array();
$obj->load_tree($mainuserid['UserID'],"Left");
$mainleftuserid=$treeusers;
//print_r($mainleftuserid);
$treeusers=array();
$obj->load_tree($mainuserid['UserID'],"Right");
$mainrightuserid=$treeusers;


$treeusers=array();
$obj->load_tree($mainleftuserid['UserID'],"Left");
$mainleftleftuserid=$treeusers;

$treeusers=array();
$obj->load_tree($mainleftuserid['UserID'],"Right");
$mainleftrightuserid=$treeusers;

$treeusers=array();
$obj->load_tree($mainrightuserid['UserID'],"Left");
$mainrightleftuserid=$treeusers;

$treeusers=array();
$obj->load_tree($mainrightuserid['UserID'],"Right");
$mainrightrightuserid=$treeusers;

//print_r($mainrightrightuserid);

?>



                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Binary tree</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        


<div class="main_page">
	<div class="content_layout content_layout_full fixed">
		<div class="home_large_box fixed">		
			<div class="span11">	
				
				
				<form name="myform" action="tree.php" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tbody><tr>
		<td align="right" width="65%"><strong>User Name</strong> </td>
		<td align="right">
				<input type="text" style="margin: 5px;" name="id" class="input-medium">
		</td>		
		<td align="right"> 
			<input type="submit" value="Search" name="Search" class="button" style="width:90px; border:none; color:#000000;">
		</td>
	  </tr>
	</tbody></table>
</form>
 

<script type="text/javascript" src="jquery.min.js"></script>

	<style>
      div#container {
        width: 580px;
        margin: 100px auto 0 auto;
        padding: 20px;
        background: #000;
        border: 1px solid #1a1a1a;
      }
      
      /* HOVER STYLES */
      div#pop-up0, #pop-up1, #pop-up2, #pop-up3, #pop-up4, #pop-up5, #pop-up6, #pop-up7, #pop-up8, #pop-up9, #pop-up10, #pop-up11, #pop-up12, #pop-up13, #pop-up14 {
        display: none;
        position:absolute;
        width:360px;
		margin-left:-300px;
        padding:0;
        background: #eeeeee;
        color: #000000;
        border: 1px solid #ffffff;
        font-size: 90%;
      }
      
    </style>
    <script type="text/javascript">
    /*  $(function() {
        var moveLeft = 20;
        var moveDown = 10;
				$('a#trigger0').hover(function(e) {
          $('div#pop-up0').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up0').hide();
        });
        
        $('a#trigger0').mousemove(function(e) {
          $('div#pop-up0').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger1').hover(function(e) {
          $('div#pop-up1').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up1').hide();
        });
        
        $('a#trigger1').mousemove(function(e) {
          $('div#pop-up1').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger2').hover(function(e) {
          $('div#pop-up2').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up2').hide();
        });
        
        $('a#trigger2').mousemove(function(e) {
          $('div#pop-up2').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger3').hover(function(e) {
          $('div#pop-up3').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up3').hide();
        });
        
        $('a#trigger3').mousemove(function(e) {
          $('div#pop-up3').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger4').hover(function(e) {
          $('div#pop-up4').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up4').hide();
        });
        
        $('a#trigger4').mousemove(function(e) {
          $('div#pop-up4').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger5').hover(function(e) {
          $('div#pop-up5').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up5').hide();
        });
        
        $('a#trigger5').mousemove(function(e) {
          $('div#pop-up5').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger6').hover(function(e) {
          $('div#pop-up6').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up6').hide();
        });
        
        $('a#trigger6').mousemove(function(e) {
          $('div#pop-up6').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger7').hover(function(e) {
          $('div#pop-up7').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up7').hide();
        });
        
        $('a#trigger7').mousemove(function(e) {
          $('div#pop-up7').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger8').hover(function(e) {
          $('div#pop-up8').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up8').hide();
        });
        
        $('a#trigger8').mousemove(function(e) {
          $('div#pop-up8').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger9').hover(function(e) {
          $('div#pop-up9').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up9').hide();
        });
        
        $('a#trigger9').mousemove(function(e) {
          $('div#pop-up9').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger10').hover(function(e) {
          $('div#pop-up10').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up10').hide();
        });
        
        $('a#trigger10').mousemove(function(e) {
          $('div#pop-up10').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger11').hover(function(e) {
          $('div#pop-up11').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up11').hide();
        });
        
        $('a#trigger11').mousemove(function(e) {
          $('div#pop-up11').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger12').hover(function(e) {
          $('div#pop-up12').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up12').hide();
        });
        
        $('a#trigger12').mousemove(function(e) {
          $('div#pop-up12').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger13').hover(function(e) {
          $('div#pop-up13').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up13').hide();
        });
        
        $('a#trigger13').mousemove(function(e) {
          $('div#pop-up13').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
				$('a#trigger14').hover(function(e) {
          $('div#pop-up14').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div#pop-up14').hide();
        });
        
        $('a#trigger14').mousemove(function(e) {
          $('div#pop-up14').css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
		
		      }); */
	  
	</script>
	<center>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">

		<tbody><tr>
			<td height="1" colspan="2" valign="top" bgcolor="#E9EDF0"></td>
		</tr>
		<tr><td height="1" colspan="2" valign="top" bgcolor="#ffffff"></td>
							  </tr>
		<tr>
            <td height="40" colspan="2" valign="top" class="in_inner_txt1">
				<table class="MyTable" border="0" bordercolor="#FFFFFF" style="border-collapse:collapse; margin:6px;" cellpadding="0" cellspacing="0" width="96%">
                                  <tbody>
                                    <tr class="MyTitle">
                                      <td height="30" colspan="8" bgcolor="#E3E8EC" style="color:#0189B0;"> &nbsp;&nbsp;&nbsp;<strong>Legend </strong></td>
                                    </tr>
                                    <tr>
                                      <td width="13%" height="60"> &nbsp;&nbsp;Free Member</td>
                                      <td width="13%"><img src="img/f.png" width="50" height="50"></td>
                                      <td width="13%"> &nbsp;&nbsp;Paid Member</td>
                                      <td width="13%"><img src="img/p.png" width="50" height="50"></td>
                                      <td width="13%"> &nbsp;&nbsp;Blank Position </td>
                                      <td width="13%"><img src="img/c.png" width="50" height="50"></td>
									  <td width="13%"> &nbsp;&nbsp;Block Member </td>
                                      <td width="13%"><img src="img/b.png" width="50" height="50"></td>
                                    </tr>
                                  </tbody>
                                </table>				
			</td>
        </tr>
		<!--<tr>
            <td width="51%" height="40" valign="middle" class="in_inner_txt1">
				<table class="MyTable" border="1" bordercolor="#FFFFFF" style="border-collapse:collapse; margin:6px;" cellpadding="0" cellspacing="0" width="96%">
                                  <tbody>
                                    <tr class="MyTitle">
                                      <td width="40%" height="30" bgcolor="#E3E8EC" style="color:#0189B0;"><strong> &nbsp;&nbsp;&nbsp;Tree Count</strong></td>
                                      <td width="20%" bgcolor="#E3E8EC" style="color:#0189B0;"><strong> &nbsp;&nbsp;&nbsp;Left </strong></td>
                                      <td width="20%" bgcolor="#E3E8EC" style="color:#0189B0;"><strong> &nbsp;&nbsp;&nbsp;Right </strong></td>
									  <td width="20%" bgcolor="#E3E8EC" style="color:#0189B0;"><strong> &nbsp;&nbsp;&nbsp;Total </strong></td>
                                    </tr>
                                    <tr>
                                      <td> &nbsp;&nbsp;&nbsp;Total Paid Members </td>
                                      <td><span id="ctl00_ContentPlaceHolder1_lblLeftR">&nbsp;&nbsp;&nbsp;4</span> </td>
                                      <td><span id="ctl00_ContentPlaceHolder1_lblRightR">&nbsp;&nbsp;&nbsp;7</span> </td>
									  <td><span id="ctl00_ContentPlaceHolder1_lblRightR">&nbsp;&nbsp;&nbsp;11</span> </td>
                                    </tr>
                                    <tr>
                                      <td> &nbsp;&nbsp;&nbsp;Total Unpaid Members </td>
                                      <td><span id="ctl00_ContentPlaceHolder1_lblLeftB">&nbsp;&nbsp;&nbsp;16</span> </td>
                                      <td><span id="ctl00_ContentPlaceHolder1_lblRightB">&nbsp;&nbsp;&nbsp;6</span> </td>
									  <td><span id="ctl00_ContentPlaceHolder1_lblRightR">&nbsp;&nbsp;&nbsp;22</span> </td>
                                    </tr>
									<tr>
                                      <td> &nbsp;&nbsp;&nbsp;Total Investment </td>
                                      <td><span id="ctl00_ContentPlaceHolder1_lblLeftP">&nbsp;&nbsp;&nbsp;108000</span> </td>
                                      <td><span id="ctl00_ContentPlaceHolder1_lblRightP">&nbsp;&nbsp;&nbsp;216000</span> </td>
									  <td><span id="ctl00_ContentPlaceHolder1_lblRightR">&nbsp;&nbsp;&nbsp;324000</span> </td>
                                    </tr>
                                     <!--<tr>
                                      <td> &nbsp;&nbsp;&nbsp;Block Members </td>
                                      <td><span id="ctl00_ContentPlaceHolder1_lblLeftP">&nbsp;&nbsp;&nbsp;4</span> </td>
                                      <td><span id="ctl00_ContentPlaceHolder1_lblRightP">&nbsp;&nbsp;&nbsp;0</span> </td>
                                    </tr>
                                   <tr class="MyFooter">
                                      <td> <strong>&nbsp;&nbsp;&nbsp;Total </strong></td>
                                      <td><strong> &nbsp;&nbsp;&nbsp;6 </strong></td>
                                      <td><strong> &nbsp;&nbsp;&nbsp;0 </strong></td>
                                    </tr>
                                  </tbody>
                                </table>-->
			</td>
                            
        </tr>
		<tr>
            <td height="40" colspan="2" valign="top" class="binary_tree_txt">
				<br><br><table style="width:960px;" border="0" cellspacing="0" cellpadding="0" align="center">
                                   
								   <tbody><tr>
								   	<td>
									
									
<div id="pop-up0" style="display: none; top: 839px; left: 836px;">	
<table class="MyTable" border="1" bordercolor="#FFFFFF" style="border-collapse:collapse; margin:6px;" cellpadding="0" cellspacing="0" width="350">
		<tbody><tr>
            <td height="25" colspan="4" bgcolor="#E3E8EC"><p><strong>Date Of Joining : </strong><strong>2015-01-04</strong></p></td>
            </tr>
          <tr>
            <td width="113">Distributor ID </td>
            <td colspan="3">pret8</td>
            </tr>
          <tr>
            <td>Distributor Name</td>
            <td colspan="3">preet kamal</td>
            </tr>
          <tr>
            <td>Sponsor ID </td>
            <td colspan="3">bh88</td>
            </tr>
          <tr>
            <td>Sponsor Name</td>
            <td colspan="3">rtyrfy ytuy7t</td>
            </tr>
          
          <tr>
            <td>Total Left ID</td>
            <td width="50">20</td>
            <td width="125">Total Right ID </td>
            <td width="50">13</td>
          </tr>
         <tr>
            <td height="25" colspan="2" bgcolor="#E3E8EC">
				<p><strong>SelfTopUp&nbsp; :
				 20000</strong>
				 </p>
			</td>
			<td colspan="2" bgcolor="#E3E8EC"><p><strong>date = 2015-01-16</strong></p></td>
            </tr>
          <!--<tr>
            <td>Total Left TopUpAmount </td>
            <td>20000</td>
            <td>Total Right TopUpAmount</td>
            <td>20000</td>
          </tr>
          <tr>
            <td>Total Left Alpha TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Alpha TopUpAmount</td>
            <td>10000.00</td>
          </tr>
          <tr>
            <td>Total Left Beta TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Beta TopUpAmount</td>
            <td>10000.00</td>
          </tr>-->
        </tbody></table>
</div>

									
									
<div id="pop-up1" style="display: none; top: 981px; left: 592px;">	
<table class="MyTable" border="1" bordercolor="#FFFFFF" style="border-collapse:collapse; margin:6px;" cellpadding="0" cellspacing="0" width="350">
		<tbody><tr>
            <td height="25" colspan="4" bgcolor="#E3E8EC"><p><strong>Date Of Joining : </strong><strong>2015-01-04</strong></p></td>
            </tr>
          <tr>
            <td width="113">Distributor ID </td>
            <td colspan="3">pret9</td>
            </tr>
          <tr>
            <td>Distributor Name</td>
            <td colspan="3">preet kamal</td>
            </tr>
          <tr>
            <td>Sponsor ID </td>
            <td colspan="3">pret8</td>
            </tr>
          <tr>
            <td>Sponsor Name</td>
            <td colspan="3">preet kamal</td>
            </tr>
          
          <tr>
            <td>Total Left ID</td>
            <td width="50">19</td>
            <td width="125">Total Right ID </td>
            <td width="50">0</td>
          </tr>
         <tr>
            <td height="25" colspan="2" bgcolor="#E3E8EC">
				<p><strong>SelfTopUp&nbsp; :
				 0</strong>
				 </p>
			</td>
			<td colspan="2" bgcolor="#E3E8EC"><p><strong>date = </strong></p></td>
            </tr>
          <!--<tr>
            <td>Total Left TopUpAmount </td>
            <td>20000</td>
            <td>Total Right TopUpAmount</td>
            <td>20000</td>
          </tr>
          <tr>
            <td>Total Left Alpha TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Alpha TopUpAmount</td>
            <td>10000.00</td>
          </tr>
          <tr>
            <td>Total Left Beta TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Beta TopUpAmount</td>
            <td>10000.00</td>
          </tr>-->
        </tbody></table>
</div>

									
									
<div id="pop-up2" style="display: none; top: 933px; left: 1046px;">	
<table class="MyTable" border="1" bordercolor="#FFFFFF" style="border-collapse:collapse; margin:6px;" cellpadding="0" cellspacing="0" width="350">
		<tbody><tr>
            <td height="25" colspan="4" bgcolor="#E3E8EC"><p><strong>Date Of Joining : </strong><strong>2015-01-04</strong></p></td>
            </tr>
          <tr>
            <td width="113">Distributor ID </td>
            <td colspan="3">pret10</td>
            </tr>
          <tr>
            <td>Distributor Name</td>
            <td colspan="3">preet kamal</td>
            </tr>
          <tr>
            <td>Sponsor ID </td>
            <td colspan="3">pret8</td>
            </tr>
          <tr>
            <td>Sponsor Name</td>
            <td colspan="3">preet kamal</td>
            </tr>
          
          <tr>
            <td>Total Left ID</td>
            <td width="50">0</td>
            <td width="125">Total Right ID </td>
            <td width="50">12</td>
          </tr>
         <tr>
            <td height="25" colspan="2" bgcolor="#E3E8EC">
				<p><strong>SelfTopUp&nbsp; :
				 0</strong>
				 </p>
			</td>
			<td colspan="2" bgcolor="#E3E8EC"><p><strong>date = </strong></p></td>
            </tr>
          <!--<tr>
            <td>Total Left TopUpAmount </td>
            <td>20000</td>
            <td>Total Right TopUpAmount</td>
            <td>20000</td>
          </tr>
          <tr>
            <td>Total Left Alpha TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Alpha TopUpAmount</td>
            <td>10000.00</td>
          </tr>
          <tr>
            <td>Total Left Beta TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Beta TopUpAmount</td>
            <td>10000.00</td>
          </tr>-->
        </tbody></table>
</div>

									
									
<div id="pop-up3">	
<table class="MyTable" border="1" bordercolor="#FFFFFF" style="border-collapse:collapse; margin:6px;" cellpadding="0" cellspacing="0" width="350">
		<tbody><tr>
            <td height="25" colspan="4" bgcolor="#E3E8EC"><p><strong>Date Of Joining : </strong><strong>2015-01-05</strong></p></td>
            </tr>
          <tr>
            <td width="113">Distributor ID </td>
            <td colspan="3">pb</td>
            </tr>
          <tr>
            <td>Distributor Name</td>
            <td colspan="3">pb bansal</td>
            </tr>
          <tr>
            <td>Sponsor ID </td>
            <td colspan="3">bh88</td>
            </tr>
          <tr>
            <td>Sponsor Name</td>
            <td colspan="3">rtyrfy ytuy7t</td>
            </tr>
          
          <tr>
            <td>Total Left ID</td>
            <td width="50">18</td>
            <td width="125">Total Right ID </td>
            <td width="50">0</td>
          </tr>
         <tr>
            <td height="25" colspan="2" bgcolor="#E3E8EC">
				<p><strong>SelfTopUp&nbsp; :
				 1000</strong>
				 </p>
			</td>
			<td colspan="2" bgcolor="#E3E8EC"><p><strong>date = 2015-01-12</strong></p></td>
            </tr>
          <!--<tr>
            <td>Total Left TopUpAmount </td>
            <td>20000</td>
            <td>Total Right TopUpAmount</td>
            <td>20000</td>
          </tr>
          <tr>
            <td>Total Left Alpha TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Alpha TopUpAmount</td>
            <td>10000.00</td>
          </tr>
          <tr>
            <td>Total Left Beta TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Beta TopUpAmount</td>
            <td>10000.00</td>
          </tr>-->
        </tbody></table>
</div>

									
									
<div id="pop-up6">	
<table class="MyTable" border="1" bordercolor="#FFFFFF" style="border-collapse:collapse; margin:6px;" cellpadding="0" cellspacing="0" width="350">
		<tbody><tr>
            <td height="25" colspan="4" bgcolor="#E3E8EC"><p><strong>Date Of Joining : </strong><strong>2015-01-05</strong></p></td>
            </tr>
          <tr>
            <td width="113">Distributor ID </td>
            <td colspan="3">preeti01</td>
            </tr>
          <tr>
            <td>Distributor Name</td>
            <td colspan="3">PREETI NAGPAL</td>
            </tr>
          <tr>
            <td>Sponsor ID </td>
            <td colspan="3">pret10</td>
            </tr>
          <tr>
            <td>Sponsor Name</td>
            <td colspan="3">preet kamal</td>
            </tr>
          
          <tr>
            <td>Total Left ID</td>
            <td width="50">2</td>
            <td width="125">Total Right ID </td>
            <td width="50">9</td>
          </tr>
         <tr>
            <td height="25" colspan="2" bgcolor="#E3E8EC">
				<p><strong>SelfTopUp&nbsp; :
				 7000</strong>
				 </p>
			</td>
			<td colspan="2" bgcolor="#E3E8EC"><p><strong>date = 2015-01-21</strong></p></td>
            </tr>
          <!--<tr>
            <td>Total Left TopUpAmount </td>
            <td>20000</td>
            <td>Total Right TopUpAmount</td>
            <td>20000</td>
          </tr>
          <tr>
            <td>Total Left Alpha TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Alpha TopUpAmount</td>
            <td>10000.00</td>
          </tr>
          <tr>
            <td>Total Left Beta TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Beta TopUpAmount</td>
            <td>10000.00</td>
          </tr>-->
        </tbody></table>
</div>

									
									
<div id="pop-up7">	
<table class="MyTable" border="1" bordercolor="#FFFFFF" style="border-collapse:collapse; margin:6px;" cellpadding="0" cellspacing="0" width="350">
		<tbody><tr>
            <td height="25" colspan="4" bgcolor="#E3E8EC"><p><strong>Date Of Joining : </strong><strong>2015-01-05</strong></p></td>
            </tr>
          <tr>
            <td width="113">Distributor ID </td>
            <td colspan="3">kaler</td>
            </tr>
          <tr>
            <td>Distributor Name</td>
            <td colspan="3">kaler singh</td>
            </tr>
          <tr>
            <td>Sponsor ID </td>
            <td colspan="3">bh88</td>
            </tr>
          <tr>
            <td>Sponsor Name</td>
            <td colspan="3">rtyrfy ytuy7t</td>
            </tr>
          
          <tr>
            <td>Total Left ID</td>
            <td width="50">17</td>
            <td width="125">Total Right ID </td>
            <td width="50">0</td>
          </tr>
         <tr>
            <td height="25" colspan="2" bgcolor="#E3E8EC">
				<p><strong>SelfTopUp&nbsp; :
				 0</strong>
				 </p>
			</td>
			<td colspan="2" bgcolor="#E3E8EC"><p><strong>date = </strong></p></td>
            </tr>
          <!--<tr>
            <td>Total Left TopUpAmount </td>
            <td>20000</td>
            <td>Total Right TopUpAmount</td>
            <td>20000</td>
          </tr>
          <tr>
            <td>Total Left Alpha TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Alpha TopUpAmount</td>
            <td>10000.00</td>
          </tr>
          <tr>
            <td>Total Left Beta TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Beta TopUpAmount</td>
            <td>10000.00</td>
          </tr>-->
        </tbody></table>
</div>

									
									
<div id="pop-up13">	
<table class="MyTable" border="1" bordercolor="#FFFFFF" style="border-collapse:collapse; margin:6px;" cellpadding="0" cellspacing="0" width="350">
		<tbody><tr>
            <td height="25" colspan="4" bgcolor="#E3E8EC"><p><strong>Date Of Joining : </strong><strong>2015-01-06</strong></p></td>
            </tr>
          <tr>
            <td width="113">Distributor ID </td>
            <td colspan="3">BALWINDER01</td>
            </tr>
          <tr>
            <td>Distributor Name</td>
            <td colspan="3"> </td>
            </tr>
          <tr>
            <td>Sponsor ID </td>
            <td colspan="3">preeti01</td>
            </tr>
          <tr>
            <td>Sponsor Name</td>
            <td colspan="3">PREETI NAGPAL</td>
            </tr>
          
          <tr>
            <td>Total Left ID</td>
            <td width="50">1</td>
            <td width="125">Total Right ID </td>
            <td width="50">0</td>
          </tr>
         <tr>
            <td height="25" colspan="2" bgcolor="#E3E8EC">
				<p><strong>SelfTopUp&nbsp; :
				 1000</strong>
				 </p>
			</td>
			<td colspan="2" bgcolor="#E3E8EC"><p><strong>date = 2015-01-21</strong></p></td>
            </tr>
          <!--<tr>
            <td>Total Left TopUpAmount </td>
            <td>20000</td>
            <td>Total Right TopUpAmount</td>
            <td>20000</td>
          </tr>
          <tr>
            <td>Total Left Alpha TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Alpha TopUpAmount</td>
            <td>10000.00</td>
          </tr>
          <tr>
            <td>Total Left Beta TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Beta TopUpAmount</td>
            <td>10000.00</td>
          </tr>-->
        </tbody></table>
</div>

									
									
<div id="pop-up14">	
<table class="MyTable" border="1" bordercolor="#FFFFFF" style="border-collapse:collapse; margin:6px;" cellpadding="0" cellspacing="0" width="350">
		<tbody><tr>
            <td height="25" colspan="4" bgcolor="#E3E8EC"><p><strong>Date Of Joining : </strong><strong>2015-01-06</strong></p></td>
            </tr>
          <tr>
            <td width="113">Distributor ID </td>
            <td colspan="3">BALWINDER02</td>
            </tr>
          <tr>
            <td>Distributor Name</td>
            <td colspan="3">BALWINDER  SINGH</td>
            </tr>
          <tr>
            <td>Sponsor ID </td>
            <td colspan="3">preeti01</td>
            </tr>
          <tr>
            <td>Sponsor Name</td>
            <td colspan="3">PREETI NAGPAL</td>
            </tr>
          
          <tr>
            <td>Total Left ID</td>
            <td width="50">0</td>
            <td width="125">Total Right ID </td>
            <td width="50">8</td>
          </tr>
         <tr>
            <td height="25" colspan="2" bgcolor="#E3E8EC">
				<p><strong>SelfTopUp&nbsp; :
				 1000</strong>
				 </p>
			</td>
			<td colspan="2" bgcolor="#E3E8EC"><p><strong>date = 2015-01-21</strong></p></td>
            </tr>
          <!--<tr>
            <td>Total Left TopUpAmount </td>
            <td>20000</td>
            <td>Total Right TopUpAmount</td>
            <td>20000</td>
          </tr>
          <tr>
            <td>Total Left Alpha TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Alpha TopUpAmount</td>
            <td>10000.00</td>
          </tr>
          <tr>
            <td>Total Left Beta TopUpAmount </td>
            <td>10000.00</td>
            <td>Total Right Beta TopUpAmount</td>
            <td>10000.00</td>
          </tr>-->
        </tbody></table>
</div>

		
   									</td>
								   </tr>
								  <tr>
								  	<td>
										
											<input type="button" value="Back" class="normal-button" onclick="history.go(-1);">
										
									</td>
                                    <td colspan="6" style="padding-top:5px;">
									<div align="center">
									<a id="trigger0">	
									</a><form name="tree_v" action="tree.php" method="post"><a id="trigger0">
										<input type="hidden" name="id" value="<?php echo $mainuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainuserid['img']; ?>) no-repeat; height:60px; width:60px; border:none;margin-right:150px;" value="">
									
									<br>
                                        <strong></strong></a><strong><a id="trigger0" style="margin-right:150px;"><?php echo $mainuserid['UserID']; ?></a></strong>
									  </form>
									  
									 </div>
 									</td>
									<td></td>
                                  </tr>
                                  <tr>
                                    <td colspan="8"><div align="center"><img src="img/band1.gif" width="550" height="35"></div></td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="width:480px; height:100px; padding-top:10px; vertical-align:top;">
									<div align="center">
									<a id="trigger1">	</a><form name="tree_v" action="tree.php" method="post"><a id="trigger1">
										<input type="hidden" name="id" value="<?php echo $mainleftuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainleftuserid['img']; ?>) no-repeat; height:60px; width:60px; border:none" value="">
																			
									</a><br>
                                        <strong><a id="trigger1"><?php echo $mainleftuserid['UserID']; ?></a></strong></form></div>
										
									  </td>
                                    <td colspan="4" style="width:480px; height:100px; padding-top:10px; vertical-align:top;">
									<div align="center">
									<form name="tree_v" action="tree.php" method="post">
									<a id="trigger2">	
										<input type="hidden" name="id" value="<?php echo $mainrightuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainrightuserid['img']; ?>) no-repeat; height:60px; width:60px; border:none" value="">
									
									</a><br>
                                        <strong><a id="trigger2"><?php echo $mainrightuserid['UserID']; ?></a></strong>
										</form>
										</div>
									</td>
                                  </tr>
                                  <tr>
                                    <td colspan="4"><div align="center"><img src="img/band2.gif" width="325" height="35"></div></td>
                                    <td colspan="4"><div align="center"><img src="img/band2.gif" width="325" height="35"></div></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="width:240px; height:100px; padding-top:10px; vertical-align:top;">
										<div align="center">
									<a id="trigger3">	<form name="tree_v" action="tree.php" method="post">
										<input type="hidden" name="id" value="<?php echo $mainleftleftuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainleftleftuserid['img']; ?>) no-repeat; height:60px; width:60px; border:none" value="">
									</form>
									</a>
                                        <strong><a id="trigger3"><?php echo $mainleftleftuserid['UserID']; ?></a></strong></div>
										</td>
                                    <td colspan="2" style="width:240px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger4">	
										<input type="hidden" name="id" value="<?php echo $mainleftrightuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainleftrightuserid['img']; ?>) no-repeat; height:60px; width:60px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger4"><?php echo $mainleftrightuserid['UserID']; ?></a></strong>
									</div>
									</form>
									</td>
                                    <td colspan="2" style="width:240px; height:100px; padding-top:10px; vertical-align:top;">
									<div align="center">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger5">	
										<input type="hidden" name="id" value="<?php echo $mainrightleftuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainrightleftuserid['img']; ?>) no-repeat; height:60px; width:60px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger5"><?php echo $mainrightleftuserid['UserID']; ?></a></strong>
									</div>
									</form>
									</div></td>
                                    <td colspan="2" style="width:240px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger6">	
										<input type="hidden" name="id" value="<?php echo $mainrightrightuserid['UserID']; ?>">
										<input type="submit" name="tree" style="background:url(<?php echo $mainrightrightuserid['img']; ?>) no-repeat; height:60px; width:60px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger6"><?php echo $mainrightrightuserid['UserID']; ?></a></strong>
									</div>
									</form>
									</td>
                                  </tr>
                                <!--  <tr>
                                    <td colspan="2"><div align="center"><a href="#"><img src="img/band4.gif" width="125" height="35"></a></div></td>
                                    <td colspan="2"><div align="center"><a href="#"><img src="img/band4.gif" width="125" height="35"></a></div></td>
                                    <td colspan="2"><div align="center"><a href="#"><img src="img/band4.gif" width="125" height="35"></a></div></td>
                                    <td colspan="2"><div align="center"><a href="#"><img src="img/band4.gif" width="125" height="35"></a></div></td>
                                  </tr>
                                  <tr>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger7">	
										<input type="hidden" name="id" value="5351">
										<input type="submit" name="tree" style="background:url(img/f.png) no-repeat; height:60px; width:60px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger7">kaler</a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger8">	
										<input type="hidden" name="id" value="0">
										<input type="submit" name="tree" style="background:url(img/c.png) no-repeat; height:60px; width:60px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger7"></a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger9">	
										<input type="hidden" name="id" value="0">
										<input type="submit" name="tree" style="background:url(img/c.png) no-repeat; height:60px; width:60px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger9"></a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger10">	
										<input type="hidden" name="id" value="0">
										<input type="submit" name="tree" style="background:url(img/c.png) no-repeat; height:60px; width:60px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger10"></a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger11">	
										<input type="hidden" name="id" value="0">
										<input type="submit" name="tree" style="background:url(img/c.png) no-repeat; height:60px; width:60px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger11"></a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger12">	
										<input type="hidden" name="id" value="0">
										<input type="submit" name="tree" style="background:url(img/c.png) no-repeat; height:60px; width:60px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger12"></a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger13">	
										<input type="hidden" name="id" value="5383">
										<input type="submit" name="tree" style="background:url(img/p.png) no-repeat; height:60px; width:60px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger13">BALWINDER01</a></strong>
									</div>
									</form>
									</td>
                                    <td style="width:120px; height:100px; padding-top:10px; vertical-align:top;">
									<form name="tree_v" action="tree.php" method="post">
									<div align="center">
									<a id="trigger14">	
										<input type="hidden" name="id" value="5384">
										<input type="submit" name="tree" style="background:url(img/p.png) no-repeat; height:60px; width:60px; border:none" value="">
									</a><br>
                                    <strong><a id="trigger14">BALWINDER02</a></strong>
									</div>
									</form>
									</td>
                                  </tr> -->
                                  
								  
                                </tbody></table>
			</td>
	</tr></tbody></table>		
								</center>
							</div>
			</div>
		</div>
	</div><!--content_layout-->
	<div class="clear"></div>
</div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->        
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                      
<?php include'footer.php' ?>