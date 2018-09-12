// JavaScript Document

																			

function show_message(msg)
{
	  $("#error").show();
	  $("#showerror").html(msg);
																  
	}
	
	function hide_message()
	{
		$("#error").hide();
		}


$(document).ready(function(){

$("#myvid").click(function(){

$("#myvid1").hide();
$("#vid").show();
var posting = $.post( "json/dotodaywork.php", { amount: "Yes" } );
 posting.done(function( data ) {
 
	
	
	});
					 
																			




});

$("#charges").keyup(function(){

var txt=$("#charges").val();


$.ajax({																	
url: "json/packinfo.php?amount="+txt,
type: "GET"
}).done(function (result) {

	$("#packinfo").html(result);
					 
																			
}).fail(function (result) {

alert("error"+result);
return flase;
});

});


$("#checkkaruser").click(function(){

var txt=$("#userid").val();

$.ajax({																	
url: "json/topup.php?step=2&&userid="+txt,
type: "GET"
}).done(function (result) {
var mytxt="Please confirm USERNAME :- "+result+" If it is ok then click ok otherwise click on cancel";																
					 var answer=confirm(mytxt);
					 
					 if (answer){
					$("#myform").submit();
					}
					 
																			
}).fail(function (result) {

alert("error"+result);
return flase;
});
});


						   
						  //CHANGE PASSWORD 
						  
						  $("#updatepassword").click(function(){
															  
															  var oldpass = $("#oldpass").val();
															  	var newpass = $("#newpass").val();
																var confirmpass = $("#confirmpass").val();
															  
															  if(oldpass=="")
															  {
																  show_message("Please enter old password .");
																  return false;
																  }
																  
																   if(newpass=="")
															  {
																 show_message("Please enter new password .");
																  return false;
																  }
																  
																  
																   if(newpass!=confirmpass)
															  {
																 show_message("Confirm password is not matching with new password.");
																  return false;
																  }
																  
																  hide_message();
																  
																  return true;
															  
															  });
						  
						  
						  
						  
						   $("#uploadpayment").click(function(){
															  
															  var amount = $("#Amount").val();
															  	var bankdetails = $("#BankDetails").val();
																var slip = $("#Slip").val();
															  
															  if(amount=="")
															  {
																  show_message("Please enter amount .");
																  return false;
																  }
																  
																   if(bankdetails=="")
															  {
																 show_message("Please enter your paypal details which you have done payment .");
																  return false;
																  }
																  
																  
																   if(slip=="")
															  {
																 show_message("Please select slip from your computer or phone.");
																  return false;
																  }
																  
																  hide_message();
																  
																  return true;
															  
															  });
						  
						  
						  
						  
						   //CHANGE ACCOUNT DETAILS
						     $("#bankupdate").click(function(){
															  
															  var Bank_Name = $("#Bank_Name").val();
															  	
																
															  
															  if(Bank_Name=="")
															  {
																  show_message("Please enter your paypal email address .");
																  return false;
																  }
																  
																 
																  
																  hide_message();
																  
																  return true;
															  
															  });
						   
						   
						   
						   
						   $("#PaymentType").change(function(){
															 
															 var txt=$(this).val();
															// alert(txt);
															 if(txt==""){
																 	$("#showform").html("Select Payment Type .");
																	return false;
																 }
															 
															
															$.ajax({					 
																			
																			url: "json/showform.php?type="+txt,
																			
																			type: "GET"
																		  
																		})
																		.done(function (result) {
																			
																			$("#showform").html(result);
																			
																		})
																		.fail(function (result) {
																			alert("error"+result);
																			return flase;
																			});
															 
															 
															 });
															 
														
														
														
														 
															 
						   
						   
						   	//Step one
							   $("#packid").change(function(){
															 
															
															 var txt=$("#packid").val();
															 if(txt==""){
																 	$("#showpin").html("Select Package .");
																	return false;
																 }
															 
															
															$.ajax({					 
																			
																			url: "json/topup.php?step=1&&packid="+txt,
																			
																			type: "GET"
																		  
																		})
																		.done(function (result) {
																			
																			$("#showpin").html(result);
																			
																		})
																		.fail(function (result) {
																			alert("error"+result);
																			return flase;
																			});
															 
															 
															 });
							   
							   
							   //Step Two
							   	   $("#verifytopup").click(function(){
															 
											
															 var txt=$("#topupuserid").val();
															 if(txt==""){
																 	$("#showname").html("Enter User ID .");
																	return false;
																 }
															 
															
															$.ajax({					 
																			
																			url: "json/topup.php?step=2&&userid="+txt,
																			
																			type: "GET"
																		  
																		})
																		.done(function (result) {
																			
																			
																		
																			
																			$("#showname").html(result);
																			
																		})
																		.fail(function (result) {
																			alert("error"+result);
																			return flase;
																			});
																			
															 
															 
															 });
							   
						   
						   
						   
					   
						   
						  
						   
						   
						   
						   });