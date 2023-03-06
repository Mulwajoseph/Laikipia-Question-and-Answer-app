$(document).ready(function(){

//expressions to match with
var name_exp=/^[a-zA-Z]{3,30}$/;
var contacts=/^[0-9]{10,11}$/;
var email_exp=/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
var password_exp=/^[a-zA-Z0-9@#]{6,255}$/;

//validation starts here
var validation_check="false";





//listen to users keyboard actions

$("#firstname").on("keypress keyup keydown", function(){

var firstname=document.getElementById("firstname").value;

if(!firstname.match(name_exp)){
$(".firstname_error").fadeIn("slow");
validation_check="false";
}else
{
	$(".firstname_error").fadeOut(1000);
	validation_check="true";
}
});

$("#middlename").on("keypress keyup keydown", function(){

var middlename=document.getElementById("middlename").value;
if(!middlename.match(name_exp)){
$(".middlename_error").fadeIn("slow");
validation_check="false";
}else
{
	$(".middlename_error").fadeOut(1000);
	validation_check="true";
}
});

$("#surname").on("keypress keyup keydown", function(){

var surname=document.getElementById("surname").value;
if(!surname.match(name_exp)){
$(".surname_error").fadeIn("slow");
validation_check="false";
}else
{
	$(".surname_error").fadeOut(1000);
	validation_check="true";
}
});

$("#email").on("keypress keyup keydown", function(){

var email=document.getElementById("email").value;

if(!email.match(email_exp)){
$(".email_error").fadeIn("slow");
validation_check="false";
}else
{
	$(".email_error").fadeOut(1000);
	validation_check="true";
}
});

$("#username").on("keypress keyup keydown", function(){

var username=document.getElementById("username").value;

if(!username.match(name_exp)){
$(".username_error").fadeIn("slow");
validation_check="false";
}else
{
	$(".username_error").fadeOut(1000);
	validation_check="true";
}
});

$("#password").on("keypress keyup keydown", function(){

var password=document.getElementById("password").value;
var p_length=password.length;
if(p_length<=3){
	document.getElementById("strength").innerHTML="Weak password";
	document.getElementById("strength").style.display="inline-block";
	document.getElementById("strength").style.background="#ff8080";
}else if(p_length>=3 && p_length<=5){
	document.getElementById("strength").innerHTML="Slightly strong password";
	document.getElementById("strength").style.display="inline-block";
	document.getElementById("strength").style.background="#ffc266";
}else if(p_length>=5 && p_length<=7){
	document.getElementById("strength").innerHTML="Strong password";
	document.getElementById("strength").style.display="inline-block";
	document.getElementById("strength").style.background="#9fdfbf";
}else{
	document.getElementById("strength").innerHTML="Very strong password";
	document.getElementById("strength").style.display="inline-block";
	document.getElementById("strength").style.background="#006622";
}



if(!password.match(password_exp)){
$(".password_error").fadeIn("slow");
validation_check="false";
}else
{
	$(".password_error").fadeOut(1000);
	validation_check="true";
}
});

$("#confirm_password").on("keypress keyup keydown", function(){
var password=document.getElementById("password").value;

var confirm_password=document.getElementById("confirm_password").value;

if(!confirm_password.match(password)){
$(".confirm_password_error").fadeIn("slow");
validation_check="false";
}else
{
	$(".confirm_password_error").fadeOut(1000);
	validation_check="true";
}
});

//display submit button if all fields are validated else hide it
function validation_checker(){
	//check if fields are empty
var firstnamee=document.getElementById("firstname").value;
var middlenamee=document.getElementById("middlename").value;
var surnamee=document.getElementById("surname").value;
var emaill=document.getElementById("email").value;
var usernamee=document.getElementById("username").value;
var passwordd=document.getElementById("password").value;
var confirm_passwordd=document.getElementById("confirm_password").value;
if(firstnamee=="" || middlenamee=="" || surnamee=="" ||
 emaill=="" || usernamee==""||
	passwordd=="" || confirm_passwordd==""){
	validation_check="false";
}else{
	validation_check="true";
}
	if(validation_check=="true"){
		
		document.getElementById("submit").style.display="inline-block";
	}else{
		document.getElementById("submit").style.display="none";
	}
}
setInterval(validation_checker,1000);

});