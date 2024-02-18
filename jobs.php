<?php
     session_start();
      ob_start();
      require "connection.php";
      require "function.php";

    if(isset($_SESSION['username'], $_SESSION['password'])) {  
 ?>
<!DOCTYPE html>
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
	  include "jobsmodal.php";?>
<div class="contentt">
<div class="welcome">
<ul class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="#" style="color:white;">Jobs Offer</a></li>
</ul>
		<hr>
    </div>
	<div class="eventtable">
		<div class="card-header">
			<b>List of Jobs Offer</b>
			<span class="float:right"><a class="btn btn-primary float-right"data-toggle="modal" data-target="#exampleModal" style="color: white;">
				<i class="fa fa-plus"></i> New Entry
			</a></span>
		</div>
	<?php 
		if (isset($_GET['message'])) { 
			if ($_GET['message'] == "addfailed") {?>
			<div class="alert alert-danger text-center" role="alert" id="alert">
				
				<?php echo "Error in Query"; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "delete") {?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "JOB OFFER DELETED SUCCESSFULLY!"; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "addsuccess") { ?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "JOB OFFER UPLOADED SUCCESSFULLY!"; ?>
			</div>
              <?php
				}
		}

      ?>
			<div class="con">
				<table class="table">
				<colgroup>
					<col width="5%">
					<col width="30%">
					<col width="15%">
					<col width="30%">
					<col width="20%">
				</colgroup>
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
					  <th scope="col">Banner</th>
				      <th scope="col">Job Title</th>
				      <th scope="col">Description</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
<?php 
$query = "SELECT * FROM jobs_offer";
$result = mysqli_query($con, $query);
$i = 1; 
if ($result) {
	while($row =mysqli_fetch_assoc($result)){ ?>

			  	    <tr>
				      <td><b><?php echo $i++; ?></b></td>
				      <td class="id" style="display: none;"><?php echo $row['ID']; ?></td>
					  <td class="name text-center"> <a target="_blank" href="gallery/<?php echo $row['BANNER'];?>"><img src="./gallery/<?php echo $row['BANNER']; ?>"></a></td>
				      <td class="title"><b><?php echo $row['JOB_TITLE']; ?></b></td>
				      <td class="description"><?php echo $row['DESCRIPTION']; ?></td>
				      <td class="date_created" style="display: none;"><?php echo $row['DATE_CREATED']; ?></td>
				      <td>
				      	<button type="button" class="view btn btn-info" data-toggle="modal" data-target="#viewmodal" title="View Details" data-mdb-toggle="popover" data-mdb-trigger="hover"><i class="fas fa-eye"></i></button>
						<button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#deletemodal" title="Delete" data-mdb-toggle="popover" data-mdb-trigger="hover"><i class="fas fa-trash-alt"></i></button>
				      </td>
				    </tr>
<?php
		}
}

if (isset($_POST['save'])) {
	$title = clean($_POST['title']);
	$description = clean($_POST['description']);
	$date_created = date("F d, Y");
	$filename = $_FILES["banner"]["name"];
    $tempname = $_FILES["banner"]["tmp_name"];
    $folder = "./gallery/" . $filename;

	$query = "INSERT INTO jobs_offer(JOB_TITLE, BANNER , DESCRIPTION, DATE_CREATED)VALUES('$title','$filename','$description', '$date_created')";

	if(mysqli_query($con, $query)) {
		    move_uploaded_file($tempname, $folder);
        	header('location:jobs.php?message=addsuccess');
   			exit;	
    } else {
          header('location:jobs.php?message=addfailed');
   		 exit; 
        }
}

if (isset($_POST['delete'])) {
	$event = $_POST['job'];

	$query ="DELETE FROM jobs_offer WHERE ID = '$event'";
	$result = mysqli_query($con,$query);

	if ($result) {
	   header('location:jobs.php?message=delete');
	   exit;
	  }
	  else{
	  	die(mysqli_error($con));
	  }
}
?>	  </tbody>
				</table>
			</div>
	</div>
	
</div>
	
</div>
</body>
<script>
	setTimeout(function(){
		document.getElementById('alert').style.display = "none";
	},3000);
			
</script>
<script>
	$('.delete').click(function(){

			var $row = $(this).closest('tr');
			var itemd = $row.find('.id').text();

			$('#job').val(itemd);

		});
</script>
<script>

		$('.view').click(function(){
		var $row = $(this).closest('tr');
		var id = $row.find('.id').text();
		var title = $row.find('.title').text();
		var description = $row.find('.description').text();
		var date_created = $row.find('.date_created').text();

		$('#id').val(id);
		$('#title').val(title);
		$('#description').val(description);
		$('#date_created').val(date_created);
		});
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
#jobs{
  transition: 0.5s;
  background: lightgray;
  color: black;
}
</style>