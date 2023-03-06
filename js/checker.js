function validateBookingDetails() {
    var firstName= document.forms["booking-form"]["firstname"].value;
     var middleName= document.forms["booking-form"]["middlename"].value;
      var lastName= document.forms["booking-form"]["lastname"].value;
       var id= document.forms["booking-form"]["national_id"].value;
        var email= document.forms["booking-form"]["email"].value;
         var contacts= document.forms["booking-form"]["phone"].value;
          var regno= document.forms["booking-form"]["regno"].value;
           var t_code= document.forms["booking-form"]["t_code"].value;
    
//regular expression
var output=true;
  
var textFields=/^[a-zA-Z ]+$/;
var regFields=/^[a-zA-Z0-9\/]+$/;
var alphanumFields=/^[a-zA-Z0-9\_]+$/;
var numFields=/^[0-9]+$/;
var emailFields=/^[\w-\.]+@([\w-]+\.)+[\w-]+$/;
    
        if(firstName.match(textFields)){
           document.getElementById("first-name-error").innerHTML="";
       output=true;
    }

    else if(firstName == null || firstName == ""){
    document.getElementById("first-name-error").innerHTML="This field cannot be empty";

        output=false;
        return false;
    }

    else{
       document.getElementById("first-name-error").innerHTML="Only characters no spaces allowed";
       document.getElementById("woii").style.display="block";
       output=false;
       return false;
    }

    if(middleName.match(textFields)){
           document.getElementById("middle-name-error").innerHTML="";
       output=true;
    }

    else if(middleName == null || middleName == ""){
    document.getElementById("middle-name-error").innerHTML="This field cannot be empty";
        output=false;
        return false;
    }

    else{
       document.getElementById("middle-name-error").innerHTML="Only characters no spaces allowed";
       output=false;
       return false;
    }


    if(lastName.match(textFields)){
           document.getElementById("last-name-error").innerHTML="";
       output=true;
    }

    else if(lastName == null || lastName == ""){
    document.getElementById("last-name-error").innerHTML="This field cannot be empty";
        output=false;
        return false;
    }

    else{
       document.getElementById("last-name-error").innerHTML="Only characters no spaces allowed";
       output=false;
       return false;
    }

    if(id.match(numFields)){
           document.getElementById("id-error").innerHTML="";
       output=true;
    }

    else if(id == null || id == ""){
    document.getElementById("id-error").innerHTML="This field cannot be empty";
        output=false;
        return false;
    }

    else{
       document.getElementById("id-error").innerHTML="Only numbers allowed";
       output=false;
       return false;
    }

    if(email.match(emailFields)){
           document.getElementById("email-error").innerHTML="";
       output=true;
    }

    else if(email == null || email == ""){
    document.getElementById("email-error").innerHTML="This field cannot be empty";
        output=false;
        return false;
    }

    else{
       document.getElementById("email-error").innerHTML="Invalid email";
       output=false;
       return false;
    }

    if(contacts.match(numFields)){
           document.getElementById("contacts-error").innerHTML="";
       output=true;
    }

    else if(contacts == null || contacts == ""){
    document.getElementById("contacts-error").innerHTML="This field cannot be empty";
        output=false;
        return false;
    }

    else{
       document.getElementById("contacts-error").innerHTML="Only characters no spaces allowed";
       output=false;
       return false;
    }

    if(regno.match(regFields)){
           document.getElementById("regno-error").innerHTML="";
       output=true;
    }

    else if(regno == null || regno == ""){
    document.getElementById("regno-error").innerHTML="This field cannot be empty";
        output=false;
        return false;
    }

    else{
       document.getElementById("regno-error").innerHTML="Only alphanums characters no spaces allowed";
       output=false;
       return false;
    }

    if(t_code.match(alphanumFields)){
           document.getElementById("t_code-error").innerHTML="";
       output=true;
    }

    else if(t_code == null || t_code == ""){
    document.getElementById("t_code-error").innerHTML="This field cannot be empty";
        output=false;
        return false;
    }

    else{
       document.getElementById("t_code-error").innerHTML="Only alphanum characters no spaces allowed";
       output=false;
       return false;
    }

  }

  function loadChat(){
  window.location.assign("http://localhost/luohChatApp/luohlivechatassistance.php");
}