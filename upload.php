<?php
include "connection.php";
if (isset($_POST['submit'])) {

	$count = count($_FILES['image']['name']);
	for ($i=0; $i < $count; $i++) { 
		$image_name = $_FILES['image']['name'][$i];
		$temp_name  = $_FILES['image']['tmp_name'][$i];
		$target_path = "./gallery/".$image_name;
		$title = $_POST['title'];
		$date = date("F d, Y");

		if (move_uploaded_file($temp_name, $target_path)) {
			$sql = "INSERT INTO gallery(TITLE,IMAGE,DATE_UPLOAD)VALUES('$title','$image_name','$date')";
			$result = mysqli_query($con,$sql);
		}
	}

		if ($result) {
			 header('location:gallery.php?message=addsuccess');
   		 exit;
		}

 }


 ?>