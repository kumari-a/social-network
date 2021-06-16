<style>
	.pagination a{
		color: black;
		float: left;
		padding: 8px 16px;
		text-decoration: none;
		transition: background-color .3s;
	}

	.pegination a:hover:not(.active){
		background-color: #ddd;
	}

</style>

<?php
$query="SELECT * FROM alumni";
$result = mysqli_query($conn,$query);
$total_post = mysqli_num_rows($result);
$total_pages=ceil($total_post/$per_page);
echo "
<center>
<div class='pegination'>
<a href='alumni.php?page=1'>First Page</a>
";
for ($i=1; $i <=$total_pages; $i++) { 
	# code...
	echo "<a href='alumni.php?page=$i'>$i</a>";
}

echo "<a href='alumni.php?page=$total_pages'>Last Page</a></div></center>";
?>