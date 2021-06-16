<?php
$get_id=$_GET['post_id'];
$get_posts="SELECT * FROM comments  WHERE post_id='$get_id' ORDER BY 1 DESC ";
	$run_posts = mysqli_query($conn,$get_posts);

while ($row = mysqli_fetch_array($run_posts)) {
	$com=$row['comment'];
	$com_name=$row['comment_author'];
	$date=$row['c_date'];

	 echo "
	 <div class='row'>
	 <div class='col-md-6 col-md-offset-3'>
	 <div class='panel panel-info'>
	 <div class='panel-body'>
	 <div>
	 <h6 align='left'><strong>$com_name</strong><i> commented </i>on $date</h6>
	
	 <p class='text-primary' style='margin-left:5px; font-size:20px;'>$com</p>
	 </div>
	 </div>
	 </div>
	 </div>
	 </div>";
}

?>