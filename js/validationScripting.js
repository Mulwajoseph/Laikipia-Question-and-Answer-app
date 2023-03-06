var width = 1;

function validateHostelDetails() {
    var hostelName= document.forms["hostelRegistrationForm"]["hostel-name"].value;
    var roomsAvailable=document.forms["hostelRegistrationForm"]["total-rooms"].value;
      var singleRoomAmount=document.forms["hostelRegistrationForm"]["single-room-amount"].value;
        var doubleRoomAmount=document.forms["hostelRegistrationForm"]["double-room-amount"].value;
          var bookingAmount=document.forms["hostelRegistrationForm"]["booking-amount"].value;
            var bankName=document.forms["hostelRegistrationForm"]["bank-name"].value;
              var accountName=document.forms["hostelRegistrationForm"]["account-name"].value;
                var accountNumber=document.forms["hostelRegistrationForm"]["account-number"].value;
                  var email=document.forms["hostelRegistrationForm"]["email-address"].value;
                    var phone=document.forms["hostelRegistrationForm"]["phone-contacts"].value;
                    
//regular expression
var output=true;
  
var textFields=/^[a-zA-Z ]+$/;
var numFields=/^[0-9]+$/;
var emailFields=/^[\w-\.]+@([\w-]+\.)+[\w-]+$/;
    /**if (hostelName == null || hostelName == "") {
        document.getElementById("hostel-name-error").innerHTML="Name required";
        output=false;
        return false;}**/
        if(hostelName.match(textFields)){
        	 document.getElementById("hostel-name-error").innerHTML="";
    	 output=true;
    }

    else if(hostelName == null || hostelName == ""){
		document.getElementById("hostel-name-error").innerHTML="Hostel Name required";
        output=false;
        return false;
    }

    else{
    	 document.getElementById("hostel-name-error").innerHTML="Only characters and spaces allowed";
    	 output=false;
    	 return false;
    }

     if(roomsAvailable.match(numFields)){
             document.getElementById("rooms-available-error").innerHTML="";
         output=true;
    }

    else if(roomsAvailable == null || roomsAvailable == ""){
        document.getElementById("rooms-available-error").innerHTML="Rooms  required";
        output=false;
        return false;
    }

    else if(!roomsAvailable.match(numFields)){
         document.getElementById("rooms-available-error").innerHTML="Only Numerics allowed";
         output=false;
         return false;
    }

     if(singleRoomAmount.match(numFields)){
             document.getElementById("single-room-amount-error").innerHTML="";
         output=true;
    }

    else if(singleRoomAmount == null || bookingAmount == ""){
        document.getElementById("single-room-amount-error").innerHTML="Single Room amount required";
        output=false;
        return false;
    }

    else if(!singleRoomAmount.match(numFields)){
         document.getElementById("single-room-amount-error").innerHTML="Only Numerics allowed";
         output=false;
         return false;
    }

    if(doubleRoomAmount.match(numFields)){
             document.getElementById("double-room-amount-error").innerHTML="";
         output=true;
    }

    else if(doubleRoomAmount == null || doubleRoomAmount == ""){
        document.getElementById("double-room-amount-error").innerHTML="Double Room amount required";
        output=false;
        return false;
    }

    else if(!doubleRoomAmount.match(numFields)){
         document.getElementById("double-room-amount-error").innerHTML="Only Numerics allowed";
         output=false;
         return false;
    }

   

    if(bookingAmount.match(numFields)){
             document.getElementById("booking-room-amount-error").innerHTML="";
         output=true;
    }

    else if(bookingAmount == null || bookingAmount == ""){
        document.getElementById("booking-room-amount-error").innerHTML="Booking amount required";
        output=false;
        return false;
    }

    else if(!bookingAmount.match(numFields)){
         document.getElementById("booking-room-amount-error").innerHTML="Only Numerics allowed";
         output=false;
         return false;
    }


    if(bankName.match(textFields)){
             document.getElementById("bank-name-error").innerHTML="";
         output=true;
    }

    else if(bankName == null || bankName == ""){
        document.getElementById("bank-name-error").innerHTML="Bank name required";
        output=false;
        return false;
    }

    else if(!bankName.match(textFields)){
         document.getElementById("bank-name-error").innerHTML="Only characters and spaces allowed";
         output=false;
         return false;
    }

    if(accountName.match(textFields)){
             document.getElementById("account-name-error").innerHTML="";
         output=true;
    }

    else if(accountName == null || accountName == ""){
        document.getElementById("account-name-error").innerHTML="Account name  required";
        output=false;
        return false;
    }

    else if(!accountName.match(textFields)){
         document.getElementById("account-name-error").innerHTML="Only characters and spaces allowed";
         output=false;
         return false;
    }


    if(accountNumber.match(numFields)){
             document.getElementById("account-number-error").innerHTML="";
         output=true;
    }

    else if(accountNumber == null || accountNumber == ""){
        document.getElementById("account-number-error").innerHTML="Account number required";
        output=false;
        return false;
    }

    else if(!accountNumber.match(numFields)){
         document.getElementById("account-number-error").innerHTML="Only Numerics allowed";
         output=false;
         return false;
    }

    if(email.match(emailFields)){
             document.getElementById("email-error").innerHTML="";
         output=true;
    }

    else if(email == null || email == ""){
        document.getElementById("email-error").innerHTML="Email required";
        output=false;
        return false;
    }

    else if(!email.match(emailFields)){
         document.getElementById("email-error").innerHTML="Invalid email";
         output=false;
         return false;
    }

    if(phone.match(numFields)){
             document.getElementById("uphone-error").innerHTML="";
         output=true;
    }

    else if(phone == null || phone == ""){
        document.getElementById("uphone-error").innerHTML="Phone number is required";
        output=false;
        return false;
    }

    else if(!phone.match(numFields)){
         document.getElementById("uphone-error").innerHTML="Only Numerics allowed";
         output=false;
         return false;
    }
   
 
   if(output=true){
    

     document.getElementById("validationLoader").style.display = "block";

     document.getElementById("label2").style.display = "block";
      document.getElementById("tab1").style.display = "none";
       document.getElementById("tab2").style.display = "none";
         document.getElementById("myProgress").style.display = "none";
          document.getElementById("label3").style.display = "block";
           document.getElementById("say").style.display = "none";

    var elem = document.getElementById("myBar"); 
   
    
            
            width=width+33;
            elem.style.width = width + '%'; 
             document.getElementById("label").innerHTML = width * 1 + '%';
             if(width==34){
                document.getElementById("say").innerHTML="You are in level two";

             }
             if(width==67){
                document.getElementById("say").innerHTML="You are in level three";
             }
             if(width==100){
                document.getElementById("say").innerHTML="Completed Successfully";
                document.getElementById("tab4").style.display="block";
                document.getElementById("tab3").style.display="none";
                document.getElementById("tab2").style.display="none";
                document.getElementById("tab1").style.display="none";
             }


             var counter=setInterval(frame,25);
             var count=0;
             function frame(){
                if(count>=100){
                    clearInterval(count);
                }else{
                count++;
                document.getElementById("label2").innerHTML = count * 1 + '%';
            }
             }

             var loaderTimer=setTimeout(showPageTwo,2800);
             function showPageTwo(){
                 document.getElementById("validationLoader").style.display = "none";

                 document.getElementById("label2").style.display = "none";
                  document.getElementById("tab1").style.display = "none";
                     document.getElementById("myProgress").style.display = "block";
                      document.getElementById("label3").style.display = "none";
                       document.getElementById("say").style.display = "block";
                       document.getElementById("tab2").style.display = "block";

             }


   }
   if(output=false){
         document.getElementById("validationLoader").style.display = "none";
    var elem = document.getElementById("myBar"); 
   
    
    
            width=width-33;
            elem.style.width = width + '%'; 
             document.getElementById("label").innerHTML = width * 1 + '%';
             if(width==34){
                document.getElementById("say").innerHTML="You are in level two";
             }
             if(width==67){
                document.getElementById("say").innerHTML="You are in level three";
             }
             if(width==100){
                document.getElementById("say").innerHTML="Completed Successfully";
                document.getElementById("tab4").style.display="block";
                document.getElementById("tab3").style.display="none";
                document.getElementById("tab2").style.display="none";
                document.getElementById("tab1").style.display="none";
   }
    }

}

function validateIndexPage(){
   
        document.getElementById("validationLoader").style.display = "block";

     document.getElementById("label2").style.display = "block";
      document.getElementById("tab2").style.display = "none";
         document.getElementById("myProgress").style.display = "none";
          document.getElementById("label3").style.display = "block";
           document.getElementById("say").style.display = "none";

    var elem = document.getElementById("myBar"); 
   
            width=width+33;
            elem.style.width = width + '%'; 
             document.getElementById("label").innerHTML = width * 1 + '%';
             if(width==34){
                document.getElementById("say").innerHTML="You are in level two";

             }
             if(width==67){
                document.getElementById("say").innerHTML="You are in level three";
             }
             if(width==100){
                document.getElementById("say").innerHTML="Completed Successfully";
                document.getElementById("tab4").style.display="block";
                document.getElementById("tab3").style.display="none";
                document.getElementById("tab2").style.display="none";
                document.getElementById("tab1").style.display="none";
             }


             var counter=setInterval(frame,25);
             var count=0;
             function frame(){
                if(count>=100){
                    clearInterval(count);
                }else{
                count++;
                document.getElementById("label2").innerHTML = count * 1 + '%';
            }
             }

             var loaderTimer=setTimeout(showPageTwo,2800);
             function showPageTwo(){
                 document.getElementById("validationLoader").style.display = "none";

                 document.getElementById("label2").style.display = "none";
                  document.getElementById("tab2").style.display = "none";
                     document.getElementById("myProgress").style.display = "block";
                      document.getElementById("label3").style.display = "none";
                       document.getElementById("say").style.display = "block";
                       document.getElementById("tab3").style.display = "block";

             }
}

function validateDescriptionPage(){
   
        document.getElementById("validationLoader").style.display = "block";

     document.getElementById("label2").style.display = "block";
      document.getElementById("tab3").style.display = "none";
         document.getElementById("myProgress").style.display = "block";
          document.getElementById("label3").style.display = "block";
           document.getElementById("say").style.display = "none";

    var elem = document.getElementById("myBar"); 
   
            width=width+33;
            elem.style.width = width + '%'; 
             document.getElementById("label").innerHTML = width * 1 + '%';
             if(width==34){
                document.getElementById("say").innerHTML="You are in level two";

             }
             if(width==67){
                document.getElementById("say").innerHTML="You are in level three";
             }
             if(width==100){
                document.getElementById("say").innerHTML="Completed Successfully";
                document.getElementById("tab4").style.display="block";
                document.getElementById("tab3").style.display="none";
                document.getElementById("tab2").style.display="none";
                document.getElementById("tab1").style.display="none";
             }


             var counter=setInterval(frame,25);
             var count=0;
             function frame(){
                if(count>=100){
                    clearInterval(count);
                }else{
                count++;
                document.getElementById("label2").innerHTML = count * 1 + '%';
            }
             }

             var loaderTimer=setTimeout(showPageTwo,2800);
             function showPageTwo(){
                 document.getElementById("validationLoader").style.display = "none";

                 document.getElementById("label2").style.display = "none";
                  document.getElementById("tab2").style.display = "none";
                     document.getElementById("myProgress").style.display = "block";
                      document.getElementById("label3").style.display = "none";
                       document.getElementById("say").style.display = "block";
                       document.getElementById("tab3").style.display = "block";

             }
}



