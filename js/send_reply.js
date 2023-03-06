$(document).ready(function(){
					$("#reply_btn").on('click', function(event){
						event.preventDefault();
						var sender_id=document.getElementById('sender_id').value;
						var replier_id=document.getElementById('replier_id').value;
						var question_id=document.getElementById('question_id').value;
						var reply_msg=document.getElementById("reply_msg").value;
						if(reply_msg.length<1){
							$("#empty_error").fadeIn();
							
						}else{
							$("#empty_error").fadeOut();
						document.getElementById("loader").style.display="inline-block";
						document.getElementById("reply_btn").style.display="none";
						var dest=new XMLHttpRequest();
						
						var path=sender_id+'&question_id='+question_id+'&replier_id='+replier_id+'&reply_msg='+reply_msg;
						
						dest.open("POST", "reply_question.php?sender_id="+path
							, true);
						dest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						dest.send();
						dest.onreadystatechange = function() {
						if(dest.readyState == 4 && dest.status == 200){
							document.getElementById("loader").style.display="none";
							document.getElementById("reply_btn").style.display="inline-block";
							document.getElementById("response").innerHTML=reply_msg;
						}
						}
					}
					});
				});


				
