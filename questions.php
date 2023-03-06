<?php
			include "db_connect.php";
			$query=mysqli_query($connect,"SELECT *FROM questions ORDER BY question_id DESC");
			
			$num=mysqli_num_rows($query);
				
				if($num>0){
					while($row=mysqli_fetch_array($query)){
						$user_id=$row["sender_id"];
						$qn_id=$row['question_id'];
						$sql4="SELECT *FROM replies WHERE question_id='$qn_id'";
						$query4=mysqli_query($connect,$sql4);
						$num_replies=mysqli_num_rows($query4);
						$sql="SELECT * FROM users WHERE user_id='$user_id'";
						$query2=mysqli_query($connect,$sql);
						$row2=mysqli_fetch_array($query2);
						?>

						<div class="well w3-white">
					<span style="color:#39ac73;"><img src="<?php echo $row2["profile_image"]; ?>" width="30px" height="30px" class="img-circle w3-card-4" style="margin-top: -8px;">&nbsp<?php echo $row2["username"]; ?> &nbsp <i class="fa fa-clock"></i>&nbspAsked on <?php echo $row['datee']." ".$row["timee"]; ?></span><br><br>
					<span class="text-info">
						<?php echo $row["question"]; ?>
					</span>	<br><br>
					<a href="reply.php?question_id=<?php echo $row['question_id']; ?>&sender_id=<?php echo $row['sender_id']; ?>"><button class="btn btn-default btn-sm" style="border-color: #46b8da; color: #46b8da;"><i class="fa fa-pencil-alt"></i>&nbspPost an answer</button></a>&nbsp
					<a href="user_replies.php?question_id=<?php echo $row['question_id'];?>">
						<button class="btn btn-default btn-sm" style="border-color: #39ac73; color:#39ac73;"><?php echo $num_replies;?> replies</button>
					</a>

				</div>

						<?php
					}
				}
			?>


              