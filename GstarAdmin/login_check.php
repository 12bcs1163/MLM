<?php
ob_start();
session_start();

$conn=mysqli_connect("localhost","root","","gstarmar_mlm");
if(isset($_POST['submit']))
{
		
		

			$atf1=$_POST['UserID'];
			
			$atf2=$_POST['Password'];

//if($atf1!="admin"){exit();}

 echo $q="select * from Registration where UserID = '$atf1' and Password = '$atf2'";
			$result = mysqli_query($conn,$q);
			
			
			$num = mysqli_num_rows($result);
			
			

			if(isset($num))
					{

 									if($num==1)
 
 											{
 											
 											
 											
 											

 												/*$admin = session_register("admin");
 
 												$sess = $_SESSION['sess']= "admin";
 												
 									echo "hello";*/
 
												 $row=mysqli_fetch_array($result);
												


$_SESSION['user_array']=$row;
																								
 											

    																$_SESSION['aid']=$row['inAdminId'] ;
	
																	$_SESSION['aname']=$row['stAdminName'] ;

 																

																header ("location: indexx.php"); 
																

		}

							
 															else
 																{
 																	header ("location: index.php?error=1"); 
 																}
				}				}
								
								
?>