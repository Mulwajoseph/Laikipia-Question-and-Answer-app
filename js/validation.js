

	var name_exp=/^[a-zA-Z]{3,9}$/;
	var email_exp=/^[a-z0-9]+@[a-z]+\.[a-z]{2,4}$/;
	var contact_exp=/^[0-9]{10,11}$/;
	var check="false";
	
$(document).ready(function()//this document.ready() prevents any jquery code from running before the document has finished loading
{	


	$('#firstname').on('keypress keydown keyup' ,function()// this line checks on the event that occurs which are keypress keyup and keydown then it calls the function named function()
{
	var firstname=document.forms["reg_form"]["firstname"].value;
if(!firstname.match(name_exp)){
	$(".firstname_error").fadeIn("slow");
	check="false";
}else{
	$(".firstname_error").fadeOut(1000);
	check="true";
}


});

		$('#middlename').on('keypress keydown keyup' ,function()// this line checks on the event that occurs which are keypress keyup and keydown then it calls the function named function()
{
	var middlename=document.forms["reg_form"]["middlename"].value;
if(!middlename.match(name_exp)){
	$(".middlename_error").fadeIn("slow");
	check="false";
}else{
	$(".middlename_error").fadeOut(1000);
	check="true";
}


});

		function check(){
			if(check=="true"){
				document.getElementById("submit").style.display="inline-block";
			}else{
				document.getElementById("submit").style.display="none";
			}
		}
		setInterval(check,2000);


});

	




