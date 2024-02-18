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
	  include "employabilitymodal.php"; ?>
<div class="contentt">
	<?php 
		if (isset($_GET['employability'])) { 
			if ($_GET['employability'] == "Employed") {?>
	<div class="welcome">
<ul class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="employability.php?employability=Employed">Employability Status</a></li>
  <li><a href="#" style="color:white;">Employed</a></li>
</ul>
		<hr>
    </div>
		<div class="eventtable">
	<nav class="navbar navbar-default" style="position: static;">
  <div class="container-fluid">
    <ul class="emp navbar-nav" style="display: inline-block;">
      <li class="active"><a href="employability.php?employability=Employed">EMPLOYED</a></li>
      <li><a href="employability.php?employability=Unemployed">UNEMPLOYED</a></li>
      <li><a href="employability.php?employability=Self-Employed">SELF-EMPLOYED</a></li>
    </ul>
  </div>
</nav>
<div class="d2">
	<?php
	$query = "SELECT * FROM programs";
		$result = mysqli_query($con, $query); 
        if ($result) {
		while ($row=mysqli_fetch_assoc($result)) {
			$name = $row['ABBREVIATION'];
			?>
		<a href="employed.php?course=<?php echo $name;?>">
		<div class="items">
			<div class="icon">
				<span><?php echo $name; ?></span>
			</div>
			<div class="data">
				<h5>
				<?php
	            $emp = "Employed";
				$sql = "SELECT * FROM survey WHERE EMPLOYABILITY = '$emp' AND COURSE = '$name'";
				 $resul = mysqli_query($con,$sql);
				if ($totaln = mysqli_num_rows($resul)) {
					echo $totaln;
				}else{
					echo "0";
				} ?>
				</h5>
			</div>
			
		</div>
		</a>
	<?php
	}
	}
	?>
	</div>
	<div class="filtercon">
   <form class="filter form-inline">
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
 <div class="form-group">
 <a href="printreport.php?emp=employed" class="btn btn-primary">Print Report</a>
 </div>
 </form>
 <form class="filter form-inline">
<div class="form-group" style="width:100%;">
<input type="search" class="search form-control" id="search" onkeyup="myName()" placeholder="Search Names"style="width: 75%;"/>
</div>
 </form>
 </div>
			<div class="con">
				<table class="table text-center" id="myTable">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="20%">
					<col width="20%">
					<col width="15%">
				</colgroup>
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Batch</th>
				      <th scope="col">Name</th>
				      <th scope="col">Program</th>
				      <th scope="col">Job Title</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
<?php 
$status = "Employed";
$query = "SELECT * FROM survey WHERE EMPLOYABILITY = '$status'";
$result = mysqli_query($con, $query);
$i = 1; 
if ($result) {
	while($row =mysqli_fetch_assoc($result)){
		$bday = date("F d, Y", strtotime($row['BIRTHDAY']));
		$_SESSION['email'] = $row['EMAIL'];
		?>

	  	    <tr>
		      <td><b><?php echo $i++; ?></b></td>
		      <td class="id" style="display: none;"><?php echo $row['ID']; ?></td>
		      <td class="batch"><?php echo $row['BATCH']; ?></td>
		      <td class="name"><?php echo $row['LASTNAME'].", ".$row['FIRSTNAME']." ".$row['MIDDLENAME']; ?></td>
		      <td class="course"><?php echo $row['COURSE']; ?></td>
		      <td class="major" style="display: none;"><?php echo $row['MAJOR'];?></td>
		      <td class="status" style="display: none;"><?php echo $row['CIVIL'];?></td>
		      <td class="gender" style="display: none;"><?php echo $row['GENDER'];?></td>
		      <td class="contact" style="display: none;"><?php echo $row['CONTACT'];?></td>
			  <td class="email" style="display: none;"><?php echo $row['EMAIL']; ?></td>
		      <td class="permanent" style="display: none;"><?php echo $row['PERMANENT_ADD']; ?></td>
		      <td class="birthday" style="display: none;"><?php echo $bday;?></td>
			  <td class="exam" style="display: none;"><?php echo $row['EXAM'];?></td>
		      <td class="date_taken" style="display: none;"><?php echo date("F d, Y",strtotime($row['DATE_TAKEN']));?></td>
		      <td class="rating" style="display: none;"><?php echo $row['RATING'];?></td>
			  <td class="rtc" style="display: none;"><?php echo $row['RTC'].'</br>'.$row['ORTC']; ?></td>
			  <td class="advance" style="display: none;"><?php echo $row['ADVANCE'];?></td>
		      <td class="credit_earned" style="display: none;"><?php echo $row['CREDIT_EARNED'];?></td>
		      <td class="training_institution" style="display: none;"><?php echo $row['TRAINING_INSTITUTION'];?></td>
		      <td class="mpas" style="display: none;"><?php echo $row['MPAS'].'</br>'.$row['OMPAS'];?></td>
			  <td class="emp_type" style="display: none;"><?php echo $row['EMP_TYPE'];?></td>
		      <td class="position" style="display: none;"><?php echo $row['POSITION'];?></td>
		      <td class="job"><?php echo $row['JOB_TITLE']; ?></td>
		      <td class="company" style="display: none;"><?php echo $row['COMPANY_NAME'];?></td>
		      <td class="com_add" style="display: none;"><?php echo $row['COMPANY_ADDRESS'];?></td>
			  <td class="mlb" style="display: none;"><?php echo $row['MLB'];?></td>
			  <td class="com_con" style="display: none;"><?php echo $row['COM_CONTACT'];?></td>
			  <td class="skills_learned" style="display: none;"><?php echo $row['SKILLS_LEARNED'].'</br>'.$row['OTHER_SKILLS'];?></td>
			  <td class="suggestions" style="display: none;"><?php echo $row['SUGGESTIONS'];?></td>
			  <td class="profit" style="display: none;"><?php echo $row['PROFIT'];?></td>
		      <td class="date" style="display: none;"><?php echo $row['DATE_SUBMIT']; ?></td>
		      <td class="text-center">
		      	<button type="button" class="view btn btn-info" title="View Details" data-toggle="modal" data-target="#myModal"><i class="fas fa-eye"></i></button>
		      </td>
		    </tr>
<?php
		}
}
?>	  </tbody>
				</table>
			</div>
		</div>
              <?php
				}elseif ($_GET['employability'] == "Unemployed") {?>
<div class="welcome">
<ul class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="employability.php?employability=Employed">Employability Status</a></li>
  <li><a href="#" style="color:white;">Unemployed</a></li>
</ul>
		<hr>
    </div>
			<div class="eventtable">
	<nav class="navbar navbar-default" style="position: static;">
  <div class="container-fluid">
    <ul class="emp navbar-nav" style="display: inline-block;">
      <li><a href="employability.php?employability=Employed">Employed</a></li>
      <li class="active"><a href="employability.php?employability=Unemployed">Unemployed</a></li>
      <li><a href="employability.php?employability=Self-Employed">Self-Employed</a></li>
    </ul>
  </div>
</nav>
<div class="d2">
	<?php
	$query = "SELECT * FROM programs";
		$result = mysqli_query($con, $query); 
        if ($result) {
		while ($row=mysqli_fetch_assoc($result)) {
			$name = $row['ABBREVIATION'];?>
		<a href="unemployed.php?course=<?php echo $name;?>">
		<div class="items">
			<div class="icon">
				<span><?php echo $name; ?></span>
			</div>
			<div class="data">
				<h5>
				<?php
	            $emp = "Unemployed";
				$sql = "SELECT * FROM survey WHERE EMPLOYABILITY = '$emp' AND COURSE = '$name'";
				 $resul = mysqli_query($con,$sql);
				if ($totaln = mysqli_num_rows($resul)) {
					echo $totaln;
				}else{
					echo "0";
				} ?>
				</h5>
			</div>
			
		</div>
		</a>
	<?php
	}
	}
	?>
	</div>
	<div class="filtercon">
   <form class="filter form-inline">
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
 <div class="form-group">
 <a href="printreport.php?emp=unemployed" class="btn btn-primary">Print Report</a>
 </div>
 </form>
 <form class="filter form-inline">
<div class="form-group" style="width:100%;">
<input type="search" class="search form-control" id="search" onkeyup="myName()" placeholder="Search Names"style="width: 75%;"/>
</div>
 </form>
 </div>
			<div class="con">
				<table class="table text-center" id="myTable">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="20%">
					<col width="20%">
					<col width="15%">
				</colgroup>
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Batch</th>
				      <th scope="col">Name</th>
				      <th scope="col">Program</th>
				      <th scope="col">Email</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
<?php 
$status = "Unemployed";
$query = "SELECT * FROM survey WHERE EMPLOYABILITY = '$status'";
$result = mysqli_query($con, $query);
$i = 1; 
if ($result) {
	while($row =mysqli_fetch_assoc($result)){ 
	$bday = date("F d, Y", strtotime($row['BIRTHDAY']));
	?>
	    <tr>
      <td><b><?php echo $i++; ?></b></td>
      <td class="id" style="display: none;"><?php echo $row['ID']; ?></td>
      <td class="batch"><?php echo $row['BATCH']; ?></td>
		      <td class="name"><?php echo $row['LASTNAME'].", ".$row['FIRSTNAME']." ".$row['MIDDLENAME']; ?></td>
		      <td class="course"><?php echo $row['COURSE']; ?></td>
		      <td class="major" style="display: none;"><?php echo $row['MAJOR'];?></td>
		      <td class="status" style="display: none;"><?php echo $row['CIVIL'];?></td>
		      <td class="gender" style="display: none;"><?php echo $row['GENDER'];?></td>
		      <td class="contact" style="display: none;"><?php echo $row['CONTACT'];?></td>
			  <td class="email"><?php echo $row['EMAIL']; ?></td>
		      <td class="permanent" style="display: none;"><?php echo $row['PERMANENT_ADD']; ?></td>
		      <td class="birthday" style="display: none;"><?php echo $bday;?></td>
			  <td class="exam" style="display: none;"><?php echo $row['EXAM'];?></td>
		      <td class="date_taken" style="display: none;"><?php echo date("F d, Y",strtotime($row['DATE_TAKEN']));?></td>
		      <td class="rating" style="display: none;"><?php echo $row['RATING'];?></td>
			  <td class="rtc" style="display: none;"><?php echo $row['RTC'].'</br>'.$row['ORTC']; ?></td>
			  <td class="advance" style="display: none;"><?php echo $row['ADVANCE'];?></td>
		      <td class="credit_earned" style="display: none;"><?php echo $row['CREDIT_EARNED'];?></td>
		      <td class="training_institution" style="display: none;"><?php echo $row['TRAINING_INSTITUTION'];?></td>
		      <td class="mpas" style="display: none;"><?php echo $row['MPAS'].'</br>'.$row['OMPAS'];?></td>
			  <td class="reason_unemployed" style="display: none;"><?php echo $row['UNEMPLOYED_REASONS']."</br>".$row['OTHER_UNEMP_REASON'];?></td>
			  <td class="suggestions" style="display: none;"><?php echo $row['SUGGESTIONS'];?></td>
      <td class="date" style="display: none;"><?php echo $row['DATE_SUBMIT']; ?></td>
      <td class="text-center">
      <button type="button" class="viewunemp btn btn-info" title="View Details" data-toggle="modal" data-target="#UnemployedModal"><i class="fas fa-eye"></i></button>
      </td>
    </tr>
<?php
		}
}
?>	  </tbody>
				</table>
			</div>
		</div>
              <?php
				}elseif ($_GET['employability'] == "Self-Employed") { ?>
<div class="welcome">
<ul class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="employability.php?employability=Employed">Employability Status</a></li>
  <li><a href="#" style="color:white;">Self-Employed</a></li>
</ul>
		<hr>
    </div>
			<div class="eventtable">
	<nav class="navbar navbar-default" style="position: static;">
  <div class="container-fluid">
    <ul class="emp navbar-nav" style="display: inline-block;">
      <li><a href="employability.php?employability=Employed">Employed</a></li>
      <li><a href="employability.php?employability=Unemployed">Unemployed</a></li>
      <li class="active"><a href="employability.php?employability=Self-Employed">Self-Employed</a></li>
    </ul>
  </div>
</nav>
<div class="d2">
	<?php
	$query = "SELECT * FROM programs";
		$result = mysqli_query($con, $query); 
        if ($result) {
		while ($row=mysqli_fetch_assoc($result)) {
			$name = $row['ABBREVIATION'];?>
		<a href="self_employed.php?course=<?php echo $name;?>">
		<div class="items">
			<div class="icon">
				<span><?php echo $name; ?></span>
			</div>
			<div class="data">
				<h5>
				<?php
	            $emp = "Self-Employed";
				$sql = "SELECT * FROM survey WHERE EMPLOYABILITY = '$emp' AND COURSE = '$name'";
				 $resul = mysqli_query($con,$sql);

				if ($totaln = mysqli_num_rows($resul)) {
					echo $totaln;
				}else{
					echo "0";
				} ?>
				</h5>
			</div>
		</div>
		</a>
	<?php
	}
	}
	?>
	</div>
	<div class="filtercon">
   <form class="filter form-inline">
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
 <div class="form-group">
 <a href="printreport.php?emp=self-employed" class="btn btn-primary">Print Report</a>
 </div>
 </form>
 <form class="filter form-inline">
<div class="form-group" style="width:100%;">
<input type="search" class="search form-control" id="search" onkeyup="myName()" placeholder="Search Names"style="width: 75%;"/>
</div>
 </form>
 </div>

			<div class="con">
				<table class="table text-center" id="myTable">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="20%">
					<col width="20%">
					<col width="15%">
				</colgroup>
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Batch</th>
				      <th scope="col">Name</th>
				      <th scope="col">Program</th>
				      <th scope="col">Email</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
<?php 
$status = "Self-Employed";
$query = "SELECT * FROM survey WHERE EMPLOYABILITY = '$status'";
$result = mysqli_query($con, $query);
$i = 1; 
if ($result) {
	while($row =mysqli_fetch_assoc($result)){ 
		$bday = date("F d, Y", strtotime($row['BIRTHDAY']));
		?>
	  	    <tr>
		      <td><b><?php echo $i++; ?></b></td>
		      <td class="id" style="display: none;"><?php echo $row['ID']; ?></td>
		      <td class="batch"><?php echo $row['BATCH']; ?></td>
		      <td class="name"><?php echo $row['LASTNAME'].", ".$row['FIRSTNAME']." ".$row['MIDDLENAME']; ?></td>
		      <td class="course"><?php echo $row['COURSE']; ?></td>
		      <td class="major" style="display: none;"><?php echo $row['MAJOR'];?></td>
		      <td class="status" style="display: none;"><?php echo $row['CIVIL'];?></td>
		      <td class="gender" style="display: none;"><?php echo $row['GENDER'];?></td>
		      <td class="contact" style="display: none;"><?php echo $row['CONTACT'];?></td>
			  <td class="email"><?php echo $row['EMAIL']; ?></td>
		      <td class="permanent" style="display: none;"><?php echo $row['PERMANENT_ADD']; ?></td>
		      <td class="birthday" style="display: none;"><?php echo $bday;?></td>
			  <td class="exam" style="display: none;"><?php echo $row['EXAM'];?></td>
		      <td class="date_taken" style="display: none;"><?php echo date("F d, Y",strtotime($row['DATE_TAKEN']));?></td>
		      <td class="rating" style="display: none;"><?php echo $row['RATING'];?></td>
			  <td class="rtc" style="display: none;"><?php echo $row['RTC'].'</br>'.$row['ORTC']; ?></td>
			  <td class="advance" style="display: none;"><?php echo $row['ADVANCE'];?></td>
		      <td class="credit_earned" style="display: none;"><?php echo $row['CREDIT_EARNED'];?></td>
		      <td class="training_institution" style="display: none;"><?php echo $row['TRAINING_INSTITUTION'];?></td>
		      <td class="mpas" style="display: none;"><?php echo $row['MPAS'].'</br>'.$row['OMPAS'];?></td>
		      <td class="business" style="display: none;"><?php echo $row['BUSINESS_NAME'];?></td>
		      <td class="business_add" style="display: none;"><?php echo $row['BUSINESS_ADDRESS'];?></td>
			  <td class="mlb" style="display: none;"><?php echo $row['MLB'];?></td>
			  <td class="com_con" style="display: none;"><?php echo $row['COM_CONTACT'];?></td>
			  <td class="skills_learned" style="display: none;"><?php echo $row['SKILLS_LEARNED'].'</br>'.$row['OTHER_SKILLS'];?></td>
			  <td class="suggestions" style="display: none;"><?php echo $row['SUGGESTIONS'];?></td>
			  <td class="profit" style="display: none;"><?php echo $row['PROFIT'];?></td>
      <td class="date" style="display: none;"><?php echo $row['DATE_SUBMIT']; ?></td>
      <td class="text-center">
	  <button type="button" class="viewself btn btn-info" title="View Details" data-toggle="modal" data-target="#SelfemployedModal"><i class="fas fa-eye"></i></button>
      </td>
    </tr>
<?php
		}
}
?>	  </tbody>
				</table>
			</div>
		</div>
              <?php
				}
		}

      ?>
</div>
	
</div>
</body>
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
    batch = cells[2] || null; // gets the 2nd `td` or nothing
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
<script>
		$('.view').click(function(){
		var $row = $(this).closest('tr');
		var name = $row.find('.name').text();
		var email = $row.find('.email').text();
		var status = $row.find('.status').text();
		var gender = $row.find('.gender').text()
		var contact = $row.find('.contact').text();
		var permanent = $row.find('.permanent').text();
		var birthday = $row.find('.birthday').text();
		var batch = $row.find('.batch').text();
		var course = $row.find('.course').text();
		var major = $row.find('.major').text();
		var rtc = $row.find('.rtc').text();
		var exam = $row.find('.exam').text();
		var date_taken = $row.find('.date_taken').text();
		var rating = $row.find('.rating').text();
		var advance = $row.find('.advance').text();
		var credit_earned = $row.find('.credit_earned').text();
		var training_institution = $row.find('.training_institution').text();
		var mpas = $row.find('.mpas').text();
		var emp_type = $row.find('.emp_type').text();
		var job = $row.find('.job').text();
		var position = $row.find('.position').text();
		var company = $row.find('.company').text();
		var com_add = $row.find('.com_add').text();
		var com_con = $row.find('.com_con').text();
		var profit = $row.find('.profit').text();
		var skills_learned = $row.find('.skills_learned').text();
		var mlb = $row.find('.mlb').text();
		var suggestions = $row.find('.suggestions').text();
		var date = $row.find('.date').text();

		$('#name').text(name);
		$('#email').text(email);
		$('#status').text(status);
		$('#gender').text(gender);
		$('#contact').text(contact);
		$('#permanent').text(permanent);
		$('#birthday').text(birthday);
		$('#embatch').text(batch);
		$('#course').text(course);
		$('#major').text(major);
		$('#rtc').text(rtc);
		$('#exam').text(exam);
		$('#date_taken').text(date_taken);
		$('#rating').text(rating);
		$('#advance').text(advance);
		$('#credit_earned').text(credit_earned);
		$('#training_institution').text(training_institution);
		$('#mpas').text(mpas);
		$('#emp_type').text(emp_type);
		$('#job').text(job);
		$('#position').text(position);
		$('#company').text(company);
		$('#com_add').text(com_add);
		$('#com_con').text(com_con);
		$('#profit').text(profit);
		$('#skills_learned').text(skills_learned);
		$('#mlb').text(mlb);
		$('#suggestions').text(suggestions);
		$('#sub_date').text(date);
		});

		$('.viewunemp').click(function(){
		var $row = $(this).closest('tr');
		var name = $row.find('.name').text();
		var email = $row.find('.email').text();
		var status = $row.find('.status').text();
		var gender = $row.find('.gender').text()
		var contact = $row.find('.contact').text();
		var permanent = $row.find('.permanent').text();
		var birthday = $row.find('.birthday').text();
		var batch = $row.find('.batch').text();
		var course = $row.find('.course').text();
		var major = $row.find('.major').text();
		var rtc = $row.find('.rtc').text();
		var exam = $row.find('.exam').text();
		var date_taken = $row.find('.date_taken').text();
		var rating = $row.find('.rating').text();
		var advance = $row.find('.advance').text();
		var credit_earned = $row.find('.credit_earned').text();
		var training_institution = $row.find('.training_institution').text();
		var mpas = $row.find('.mpas').text();
		var reason_unemployed = $row.find('.reason_unemployed').text();
		var suggestions = $row.find('.suggestions').text();
		var date = $row.find('.date').text();

		$('#name2').text(name);
		$('#email2').text(email);
		$('#status2').text(status);
		$('#gender2').text(gender);
		$('#contact2').text(contact);
		$('#permanent2').text(permanent);
		$('#birthday2').text(birthday);
		$('#embatch2').text(batch);
		$('#course2').text(course);
		$('#major2').text(major);
		$('#rtc2').text(rtc);
		$('#exam2').text(exam);
		$('#date_taken2').text(date_taken);
		$('#rating2').text(rating);
		$('#advance2').text(advance);
		$('#credit_earned2').text(credit_earned);
		$('#training_institution2').text(training_institution);
		$('#mpas2').text(mpas);
		$('#reason').text(reason_unemployed);
		$('#suggestions2').text(suggestions);
		$('#sub_date2').text(date);
		});

		$('.viewself').click(function(){
		var $row = $(this).closest('tr');
		var name = $row.find('.name').text();
		var email = $row.find('.email').text();
		var status = $row.find('.status').text();
		var gender = $row.find('.gender').text()
		var contact = $row.find('.contact').text();
		var permanent = $row.find('.permanent').text();
		var birthday = $row.find('.birthday').text();
		var batch = $row.find('.batch').text();
		var course = $row.find('.course').text();
		var major = $row.find('.major').text();
		var rtc = $row.find('.rtc').text();
		var exam = $row.find('.exam').text();
		var date_taken = $row.find('.date_taken').text();
		var rating = $row.find('.rating').text();
		var advance = $row.find('.advance').text();
		var credit_earned = $row.find('.credit_earned').text();
		var training_institution = $row.find('.training_institution').text();
		var mpas = $row.find('.mpas').text();
		var business = $row.find('.business').text();
		var business_add = $row.find('.business_add').text();
		var profit = $row.find('.profit').text();
		var skills_learned = $row.find('.skills_learned').text();
		var mlb = $row.find('.mlb').text();
		var suggestions = $row.find('.suggestions').text();
		var date = $row.find('.date').text();

		$('#name3').text(name);
		$('#email3').text(email);
		$('#status3').text(status);
		$('#gender3').text(gender);
		$('#contact3').text(contact);
		$('#permanent3').text(permanent);
		$('#birthday3').text(birthday);
		$('#embatch3').text(batch);
		$('#course3').text(course);
		$('#major3').text(major);
		$('#rtc3').text(rtc);
		$('#exam3').text(exam);
		$('#date_taken3').text(date_taken);
		$('#rating3').text(rating);
		$('#advance3').text(advance);
		$('#credit_earned3').text(credit_earned);
		$('#training_institution3').text(training_institution);
		$('#mpas3').text(mpas);
		$('#business').text(business);
		$('#business_add').text(business_add);
		$('#profit3').text(profit);
		$('#skills_learned3').text(skills_learned);
		$('#mlb3').text(mlb);
		$('#suggestions3').text(suggestions);
		$('#sub_date3').text(date);
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
#employability{
  transition: 0.5s;
  background: lightgray;
  color: black;
}
.emp li{
	 display: inline-block;
	 width: auto;
}
.emp a{
	font-size: 16px;
	width: auto;
	padding: 10px;
	text-transform: uppercase;
	text-decoration: none;
}
.d2{
	width: 100%;
	color: white;
	padding: 10px;
	background: transparent;
	display:flex;
	margin: auto;
	flex-wrap: wrap;
	align-items: stretch;
	justify-content: center;
	border-radius: 5px;
}
.d2 a{
	width: 150px;
	height: 80px;
	text-decoration: none;
	margin: 10px;
}
.items:hover{
	border: 2px solid #777;
	background-color:#57606f;
}
.items{
	width: 100%;
	height: 80px;
	border: .5px solid #7f8c8d;
	border-radius: 7px;
	display: flex;
	flex-direction: column;
	background:#2f3542;
}
.data{
	width:100%;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0;
}
.data h5{
	font-size: 30px;
	text-align: center;
	font-weight: bold;
	padding: 5px;
	font-family: century gothic;
	color: #9b59b6;

}
.active{
	border-bottom: 3px solid #cc8e35;
	color: darkblue;
	font-weight: bold;
}
.icon{
	width:100%;
	text-align: center;
	border: none;
	outline: none;	
}
.icon span{
    font-size: 20px; 
	color:#eccc68;
	text-align: center;
}
.filtercon{
	width: 100%; 
	display: flex;
	flex-direction: row;

}
.filter{
	width: 50%;
}
.drop{
	margin-right: 30px;
	margin-left: 30px;
}
.drop select{
	width: 200px;
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
@media screen and (max-width: 800px){

}
</style>