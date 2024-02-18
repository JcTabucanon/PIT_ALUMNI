<?php
     session_start();
      ob_start();
      require "connection.php";
      require "function.php";
	  if(isset($_SESSION['username'], $_SESSION['password'])) { 
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PIT-TC ALUMNI</title>
	<link rel="icon" href="images/pitlogo.png" type="image/x-icon">
</head>
<body>
<?php include "header.php"; ?>
<div class="containerr">
<?php include "sidebar.php";
	  ?>
<div class="contentt">
<div class="welcome">
<ul class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="alumni_list.php">Registered Alumni</a></li>
  <li><a href="#" style="color:white;">View Profile</a></li>
</ul>
		<hr>
    </div>
<div class="eventtable">
	<div class="card-header">
					<b style="color: #2c3e50;">Alumni Information</b>
					<a href="alumni_list.php">
					<button type="button" class="close" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button></a>
	</div>
	<?php
	if (isset($_GET['viewid'])) {

		 	$id = $_GET['viewid'];

		 	$sql ="SELECT * FROM alumni WHERE ID = '$id'";

		    $result= mysqli_query($con,$sql);

	   	    if( $row = mysqli_fetch_assoc($result)) {
	   	    	$birthday = date("F d, Y",strtotime($row['BIRTHDAY']))
	   	    	?>
	   	   <div class="info">
	   	   	<div class="profile">
	   	   	<img src="./images/<?php echo $row['PHOTO'];?>"></div>
	   	   	<fieldset class="viewdata"><legend>ID NUMBER</legend><h4><?php echo $row['ID_NUMBER']; ?></h4></fieldset>
			<fieldset class="viewdata"><legend>NAME</legend><h4><?php echo $row['LASTNAME'].", ".$row['FIRSTNAME']." ".$row['MIDDLENAME']; ?></h4></fieldset>
			<fieldset class="viewdata"><legend>PROGRAM</legend><h4><?php echo $row['COURSE']; ?></h4></fieldset>
			<fieldset class="viewdata"><legend>MAJOR</legend><h4><?php echo $row['MAJOR']; ?></h4></fieldset>
			<fieldset class="viewdata"><legend>BATCH</legend><h4><?php echo $row['BATCH']; ?></h4></fieldset>
			<fieldset class="viewdata"><legend>GENDER</legend><h4><?php echo $row['GENDER']; ?></h4></fieldset>
			<fieldset class="viewdata"><legend>CONTACT</legend><h4><?php echo $row['CONTACT']; ?></h4></fieldset>
			<fieldset class="viewdata"><legend>EMAIL</legend><h4><?php echo $row['EMAIL']; ?></h4></fieldset>
			<fieldset class="viewdata"><legend>BIRTH DATE</legend><h4><?php echo $birthday; ?></h4></fieldset>
			<fieldset class="viewdata"><legend>ADDRESS</legend><h4><?php echo $row['ADDRESS']; ?></h4></fieldset>
			<fieldset class="viewdata"><legend>DATE REGISTERED</legend><h4><?php echo $row['DATE_REGISTERED']; ?></h4></fieldset>	
	   	   </div>
			  <?php
	 }
	 } 	    	
	 ?>
<!-- change profile pic-->
<div class="modal fade" id="editprofilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      	<div class="form-group" style="display: none;">
		<label for="id">ID</label>
        <input type="text" class="form-control" value="<?php echo $row['ID']; ?>" name="id">
    	</div>
		<div class="form-group" style="display: none;">
		<label for="schedule">Picture</label>
		<input type="text" name="oldprofile" class="form-control" value="<?php echo $row['PHOTO']; ?>">
		</div>
		<div class="form-group">
		<label for="location">Select Photo</label>
		<input type="file" name="profile" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg">
		</div>
	  </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="change">Update</button>  
      </div>
      </form>
    </div>
  </div>
</div>
<!-- edit modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		      <div class="modal-body">
		      			<div class="form-group" style="display: none;">
		    				<label for="id">ID</label>
		                    <input type="text" class="form-control" value="<?php echo $row['ID']; ?>" name="id">
		                </div>
				        <div class="form-group">
	    				<label for="event">ID Number</label>
	                    <input type="text" class="form-control" id="" name="id_number" value="<?php echo $row['ID_NUMBER']; ?>" required>
	                </div>
	  				<div class="form-group">
	    				<label for="schedule">Lastname</label>
	    				<input type="text" name="lastname" class="form-control" value="<?php echo $row['LASTNAME']; ?>" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="location">Firstname</label>
	    				<input type="text" name="firstname" class="form-control" value="<?php echo $row['FIRSTNAME']; ?>"  required>
	  				</div>
	  				<div class="form-group">
	    				<label for="location">Middle Name</label>
	    				<input type="text" name="middlename" class="form-control" value="<?php echo $row['MIDDLENAME']; ?>" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="location">Program</label>
	    				<select class="form-control" name="program" required>
	    				<option style="display:none;"><?php echo $row['COURSE']; ?></option>
	    				<?php
	    				include "connection.php";
	    				$query = "SELECT * FROM programs";
	    				$result = mysqli_query($con, $query);
						
						if ($result) {
							while($rows =mysqli_fetch_assoc($result)){ ?>
							<option><?php echo $rows['ABBREVIATION'];?></option>
						<?php
						}
						}
	    				 ?>	
	    				</select>
	  				</div>
					  <div class="form-group">
	    				<label for="major">Major</label>
					<select class=" form-control" name="major" required>
							<option style="display:none;">Select Major</option>
							<option>Science</option>
							<option>Mathematics</option>
							<option>Mechanical</option>
							<option>Electrical</option>
							<option>Automotive</option>
							<option>Mechanical</option>
							<option>Food & Service Management</option>
							<option>Food Technology</option>
							<option>N/A</option>
					</select>
					</div>
	  				<div class="form-group">
	    				<label for="location">Batch</label>
	    				<select class="form-control" name="batch" required>
	    				<option style="display:none;"><?php echo $row['BATCH']; ?></option>
	    				<?php
	    				$years = range(1974, strftime("%Y", time())); 
						foreach(array_reverse($years) as $year){ ?>
							<option><?php echo $year;?></option>
						<?php
						}
	    				 ?>	
	    				</select>
	  				</div>
	  				<div class="form-group">
	    				<label for="location">GENDER</label>
	    				<select class="form-control" name="gender" required>
	    				<option style="display:none;"><?php echo $row['GENDER']; ?></option>
						<option>Male</option>
						<option>Female</option>
						<option>Others</option>
	    				</select>
	  				</div>
	  				<div class="form-group">
	    				<label for="email">Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo $row['EMAIL']; ?>" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="email">Birthday</label>
						<input type="date" name="birthday" class="form-control" value="<?php echo $row['BIRTHDAY']; ?>" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="email">Contact</label>
						<input type="number" name="contact" class="form-control" value="<?php echo $row['CONTACT']; ?>" required>
	  				</div>
	  				<div class="form-group">
	    				<label for="description">Address</label>
	    				<textarea type="text" name="address" class="form-control"><?php echo $row['ADDRESS']; ?></textarea>
	  				</div>
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="submit" class="btn btn-primary" name="edit">Update</button>  
		      </div>
		      </form>
		    </div>
		  </div>
</div>
	 <div class="modal-footer">
	 			<a href="emp_history.php?email=<?php echo $row['EMAIL'];?>" class="edit btn btn-primary" title="view employment history">Employment History</a>
	 			<button type="button" class="edit btn btn-primary" data-toggle="modal" data-target="#editprofilemodal" title="Edit" data-mdb-toggle="popover" data-mdb-trigger="hover">Change Profile Picture</button>
	 			<button type="button" class="edit btn btn-primary" data-toggle="modal" data-target="#editmodal" title="Edit" data-mdb-toggle="popover" data-mdb-trigger="hover">Edit Information</button>
		      	<a href="alumni_list.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> </a>
		      </div>
</div>	
</div>	
</div>
<?php

if (isset($_POST['edit'])) {
	$id = clean($_POST['id']);
	$id_num = clean($_POST['id_number']);
	$lastname = clean($_POST['lastname']);
	$firstname = clean($_POST['firstname']);
	$middlename = clean($_POST['middlename']);
	$program = clean($_POST['program']);
	$major = clean($_POST['major']);
	$batch = clean($_POST['batch']);
	$gender = clean($_POST['gender']);
	$email = clean($_POST['email']);
	$birthday = clean($_POST['birthday']);
	$contact = clean($_POST['contact']);
	$address = clean($_POST['address']);

	$query = "UPDATE alumni SET ID_NUMBER = '$id_num', LASTNAME = '$lastname', FIRSTNAME = '$firstname', MIDDLENAME ='$middlename', COURSE = '$program', MAJOR = '$major', BATCH= '$batch', GENDER = '$gender', EMAIL = '$email', BIRTHDAY = '$birthday', CONTACT = '$contact', ADDRESS = '$address' WHERE ID = '$id'";

		if(mysqli_query($con, $query)) {
        	header('location:alumni_list.php?message=updatesuccess');
   			exit;	
        } else {
          header('location:alumni_list.php?message=addfailed');
   		 exit;
        	 
        }
      
}

if (isset($_POST['change'])) {
	$id = clean($_POST['id']);
	$name = clean($_POST['oldprofile']);

	$filename = $_FILES["profile"]["name"];
    $tempname = $_FILES["profile"]["tmp_name"];
    $folder = "./images/" . $filename;

    $query = "UPDATE alumni SET PHOTO = '$filename' WHERE ID ='$id'";
    if(mysqli_query($con, $query)) {
    	    unlink( "./images/" . $name);
    		move_uploaded_file($tempname, $folder);
        	header('location:alumni_list.php?message=updatesuccess');
   			exit;	
        } else {
          header('location:viewprofle.php?message=addfailed');
   		 exit;
        	 
        }
}
 ?>
</body>
<script>
	setTimeout(function(){
		document.getElementById('alert').style.display = "none";
	},3000);
			
</script>
</html>
<?php 
}else {
    header("location:login.php");
    exit;
    }
  mysqli_close($con);
?>
<style>
.info{
	width: 95%;
	margin: 30px auto;
	align-items: stretch;
	justify-content: stretch;
	border: .5px solid lightgray;
	display: flex;
	flex-wrap: wrap;
	background: #f1f2f6;
	border-radius: 5px;
}
.viewdata{
	margin: 10px 2% 10px 2%;
	padding: 20px;
	width: 46%;
	display: flex;
	background: #ffffff;
	border: .5px solid goldenrod;
	border-radius: 3px;
	align-items: center;
}
legend{
	font-size: 15px;
	padding: 10px;
	margin: 0;
	color: #e1b12c;
	background: transparent;
	width: auto;
	text-align: left;
	font-weight: bolder;
	font-family: century gothic;

}
label{
    float: left;
}
.viewdata h4{
	color: #2c3e50;
	font-size: 15px;
	font-weight: bolder;
	font-family: century gothic;
}
.profile{
	width: 100% ;
	margin: 30px 0 40px 0;

}
.profile img{
	width: 100px;
	height: 100px;
	border: .5px solid lightgray;
}
#alumni{
  transition: 0.5s;
  background: lightgray;
  color: black;
}
</style>