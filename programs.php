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
	  include "programmodal.php"; 

?>
<div class="contentt">
<div class="welcome">
<ul class="breadcrumb">
  <li><a href="#">Dashboard</a></li>
  <li><a href="#" style="color:white;">Programs</a></li>
</ul>
		<hr>
    </div>
		<div class="eventtable">
			<div class="card-header">
							<b>List of Programs</b>
							<span class="float:right"><a class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="color: white;">
						<i class="fa fa-plus"></i> New Entry
					</a></span>
			</div>
			<?php 
		if (isset($_GET['message'])) { 
			if ($_GET['message'] == "addfailed") {?>
			<div class="alert alert-danger text-center" role="alert" id="alert">
				
				<?php echo "PROGRAM ALREADY EXIST!"; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "delete") {?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "PROGRAM SUCCESSFULLY DELETED!"; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "updatesuccess") {?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "PROGRAM SUCCESSFULLY UPDATED!"; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "addsuccess") { ?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "PROGRAM SUCCESSFULLY SAVE!"; ?>
			</div>
              <?php
				}
		}

      ?>
			<div class="con">
				<table class="table">
				<colgroup>
					<col width="10%">
					<col width="25%">
					<col width="15%">
					<col width="30%">
					<col width="20%">
				</colgroup>
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Program Title</th>
				      <th scope="col">Abbreviation</th>
				      <th scope="col">Description</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
<?php 
$query = "SELECT * FROM programs";
$result = mysqli_query($con, $query);
$i = 1; 
if ($result) {
	while($row =mysqli_fetch_assoc($result)){ ?>

			  	    <tr>
				      <td><b><?php echo $i++; ?></b></td>
				      <td class="id" style="display: none;"><?php echo $row['ID']; ?></td>
				      <td class="title"><?php echo $row['TITLE']; ?></td>
				      <td class="program"><b><?php echo $row['ABBREVIATION']; ?></b></td>
				      <td class="description"><?php echo $row['DESCRIPTION']; ?></td>
				      <td class="date" style="display: none;"><?php echo $row['DATE_ADDED']; ?></td>
				      <td class="text-center">
				      	<button type="button" class="view btn btn-info" data-toggle="modal" data-target="#viewmodal" title="View Details" data-mdb-toggle="popover" data-mdb-trigger="hover"><i class="fas fa-eye"></i></button>
				      	<button type="button" class="edit btn btn-primary" data-toggle="modal" data-target="#editmodal" title="Edit Program" data-mdb-toggle="popover" data-mdb-trigger="hover"><i class="fas fa-edit"></i></button>
						<button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#deletemodal" title="Delete Program" data-mdb-toggle="popover" data-mdb-trigger="hover"><i class="fas fa-trash-alt"></i></button>
				      </td>
				    </tr>
<?php
		}
}

if (isset($_POST['save'])) {
	$title = clean($_POST['title']);
	$abbr = clean($_POST['abbreviation']);
	$desc = clean($_POST['description']);
	$date = date("F d,Y");

	$query = "SELECT * FROM programs WHERE ABBREVIATION = '$abbr'";
	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result) == 0) {
		$query = "INSERT INTO programs(TITLE, ABBREVIATION, DESCRIPTION, DATE_ADDED)VALUES('$title','$abbr','$desc','$date')";

		if(mysqli_query($con, $query)) {
        	header('location:programs.php?message=addsuccess');
   			exit;	
        } else {
          header('location:programs.php?message=addfailed');
   		 exit;
        	 
        }
	}else {
      	 header('location:programs.php?message=addfailed');
   		 exit;
        	
    }
}

if (isset($_POST['delete'])) {
	$abb = $_POST['course'];

	$query ="DELETE FROM programs WHERE ABBREVIATION = '$abb'";
	$result = mysqli_query($con,$query);

	if ($result) {
	   header('location:programs.php?message=delete');
	   exit;
	  }
	  else{
	  	die(mysqli_error($con));
	  }
}

if (isset($_POST['edit'])) {
	$id = clean($_POST['id']);
	$title = clean($_POST['title']);
	$abbr = clean($_POST['abbreviation']);
	$desc = clean($_POST['description']);

	$query = "UPDATE programs SET TITLE = '$title', ABBREVIATION = '$abbr', DESCRIPTION ='$desc' WHERE ID = '$id'";

		if(mysqli_query($con, $query)) {
        	header('location:programs.php?message=updatesuccess');
   			exit;	
        } else {
          header('location:programs.php?message=addfailed');
   		 exit;
        	 
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
			var itemd = $row.find('.program').text();

			$('#course').val(itemd);

		});
</script>
<script>

		$('.view').click(function(){
		var $row = $(this).closest('tr');
		var id = $row.find('.id').text();
		var title = $row.find('.title').text();
		var program = $row.find('.program').text();
		var description = $row.find('.description').text();
		var date = $row.find('.date').text();

		$('#id').val(id);
		$('#title').val(title);
		$('#program').val(program);
		$('#description').val(description);
		$('#date_created').val(date);
		});
</script>
<script>

		$('.edit').click(function(){
		var $row = $(this).closest('tr');
		var id = $row.find('.id').text();
		var title = $row.find('.title').text();
		var program = $row.find('.program').text();
		var description = $row.find('.description').text();

		$('#id').val(id);
		$('#item').val(title);
		$('#type').val(program);
		$('#acquisition').val(description);
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
#programs{
  transition: 0.5s;
  background: lightgray;
  color: black;
}
</style>