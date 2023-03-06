$(document).ready(function(){
					$("#submit_qn").on('click', function(event){
						event.preventDefault();
						var user_id=document.getElementById('user_id').value;
						var name_id=document.getElementById('name_id').value;
						var question=document.getElementById('question').value;
						if(question.length<1){
							$("#empty_error").fadeIn();
							
						}else{
							$("#empty_error").fadeOut();
						document.getElementById("loader").style.display="inline-block";
						document.getElementById("submit_qn").style.display="none";
						var dest=new XMLHttpRequest();
						
						var path=user_id+'&question='+question;
						
						dest.open("POST", "send_question.php?id="+path
							, true);
						dest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						dest.send();
						dest.onreadystatechange = function() {
						if(dest.readyState == 4 && dest.status == 200){
							document.getElementById("loader").style.display="none";
							document.getElementById("submit_qn").style.display="inline-block";
						}
						}
					}
					});
				});


				//function to get sent questions,

				function get_questions(){
		var req = new XMLHttpRequest();//activates this object which establishes continous asynchronous connection to the database
		req.onreadystatechange = function() {//checks the readiness of the connection
			if(req.readyState == 4 && req.status == 200){
				document.getElementById('questions_module').innerHTML = req.responseText;
			}
		}
		req.open('GET', 'questions.php', true);//this function specifies the http method you are using and url path that you want to access
		req.send(); //sends the connection
	}
	
	setInterval(function(){get_questions()}, 1000);