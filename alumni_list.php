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
	  include "alumnimodal.php";
	  ?>
<div class="contentt">
<div class="welcome">
<ul class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="#" style="color:white;">Registered Alumni</a></li>
</ul>
		<hr>
    </div>
<div class="eventtable">
	<div class="card-header">
					<b>Registered Alumni</b>
					<span class="float:right"><a class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="color: white;">
				<i class="fa fa-plus"></i> New Entry
			</a></span>
	</div>
	<?php 
		if (isset($_GET['message'])) { 
			if ($_GET['message'] == "addfailed") {?>
			<div class="alert alert-danger text-center" role="alert" id="alert">
				
				<?php echo "INVALID ID NUMBER OR EMAIL !!! "; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "delete") {?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "SUCCESSFULLY DELETED!"; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "updatesuccess") {?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "UPDATED SUCCESSFULLY!"; ?>
			</div>
              <?php
				}elseif ($_GET['message'] == "addsuccess") { ?>
			<div class="alert alert-success text-center" role="alert" id="alert">
				
				<?php echo "SUCCESSFULLY REGISTERED!"; ?>
			</div>
              <?php
				}
		}

      ?>
<div class="filtercon">
   <form class="filter form-inline" id="filter">
   	 <div class="drop form-group">
   	<label for="program">Program:</label>
    <select name="program" class="form-control" id="myInput" onchange="myFunction()">
     <option>All</option>
	    				<?php
	    				include "connection.php";
	    				$query = "SELECT * FROM programs";
	    				$result = mysqli_query($con, $query);
						if ($result) {
							while($row =mysqli_fetch_assoc($result)){ ?>
							<option><?php echo $row['ABBREVIATION'];?></option>
						<?php
						}
						}
	    				 ?>	
    </select>
</div>
 <div class="drop form-group">
    	<label for="batch">Batch:</label>
    <select name="batch" class="form-control" id="batch" onchange="myBatch()">
    <option>All</option>
	    				<?php
	    				$years = range(1974, strftime("%Y", time())); 
						foreach(array_reverse($years) as $year){ ?>
							<option><?php echo $year;?></option>
						<?php
						}
	    				 ?>	
    </select>
 </div>
 </form>
 <form class="filter form-inline">
<div class="form-group" style="width:100%;">
<input type="search" class="search form-control" id="search" onkeyup="myName()" placeholder="Search Names"style="width: 75%;"/>
</div>
 </form>
 </div>
			<div class="con" id="con">
				<table class="table text-center" id="myTable">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="20%">
					<col width="15%">
					<col width="20%">
				</colgroup>
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Photo</th>
				      <th scope="col">Name</th>
				      <th scope="col">Program</th>
				      <th scope="col">Year Graduated</th>
				      <th scope="col" id="action">Action</th>
				    </tr>
				  </thead>
				  <tbody>
<?php 
$query = "SELECT * FROM alumni";
$result = mysqli_query($con, $query);
$i = 1; 
if ($result) {
	while($row =mysqli_fetch_assoc($result)){ ?>

			  	    <tr>
				      <td><b><?php echo $i++; ?></b></td>
				      <td class="id" style="display: none;"><?php echo $row['ID']; ?></td>
				      <td class="description text-center"> <a target="_blank" href="images/<?php echo $row['PHOTO'];?>"><img src="./images/<?php echo $row['PHOTO']; ?>"></a></td>
				      <td class="name"><?php echo strtoupper($row['LASTNAME']).", ".strtoupper($row['FIRSTNAME'])." ".strtoupper($row['MIDDLENAME']); ?></td>
				      <td class="course"><?php echo $row['COURSE']; ?></td>
				      <td class="batch"><?php echo $row['BATCH']; ?></td>
				      <td class="date_created" style="display: none;"><?php echo $row['DATE_REGISTERED']; ?></td>
				      <td class="text-center" id="actions">
				      	<a href="viewprofile.php?viewid=<?php echo $row['ID'];?>">
				      	<button type="button" class="view btn btn-info" title="View Details" data-mdb-toggle="popover" data-mdb-trigger="hover"><i class="fas fa-eye"></i></button>
				      	</a>
						<button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#deletemodal" title="Delete" data-mdb-toggle="popover" data-mdb-trigger="hover"><i class="fas fa-trash-alt"></i></button>
				      </td>
				    </tr>
<?php
		}
}

if (isset($_POST['save'])) {
	$id = clean($_POST['id_number']);
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
	$date_created = date("F d, Y");

	$filename = $_FILES["profile"]["name"];
    $tempname = $_FILES["profile"]["tmp_name"];
    $folder = "./images/" . $filename;

	$query = "SELECT * FROM alumni WHERE ID_NUMBER = '$id' OR EMAIL = '$email'";
	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result) == 0) {
		$query = "INSERT INTO alumni(ID_NUMBER, PHOTO, LASTNAME, FIRSTNAME, MIDDLENAME, COURSE, MAJOR, BATCH, GENDER, EMAIL, BIRTHDAY, CONTACT, ADDRESS , DATE_REGISTERED)VALUES('$id','$filename','$lastname','$firstname','$middlename', '$program', '$major', '$batch', '$gender', '$email', '$birthday', '$contact', '$address', '$date_created')";

		if(mysqli_query($con, $query)) {
			move_uploaded_file($tempname, $folder);
        	header('location:alumni_list.php?message=addsuccess');
   			exit;	
        } else {
          header('location:alumni_list.php?message=addfailed');
   		 exit;
        	 
        }
	}else {
      	 header('location:alumni_list.php?message=addfailed');
   		 exit;
        	
    }
}

if (isset($_POST['delete'])) {
	$event = $_POST['event'];

	$query ="DELETE FROM alumni WHERE ID = '$event'";
	$result = mysqli_query($con,$query);

	if ($result) {
	   header('location:alumni_list.php?message=delete');
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

			$('#event').val(itemd);

		});
</script>
<script>
function myFunction() {
  // Variables
  let dropdown, table, rows, cells, course, filter;
  dropdown = document.getElementById("myInput");
  table = document.getElementById("myTable");
  rows = table.getElementsByTagName("tr");
  filter = dropdown.value;

  // Loops through rows and hides those with countries that don't match the filter
  for (let row of rows) { // `for...of` loops through the NodeList
    cells = row.getElementsByTagName("td");
    course = cells[4] || null; // gets the 2nd `td` or nothing
    // if the filter is set to 'All', or this is the header row, or 2nd `td` text matches filter
    if (filter === "All" || !course || (filter === course.textContent)) {
      row.style.display = ""; // shows this row
    }
    else {
      row.style.display = "none"; // hides this row
    }
  }
}
function myBatch() {
 // Variables
 let dropdown, table, rows, cells, batch, filter;
  dropdown = document.getElementById("batch");
  table = document.getElementById("myTable");
  rows = table.getElementsByTagName("tr");
  filter = dropdown.value;

  // Loops through rows and hides those with countries that don't match the filter
  for (let row of rows) { // `for...of` loops through the NodeList
    cells = row.getElementsByTagName("td");
    batch = cells[5] || null; // gets the 2nd `td` or nothing
    // if the filter is set to 'All', or this is the header row, or 2nd `td` text matches filter
    if (filter === "All" || !batch || (filter === batch.textContent)) {
      row.style.display = ""; // shows this row
    }
    else {
      row.style.display = "none"; // hides this row
    }
  }
}
function myName() {
var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
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
#alumni{
  transition: 0.5s;
  background: lightgray;
  color: black;
}
#actions a:hover{
	text-decoration: none;
}
.filtercon{
	width: 100%; 
	display: flex;
	flex-direction: row;
	padding-top: 30px;

}
.filter{
	width: 50%;
}
.drop{
	margin-right: 30px;
	margin-left: 30px;
}
.drop select{
	margin-left: 10px;

}
.search{
	width:75%;
	float: right;
	background-image: url('/images/search.png');
    background-position: 10px 10px;
	background-size: 17px;
    background-repeat: no-repeat;
	font-size: 16px;
  padding: 12px 20px 12px 40px;
}
</style>