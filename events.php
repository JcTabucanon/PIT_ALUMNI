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
	  include "eventsmodal.php"; ?>
<div class="contentt">
<div class="welcome">
<ul class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="#" style="color:white;">Events</a></li>
</ul>
		<hr>
    </div>	
	<div class="eventtable">
		<div class="card-header">
			<b>List of Events</b>
			<span class="float:right"><a class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="color: white;">
				<i class="fa fa-plus"></i> New Entry
			</a></span>
		</div>
	<?php 
		if (isset($_GET['message'])) { 
			if ($_GET['message'] == "addfailed") {?>
			<div class="alert alert-danger text-center" role="alert" id="alert">
				
				<?php echo "THERE HAS AN EVENT ON THE ASSIGNED DATE, PLEASE MODIFIED THE SCHEDULE!"; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "delete") {?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "EVENT DELETED SUCCESSFULLY!"; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "updatesuccess") {?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "EVENT UPDATED SUCCESSFULLY!"; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "addsuccess") { ?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "EVENT CREATED SUCCESSFULLY!"; ?>
			</div>
              <?php
				}
		}

      ?>
			<div class="con">
				<table class="table">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="15%">
					<col width="20%">
					<col width="25%">
					<col width="20%">
				</colgroup>
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Events</th>
				      <th scope="col">Schedule</th>
				      <th scope="col">Location</th>
				      <th scope="col">Description</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
<?php 
$query = "SELECT * FROM events";
$result = mysqli_query($con, $query);
$i = 1; 
if ($result) {
	while($row =mysqli_fetch_assoc($result)){ ?>

			  	    <tr>
				      <td><b><?php echo $i++; ?></b></td>
				      <td class="id" style="display: none;"><?php echo $row['ID']; ?></td>
				      <td class="event"><b><?php echo $row['EVENT']; ?></b></td>
				      <td class="schedule"><?php echo $row['SCHEDULE']; ?></td>
				      <td class="location"><?php echo $row['LOCATION']; ?></td>
				      <td class="description"><?php echo $row['DESCRIPTION']; ?></td>
				      <td class="date_created" style="display: none;"><?php echo $row['DATE_CREATED']; ?></td>
				      <td>
				      	<button type="button" class="view btn btn-info" data-toggle="modal" data-target="#viewmodal" title="View Details" data-mdb-toggle="popover" data-mdb-trigger="hover"><i class="fas fa-eye"></i></button>
				      	<button type="button" class="edit btn btn-primary" data-toggle="modal" data-target="#editmodal" title="Edit Event" data-mdb-toggle="popover" data-mdb-trigger="hover"><i class="fas fa-edit"></i></button>
						<button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#deletemodal" title="Delete Event" data-mdb-toggle="popover" data-mdb-trigger="hover"><i class="fas fa-trash-alt"></i></button>
				      </td>
				    </tr>
<?php
		}
}

if (isset($_POST['save'])) {
	$event = clean($_POST['event']);
	$date = clean($_POST['date']);
	$time = clean($_POST['time']);
	$location = clean($_POST['location']);
	$description = clean($_POST['description']);
	$date_created = date("F d, Y");
	$time2 = date("h:i A", strtotime($time));
	$date2 = date("F d, Y", strtotime($date));
	$schedule = $date2."\n -\n ".$time2;

	$query = "SELECT * FROM events WHERE SCHEDULE = '$schedule'";
	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result) == 0) {
		$query = "INSERT INTO events(EVENT, SCHEDULE, LOCATION, DESCRIPTION, DATE_CREATED)VALUES('$event','$schedule','$location','$description', '$date_created')";

		if(mysqli_query($con, $query)) {
        	header('location:events.php?message=addsuccess');
   			exit;	
        } else {
          header('location:events.php?message=addfailed');
   		 exit;
        	 
        }
	}else {
      	 header('location:events.php?message=addfailed');
   		 exit;
        	
    }
}

if (isset($_POST['delete'])) {
	$event = $_POST['event'];

	$query ="DELETE FROM events WHERE ID = '$event'";
	$result = mysqli_query($con,$query);

	if ($result) {
	   header('location:events.php?message=delete');
	   exit;
	  }
	  else{
	  	die(mysqli_error($con));
	  }
}

if (isset($_POST['edit'])) {
	$id = clean($_POST['id']);
	$event = clean($_POST['event']);
	$date = clean($_POST['date']);
	$location = clean($_POST['location']);
	$desc = clean($_POST['description']);

	$query = "UPDATE events SET EVENT = '$event', SCHEDULE = '$date', LOCATION = '$location', DESCRIPTION ='$desc' WHERE ID = '$id'";

		if(mysqli_query($con, $query)) {
        	header('location:events.php?message=updatesuccess');
   			exit;	
        } else {
          header('location:events.php?message=addfailed');
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
			var itemd = $row.find('.id').text();

			$('#event').val(itemd);

		});
</script>
<script>
		$('.view').click(function(){
		var $row = $(this).closest('tr');
		var id = $row.find('.id').text();
		var event = $row.find('.event').text();
		var schedule = $row.find('.schedule').text();
		var location = $row.find('.location').text();
		var description = $row.find('.description').text();
		var date_created = $row.find('.date_created').text();

		$('#id').val(id);
		$('#title').val(event);
		$('#date').val(schedule);
		$('#location').val(location);
		$('#description').val(description);
		$('#date_created').val(date_created);
		});
</script>
<script>
		$('.edit').click(function(){
		var $row = $(this).closest('tr');
		var id = $row.find('.id').text();
		var event = $row.find('.event').text();
		var schedule = $row.find('.schedule').text();
		var location = $row.find('.location').text();
		var description = $row.find('.description').text();
		var date_created = $row.find('.date_created').text();

		$('#editid').val(id);
		$('#edittitle').val(event);
		$('#editdate').val(schedule);
		$('#editlocation').val(location);
		$('#editdescription').val(description);
		$('#editdate_created').val(date_created);
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
#events{
  transition: 0.5s;
  background: lightgray;
  color: black;
}
</style>